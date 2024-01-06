<?php

namespace App\Http\Controllers;

use App\Models\Discapacidad;
use App\Models\Empleado;
use App\Models\EmpleadoHasDiscapacidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoHasDiscapacidadController extends Controller
{
    public function listarDiscapacidadesDeEmpleados()
    {
        $asignacionesDiscapacidad = EmpleadoHasDiscapacidad::with('empleado', 'discapacidad')->get();
        return response()->json(['successful' => true, 'data' => $asignacionesDiscapacidad]);
       
    }

    public function mostrarAsignacionDiscapacidad($idEmpleado, $idDiscapacidad)
    {
        $asignacionDiscapacidad = EmpleadoHasDiscapacidad::where('idEmpleado', $idEmpleado)
            ->where('idDiscapacidad', $idDiscapacidad)
            ->with('empleado', 'discapacidad')
            ->first();

        if (!$asignacionDiscapacidad) {
            return response()->json(['successful' => false, 'error' => 'Asignación de discapacidad no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $asignacionDiscapacidad]);
    }

    public function crearAsignacionDiscapacidad(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
            'idDiscapacidad' => 'required|exists:discapacidad,idDiscapacidad',
            'porcentaje' => 'required|numeric|min:0|max:100',
            'nivel' => 'required|string',
            'adaptaciones' => 'nullable|string',
            'notas' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $empleado = Empleado::find($request->idEmpleado);
        $discapacidad = Discapacidad::find($request->idDiscapacidad);

        if (!$empleado || !$discapacidad) {
            return response()->json(['successful' => false, 'error' => 'Empleado o discapacidad no encontrados'], 404);
        }

        $asignacionDiscapacidad = EmpleadoHasDiscapacidad::create($request->all());

        return response()->json(['successful' => true, 'data' => $asignacionDiscapacidad], 201);
    }

    public function actualizarAsignacionDiscapacidad(Request $request, $idEmpleado, $idDiscapacidad)
    {
        $validator = Validator::make($request->all(), [
            'porcentaje' => 'required|numeric|min:0|max:100',
            'nivel' => 'required|string',
            'adaptaciones' => 'nullable|string',
            'notas' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $asignacionDiscapacidad = EmpleadoHasDiscapacidad::where('idEmpleado', $idEmpleado)
            ->where('idDiscapacidad', $idDiscapacidad)
            ->first();

        if (!$asignacionDiscapacidad) {
            return response()->json(['successful' => false, 'error' => 'Asignación de discapacidad no encontrada'], 404);
        }

        $asignacionDiscapacidad->update($request->all());

        return response()->json(['successful' => true, 'data' => $asignacionDiscapacidad]);
    }

    public function eliminarAsignacionDiscapacidad($idEmpleado, $idDiscapacidad)
    {
        $asignacionDiscapacidad = EmpleadoHasDiscapacidad::where('idEmpleado', $idEmpleado)
            ->where('idDiscapacidad', $idDiscapacidad)
            ->first();

        if (!$asignacionDiscapacidad) {
            return response()->json(['successful' => false, 'error' => 'Asignación de discapacidad no encontrada'], 404);
        }

        $asignacionDiscapacidad->delete();

        return response()->json(['successful' => true, 'message' => 'Asignación de discapacidad eliminada correctamente']);
    }
}
