<?php

namespace App\Http\Controllers;

use App\Models\Discapasidad;
use Illuminate\Http\Request;

class DiscapasidadController extends Controller
{
    public function listarDiscapacidades()
    {
        $discapacidades = Discapasidad::all();
        return response()->json($discapacidades);
    }

    public function mostrarDiscapacidad($id)
    {
        $discapacidad = Discapasidad::find($id);

        if (!$discapacidad) {
            return response()->json(['error' => 'Discapacidad no encontrada'], 404);
        }

        return response()->json($discapacidad);
    }

    public function crearDiscapacidad(Request $request)
    {
        $discapacidad = Discapasidad::create($request->all());
        return response()->json($discapacidad, 201);
    }

    public function actualizarDiscapacidad(Request $request, $id)
    {
        $discapacidad = Discapasidad::find($id);

        if (!$discapacidad) {
            return response()->json(['error' => 'Discapacidad no encontrada'], 404);
        }

        $discapacidad->update($request->all());

        return response()->json($discapacidad, 200);
    }

    public function eliminarDiscapacidad($id)
    {
        $discapacidad = Discapasidad::find($id);

        if (!$discapacidad) {
            return response()->json(['error' => 'Discapacidad no encontrada'], 404);
        }

        $discapacidad->delete();

        return response()->json(['message' => 'Discapacidad eliminada correctamente'], 200);
    }
}
