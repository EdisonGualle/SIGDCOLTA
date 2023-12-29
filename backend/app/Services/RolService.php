<?php

namespace App\Services;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolService
{
    public function listarRoles()
    {
        $roles = Rol::all();
        return response()->json(['successful' => true, 'data' => $roles]);
    }

    public function mostrarRolPorId($id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['successful' => false, 'error' => 'Rol no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $rol]);
    }

    public function crearRol(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles',
            'guard_name' => 'required|string|max:255',
        ], [
            'name.unique' => 'Ya existe un rol con este nombre.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el rol
        $rol = Rol::create($request->all());

        return response()->json(['successful' => true, 'data' => $rol], 201);
    }

    public function actualizarRol(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255|unique:roles,name,' . $id . ',id',
            'guard_name' => 'string|max:255',
        ], [
            'name.unique' => 'Ya existe un rol con este nombre.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['successful' => false, 'error' => 'Rol no encontrado'], 404);
        }

        // Actualizar el rol
        $rol->update($request->all());

        return response()->json(['successful' => true, 'data' => $rol]);
    }

    public function eliminarRol($id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['successful' => false, 'error' => 'Rol no encontrado'], 404);
        }

        $rol->delete();

        return response()->json(['successful' => true, 'message' => 'Rol eliminado correctamente']);
    }
}
