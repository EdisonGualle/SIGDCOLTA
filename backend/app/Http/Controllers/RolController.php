<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolController extends Controller
{
    /**
     * Lista todos los roles.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarRoles()
    {
        $roles = Rol::all();
        return response()->json(['successful' => true, 'data' => $roles]);
    }

    /**
     * Muestra los detalles de un rol específico.
     *
     * @param  int  $id - ID del rol
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarRol($id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['successful' => false, 'error' => 'Rol no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $rol]);
    }

    /**
     * Crea un nuevo rol con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Actualiza los detalles de un rol existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID del rol a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Elimina un rol existente.
     *
     * @param  int  $id - ID del rol a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
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
