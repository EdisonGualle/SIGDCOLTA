<?php

namespace App\Http\Controllers;

use App\Models\TipoPermiso;
use Illuminate\Http\Request;

class TipoPermisoController extends Controller
{
    public function listarTiposPermiso()
    {
        $tiposPermiso = TipoPermiso::all();
        return response()->json($tiposPermiso);
    }

    public function mostrarTipoPermiso($id)
    {
        $tipoPermiso = TipoPermiso::find($id);

        if (!$tipoPermiso) {
            return response()->json(['error' => 'Tipo de Permiso no encontrado'], 404);
        }

        return response()->json($tipoPermiso);
    }

    public function crearTipoPermiso(Request $request)
    {
        $tipoPermiso = TipoPermiso::create($request->all());
        return response()->json($tipoPermiso, 201);
    }

    public function actualizarTipoPermiso(Request $request, $id)
    {
        $tipoPermiso = TipoPermiso::find($id);

        if (!$tipoPermiso) {
            return response()->json(['error' => 'Tipo de Permiso no encontrado'], 404);
        }

        $tipoPermiso->update($request->all());

        return response()->json($tipoPermiso, 200);
    }

    public function eliminarTipoPermiso($id)
    {
        $tipoPermiso = TipoPermiso::find($id);

        if (!$tipoPermiso) {
            return response()->json(['error' => 'Tipo de Permiso no encontrado'], 404);
        }

        $tipoPermiso->delete();

        return response()->json(['message' => 'Tipo de Permiso eliminado correctamente'], 200);
    }
}
