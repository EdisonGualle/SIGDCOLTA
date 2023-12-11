<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function listarRoles()
    {
        $roles = Rol::all();
        return response()->json($roles);
    }

    public function mostrarRol($id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        return response()->json($rol);
    }

    public function crearRol(Request $request)
    {
        $rol = Rol::create($request->all());
        return response()->json($rol, 201);
    }

    public function actualizarRol(Request $request, $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        $rol->update($request->all());

        return response()->json($rol, 200);
    }

    public function eliminarRol($id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        $rol->delete();

        return response()->json(['message' => 'Rol eliminado correctamente'], 200);
    }
}
