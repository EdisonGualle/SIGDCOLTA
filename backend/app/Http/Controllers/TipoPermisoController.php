<?php

namespace App\Http\Controllers;

use App\Models\TipoPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoPermisoController extends Controller
{
    /**
     * Lista todos los tipos de permiso.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarTiposPermiso()
    {
        $tiposPermiso = TipoPermiso::all();
        return response()->json(['successful' => true, 'data' => $tiposPermiso]);
    }

    /**
     * Muestra los detalles de un tipo de permiso específico.
     *
     * @param  int  $id - ID del tipo de permiso
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarTipoPermiso($id)
    {
        $tipoPermiso = TipoPermiso::find($id);

        if (!$tipoPermiso) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Permiso no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $tipoPermiso]);
    }

    /**
     * Crea un nuevo tipo de permiso con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearTipoPermiso(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:tipoPermiso',
            'descripcion' => 'required|string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el tipo de permiso
        $tipoPermiso = TipoPermiso::create($request->all());

        return response()->json(['successful' => true, 'data' => $tipoPermiso], 201);
    }

    /**
     * Actualiza los detalles de un tipo de permiso existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID del tipo de permiso a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarTipoPermiso(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:tipoPermiso,nombre,' . $id . ',idTipoPermiso',
            'descripcion' => 'string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $tipoPermiso = TipoPermiso::find($id);

        if (!$tipoPermiso) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Permiso no encontrado'], 404);
        }

        // Actualizar el tipo de permiso
        $tipoPermiso->update($request->all());

        return response()->json(['successful' => true, 'data' => $tipoPermiso]);
    }

    /**
     * Elimina un tipo de permiso existente.
     *
     * @param  int  $id - ID del tipo de permiso a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarTipoPermiso($id)
    {
        $tipoPermiso = TipoPermiso::find($id);

        if (!$tipoPermiso) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Permiso no encontrado'], 404);
        }

        $tipoPermiso->delete();

        return response()->json(['successful' => true, 'message' => 'Tipo de Permiso eliminado correctamente']);
    }
}
