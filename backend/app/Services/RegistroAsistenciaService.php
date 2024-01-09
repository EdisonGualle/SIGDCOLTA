<?php

namespace App\Services;

use App\Models\Contrato;
use App\Models\RegistroAsistencia;
use App\Models\Empleado;
use App\Models\Estado;
use App\Models\EstadoAsistencia;
use App\Models\EstadoUsuario;
use App\Models\HorarioEmpleado;
use App\Models\MinutosAtraso;
use App\Models\TipoAsistencia;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistroAsistenciaService
{
    protected $validator;

    public function __construct(\Illuminate\Contracts\Validation\Factory $validator)
    {
        $this->validator = $validator;
    }

    public function listarRegistrosAsistencia()
    {
        $registrosAsistencia = RegistroAsistencia::all();
        return response()->json(['successful' => true, 'data' => $registrosAsistencia], 200);
    }

    public function mostrarRegistroAsistenciaPorId($id)
    {
        $registroAsistencia = RegistroAsistencia::find($id);

        if (!$registroAsistencia) {
            return response()->json(['successful' => false, 'error' => 'Registro de Asistencia no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $registroAsistencia], 200);
    }

    public function listarAsistenciaPorCedulaEmpleado($cedula)
    {
        // Buscar al empleado por la cédula
        $empleado = Empleado::where('cedula', $cedula)->first();

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener los registros de asistencia del empleado
        $registrosAsistencia = RegistroAsistencia::where('idEmpleado', $empleado->idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $registrosAsistencia], 200);
    }

    public function listarAsistenciaPorIdEmpleado($id)
    {

        // Obtener los registros de asistencia del empleado
        $registrosAsistencia = RegistroAsistencia::where('idEmpleado', $id)->get();

        return response()->json(['successful' => true, 'data' => $registrosAsistencia], 200);
    }


    public function listarAsistenciaPorEstadoAsistencia($estado)
    {
        // Obtener los registros de asistencia del empleado
        $registrosAsistencia = RegistroAsistencia::where('estadoAsistencia', $estado)->get();
        return response()->json(['successful' => true, 'data' => $registrosAsistencia], 200);
    }

    public function listarAsistenciaPorTipoAsistencia($tipo)
    {
        $registrosAsistencia = RegistroAsistencia::where('tipoAsistencia', $tipo)->get();
        return response()->json(['successful' => true, 'data' => $registrosAsistencia], 200);
    }


    public function eliminarRegistroAsistencia($id)
    {
        $registroAsistencia = RegistroAsistencia::find($id);

        if (!$registroAsistencia) {
            return response()->json(['successful' => false, 'error' => 'Registro de Asistencia no encontrado'], 404);
        }

        $registroAsistencia->delete();

        return response()->json(['successful' => true, 'message' => 'Registro de Asistencia eliminado correctamente'], 200);
    }





    public function registrarAsistencia(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
            'tipoAsistencia' => 'required|exists:tipoasistencia,tipoAsistencia',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si el empleado está activo
        $empleado = Empleado::find($request->idEmpleado);

        /*  if (!$empleado || !$this->isEmpleadoActivo($empleado)) {
            return response()->json(['successful' => false, 'error' => 'El empleado no está activo'], 422);
        } */

        // Verificar si el tipo asistencia está activo
        $tipoAsistencia = TipoAsistencia::find($request->tipoAsistencia);

        if (!$tipoAsistencia) {
            return response()->json(['successful' => false, 'error' => 'Tipo de asistencia no válido'], 422);
        }

        // Verificar si ya existe un registro para el mismo empleado, tipo de asistencia y fecha
        $registroExistente = RegistroAsistencia::where('idEmpleado', $request->idEmpleado)
            ->where('tipoAsistencia', $request->tipoAsistencia)
            ->whereDate('fecha', $request->fecha)
            ->first();

        if ($registroExistente) {
            return response()->json(['successful' => false, 'error' => 'Ya existe un registro para este empleado, tipo de asistencia y fecha'], 422);
        }


        $tipoAsistencia = TipoAsistencia::find($request->tipoAsistencia);
        $horarioEmpleado = HorarioEmpleado::where('idEmpleado', $request->idEmpleado)
            ->where('tipoAsistencia', $request->tipoAsistencia) // Ajusta el nombre de la columna según tu estructura
            ->first();

        // Validar el rango de horas
        $horaSolicitud = Carbon::parse($request->hora);
        $horaDesde = Carbon::parse($horarioEmpleado->horaDesde);
        $horaHasta = Carbon::parse($horarioEmpleado->horaHasta);

        // Verificar si la hora de la solicitud está dentro del rango permitido
        if ($horaSolicitud->between($horaDesde, $horaHasta)) {
            // Crear el registro de asistencia
            $request->merge(['estadoAsistencia' => TipoAsistencia::PRESENTE]); // Asignar el estado "Atrasado"
            $registroAsistencia = RegistroAsistencia::create($request->all());
            return response()->json(['successful' => true, 'message' => 'Registro de Asistencia realizado correctamente'], 200);
        } else {
            $request->merge(['estadoAsistencia' => TipoAsistencia::ATRASADO]); // Asignar el estado "Atrasado"
            $registroAsistencia = RegistroAsistencia::create($request->all());

            // Registrar minutos de atraso
            $minutosAtraso = Carbon::parse($horarioEmpleado->horaHasta)->diffInMinutes($horaSolicitud);

            MinutosAtraso::create([
                'idEmpleado' => $empleado->idEmpleado,
                'idRegistroAsistencia' => $registroAsistencia->idRegistroAsistencia,
                'cantidad_minutos' => $minutosAtraso,
                'fecha' => $registroAsistencia->fecha,
            ]);

            return response()->json(['successful' => true, 'message' => 'Registro de Asistencia realizado como atrasado', $empleado->idEmpleado], 200);
        }
    }

    public function cantidadHorasAtrasoEmpleado(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado', // Asegúrate de ajustar el nombre de la tabla 'empleados'
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ], [
            'idEmpleado.exists' => 'No existe el empleado especificado',
            'fechaFin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio',
        ]);
        // Si la validación falla, devuelve los errores
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        $minutosAtraso = MinutosAtraso::where('idEmpleado', $request->idEmpleado)
            ->whereBetween('fecha', [$request->fechaInicio, $request->fechaFin])
            ->sum('cantidad_minutos');

        $horasAtraso = $minutosAtraso / 60;

        return response()->json(['successful' => true, 'minutosTotales' => $minutosAtraso, "horasTotales" => $horasAtraso], 200);
    }



    // Función auxiliar para verificar si el empleado está activo
    private function isEmpleadoActivo($idEmpleado)
    {
        // Obtener el tipo de estado del usuario asociado al empleado
        $tipoEstado = User::where('idEmpleado', $idEmpleado)
            ->join('estadoUsuario', 'usuario.idTipoEstado', '=', 'estadoUsuario.idEstado')
            ->value('estadoUsuario.tipoEstado');

        // Verificar si el tipo de estado es 'activo'
        if ($tipoEstado === 'activo') {
            return true;
        } else {
            return false;
        }
    }




    public function actualizarAsistencia(Request $request, $idRegistroAsistencia)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'tipoAsistencia' => 'required|exists:tipoasistencia,tipoAsistencia',
            'fecha' => 'date',
            'hora',
            'estadoAsistencia' => 'required|in:atrasado,presente,justificado,falta',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si el registro de asistencia existe
        $registroAsistencia = RegistroAsistencia::find($idRegistroAsistencia);

        if (!$registroAsistencia) {
            return response()->json(['successful' => false, 'error' => 'Registro de asistencia no encontrado'], 404);
        }

        // Verificar si el tipo asistencia está activo
        $tipoAsistencia = TipoAsistencia::find($request->tipoAsistencia);

        if (!$tipoAsistencia) {
            return response()->json(['successful' => false, 'error' => 'Tipo de asistencia no válido'], 422);
        }

        // Validar el rango de horas
        $horaSolicitud = Carbon::parse($request->hora);
        $horaDesde = Carbon::parse($tipoAsistencia->desde);
        $horaHasta = Carbon::parse($tipoAsistencia->hasta);

        // Verificar si la hora de la solicitud está dentro del rango permitido
        if ($horaSolicitud->between($horaDesde, $horaHasta)) {
            // Actualizar el registro de asistencia
            $registroAsistencia->update($request->all());
            return response()->json(['successful' => true, 'message' => 'Registro de Asistencia actualizado correctamente'], 200);
        } else {
            // La hora está fuera del rango, actualizar como atrasado
            $request->merge(['estadoAsistencia' => 'Atrasado']); // Asignar el estado "Atrasado"
            $registroAsistencia->update($request->all());
            return response()->json(['successful' => true, 'message' => 'Registro de Asistencia actualizado como atrasado'], 200);
        }
    }
}
