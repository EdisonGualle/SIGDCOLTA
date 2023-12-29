<?php

namespace App\Services;

use App\Models\TipoPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoPermisoService
{
    public function listarTiposPermiso()
    {
        $tiposPermiso = TipoPermiso::all();
        return response()->json(['successful' => true, 'data' => $tiposPermiso]);
    }

    public function mostrarTipoPermisoPorId($id)
    {
        $tipoPermiso = TipoPermiso::find($id);

        if (!$tipoPermiso) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Permiso no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $tipoPermiso]);
    }

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
