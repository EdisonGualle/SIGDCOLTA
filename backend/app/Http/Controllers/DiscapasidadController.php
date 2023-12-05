<?php

namespace App\Http\Controllers;

use App\Models\Discapasidad;
use Illuminate\Http\Request;

class DiscapasidadController extends Controller
{
    public function index()
    {
        $discapacidades = Discapasidad::all();
        return response()->json($discapacidades);
    }

    public function show($id)
    {
        $discapacidad = Discapasidad::find($id);

        if (!$discapacidad) {
            return response()->json(['error' => 'Discapacidad no encontrada'], 404);
        }

        return response()->json($discapacidad);
    }

    public function store(Request $request)
    {
        $discapacidad = Discapasidad::create($request->all());
        return response()->json($discapacidad, 201);
    }

    public function update(Request $request, $id)
    {
        $discapacidad = Discapasidad::find($id);

        if (!$discapacidad) {
            return response()->json(['error' => 'Discapacidad no encontrada'], 404);
        }

        $discapacidad->update($request->all());

        return response()->json($discapacidad, 200);
    }

    public function destroy($id)
    {
        $discapacidad = Discapasidad::find($id);

        if (!$discapacidad) {
            return response()->json(['error' => 'Discapacidad no encontrada'], 404);
        }

        $discapacidad->delete();

        return response()->json(['message' => 'Discapacidad eliminada correctamente'], 200);
    }

}