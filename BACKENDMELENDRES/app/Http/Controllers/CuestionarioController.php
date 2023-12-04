<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuestionario;

class CuestionarioController extends Controller
{
    public function index()
    {
        $cuestionarios = Cuestionario::all();
        return response()->json($cuestionarios);
    }

    public function show($id)
    {
        $cuestionario = Cuestionario::find($id);
        
        if (!$cuestionario) {
            return response()->json(['error' => 'Cuestionario no encontrado'], 404);
        }

        return response()->json($cuestionario);
    }

    public function store(Request $request)
    {
        $cuestionario = Cuestionario::create($request->all());
        return response()->json($cuestionario, 201);
    }

    public function update(Request $request, $id)
    {
        $cuestionario = Cuestionario::find($id);

        if (!$cuestionario) {
            return response()->json(['error' => 'Cuestionario no encontrado'], 404);
        }

        $cuestionario->update($request->all());

        return response()->json($cuestionario, 200);
    }

    public function destroy($id)
    {
        $cuestionario = Cuestionario::find($id);

        if (!$cuestionario) {
            return response()->json(['error' => 'Cuestionario no encontrado'], 404);
        }

        $cuestionario->delete();

        return response()->json(['message' => 'Cuestionario eliminado correctamente'], 200);
    }
}
