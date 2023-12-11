<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return response()->json($roles);
    }

    public function show($id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        return response()->json($rol);
    }

    public function store(Request $request)
    {
        $rol = Rol::create($request->all());
        return response()->json($rol, 201);
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        $rol->update($request->all());

        return response()->json($rol, 200);
    }

    public function destroy($id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        $rol->delete();

        return response()->json(['message' => 'Rol eliminado correctamente'], 200);
    }
}
