<?php

namespace App\Services;

use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermisoService
{
    public function listarPermisos()
    {
        $permisos = Permiso::all();
        return response()->json(['successful' => true, 'data' => $permisos]);
    }

    public function mostrarPermisoId($id)
    {
        $permiso = Permiso::find($id);

        if (!$permiso) {
            return response()->json(['successful' => false, 'error' => 'Permiso no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $permiso]);
    }

    public function crearPermiso(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'fechaSolicitud' => 'required|date',
            'fechaInicio' => 'required|date',
            'fechaFinaliza' => 'required|date',
            'tiempoPermiso' => 'required|string',
            'aprobacionJefeInmediato' => 'required|string',
            'aprobacionTalentoHumano' => 'required|string',
            'idTipoPermiso' => 'required|numeric',
            'idEmpleado' => 'required|numeric',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el permiso
        $permiso = Permiso::create($request->all());

        return response()->json(['successful' => true, 'data' => $permiso], 201);
    }

    public function actualizarPermiso(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'fechaSolicitud' => 'date',
            'fechaInicio' => 'date',
            'fechaFinaliza' => 'date',
            'tiempoPermiso' => 'string',
            'aprobacionJefeInmediato' => 'string',
            'aprobacionTalentoHumano' => 'string',
            'idTipoPermiso' => 'numeric',
            'idEmpleado' => 'numeric',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $permiso = Permiso::find($id);

        if (!$permiso) {
            return response()->json(['successful' => false, 'error' => 'Permiso no encontrado'], 404);
        }

        // Actualizar el permiso
        $permiso->update($request->all());

        return response()->json(['successful' => true, 'data' => $permiso]);
    }

    public function eliminarPermiso($id)
    {
        $permiso = Permiso::find($id);

        if (!$permiso) {
            return response()->json(['successful' => false, 'error' => 'Permiso no encontrado'], 404);
        }

        $permiso->delete();

        return response()->json(['successful' => true, 'message' => 'Permiso eliminado correctamente']);
    }
}
