<?php

namespace App\Services;

use App\Models\RegistroAsistencia;
use App\Models\Empleado;
use App\Models\Estado;
use App\Models\EstadoAsistencia;
use App\Models\TipoAsistencia;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $validator = $this->validator->make($request->all(), [
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

        if (!$empleado || !$this->isEmpleadoActivo($empleado)) {
            return response()->json(['successful' => false, 'error' => 'El empleado no está activo'], 422);
        }

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

        // Validar el rango de horas
        $horaSolicitud = Carbon::parse($request->hora);
        $horaDesde = Carbon::parse($tipoAsistencia->desde);
        $horaHasta = Carbon::parse($tipoAsistencia->hasta);

        // Verificar si la hora de la solicitud está dentro del rango permitido
        if ($horaSolicitud->between($horaDesde, $horaHasta)) {
            // Crear el registro de asistencia
            RegistroAsistencia::create($request->all());
            return response()->json(['successful' => true, 'message' => 'Registro de Asistencia realizado correctamente'], 200);
        } else {
            // La hora está fuera del rango, guardar como atrasado
            $request->merge(['estadoAsistencia' => TipoAsistencia::ATRASADO]); // Asignar el estado "Atrasado"
            RegistroAsistencia::create($request->all());
            return response()->json(['successful' => true, 'message' => 'Registro de Asistencia realizado como atrasado'], 200);
        }
    }

    // Función auxiliar para verificar si el empleado está activo
    private function isEmpleadoActivo($empleado)
    {
        // Obtener el estado del empleado
        $estadoEmpleado = Estado::find($empleado->idEstado);

        // Verificar si el estado es 'activo'
        return $estadoEmpleado && strtolower($estadoEmpleado->tipoEstado) === 'activo';
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
