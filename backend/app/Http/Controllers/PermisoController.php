<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function listarPermisos()
    {
        $permisos = Permiso::all();
        return response()->json($permisos);
    }

    public function mostrarPermiso($id)
    {
        $permiso = Permiso::find($id);

        if (!$permiso) {
            return response()->json(['error' => 'Permiso no encontrado'], 404);
        }

        return response()->json($permiso);
    }

    public function crearPermiso(Request $request)
    {
        $permiso = Permiso::create($request->all());
        return response()->json($permiso, 201);
    }

    public function actualizarPermiso(Request $request, $id)
    {
        $permiso = Permiso::find($id);

        if (!$permiso) {
            return response()->json(['error' => 'Permiso no encontrado'], 404);
        }

        $permiso->update($request->all());

        return response()->json($permiso, 200);
    }

    public function eliminarPermiso($id)
    {
        $permiso = Permiso::find($id);

        if (!$permiso) {
            return response()->json(['error' => 'Permiso no encontrado'], 404);
        }

        $permiso->delete();

        return response()->json(['message' => 'Permiso eliminado correctamente'], 200);
    }
}
