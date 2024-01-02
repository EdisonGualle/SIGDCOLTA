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
}
