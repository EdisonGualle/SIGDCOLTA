<?php

namespace App\Services;

use App\Models\RegistroAsistencia;
use App\Models\Empleado;
use App\Models\Estado;
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
            'fechaAsistencia' => 'required|date',
            'idEmpleado' => 'required|exists:empleados,IDEmpleado',
            'tipoAsistencia' => 'required|exists:tipos_asistencia,IDTipoAsistencia',
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

        // Crear un nuevo registro de asistencia
        $registroAsistencia = new RegistroAsistencia([
            'fecha_asistencia' => $request->fechaAsistencia,
            'id_empleado' => $request->idEmpleado,
            'id_tipo_asistencia' => $request->tipoAsistencia,
        ]);

        $registroAsistencia->save();

        return response()->json(['successful' => true, 'message' => 'Registro de Asistencia realizado correctamente'], 200);
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
