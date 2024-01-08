<?php

namespace App\Services;

use App\Models\EstadoPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EstadoPermisoService
{
    public function listarEstadosPermiso()
    {
        $estadosPermiso = EstadoPermiso::all();
        return response()->json(['successful' => true, 'data' => $estadosPermiso]);
    }

    public function mostrarEstadoPermisoPorId($id)
    {
        try {
            $estadoPermiso = EstadoPermiso::findOrFail($id);
            return response()->json(['successful' => true, 'data' => $estadoPermiso]);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'Estado de Permiso no encontrado'], 404);
        }
    }

    public function crearEstadoPermiso(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'estado' => 'required|string|unique:estadopermiso',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el estado de permiso
        $estadoPermiso = EstadoPermiso::create($request->all());

        return response()->json(['successful' => true, 'data' => $estadoPermiso], 201);
    }

    public function actualizarEstadoPermiso(Request $request, $id)
    {
        if (!is_numeric($id)) {
            return response()->json(['successful' => false, 'error' => 'ID de estado de permiso no válido'], 422);
        }

        $id = (int) $id; // Convertir a entero

        try {
            $estadoPermiso = EstadoPermiso::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'Estado de Permiso no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'estado' => [
                'string',
                Rule::unique('estadopermiso')->ignore($estadoPermiso->idEstadoPermiso, 'idEstadoPermiso'),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $estadoPermiso->update($request->all());

        return response()->json(['successful' => true, 'data' => $estadoPermiso]);
    }

    public function eliminarEstadoPermiso($id)
    {
        if (!is_numeric($id)) {
            return response()->json(['successful' => false, 'error' => 'ID de estado de permiso no válido'], 422);
        }

        $id = (int) $id; // Convertir a entero

        try {
            $estadoPermiso = EstadoPermiso::findOrFail($id);
            $estadoPermiso->delete();
            return response()->json(['successful' => true, 'message' => 'Estado de Permiso eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'Estado de Permiso no encontrado'], 404);
        }
    }

}
