<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index()
    {
        $unidades = Unidad::all();
        return response()->json($unidades);
    }

    public function show($id)
    {
        $unidad = Unidad::find($id);

        if (!$unidad) {
            return response()->json(['error' => 'Unidad no encontrada'], 404);
        }

        return response()->json($unidad);
    }

    public function store(Request $request)
    {
        $unidad = Unidad::create($request->all());
        return response()->json($unidad, 201);
    }

    public function update(Request $request, $id)
    {
        $unidad = Unidad::find($id);

        if (!$unidad) {
            return response()->json(['error' => 'Unidad no encontrada'], 404);
        }

        $unidad->update($request->all());

        return response()->json($unidad, 200);
    }

    public function destroy($id)
    {
        $unidad = Unidad::find($id);

        if (!$unidad) {
            return response()->json(['error' => 'Unidad no encontrada'], 404);
        }

        $unidad->delete();

        return response()->json(['message' => 'Unidad eliminada correctamente'], 200);
    }
}
