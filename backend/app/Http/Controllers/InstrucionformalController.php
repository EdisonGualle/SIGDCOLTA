<?php

namespace App\Http\Controllers;

use App\Models\InstrucionFormal;
use Illuminate\Http\Request;

class InstrucionFormalController extends Controller
{
    public function index()
    {
        $instruccionesFormales = InstrucionFormal::all();
        return response()->json($instruccionesFormales);
    }

    public function show($id)
    {
        $instruccionFormal = InstrucionFormal::find($id);

        if (!$instruccionFormal) {
            return response()->json(['error' => 'Instrucción Formal no encontrada'], 404);
        }

        return response()->json($instruccionFormal);
    }

    public function store(Request $request)
    {
        $instruccionFormal = InstrucionFormal::create($request->all());
        return response()->json($instruccionFormal, 201);
    }

    public function update(Request $request, $id)
    {
        $instruccionFormal = InstrucionFormal::find($id);

        if (!$instruccionFormal) {
            return response()->json(['error' => 'Instrucción Formal no encontrada'], 404);
        }

        $instruccionFormal->update($request->all());

        return response()->json($instruccionFormal, 200);
    }

    public function destroy($id)
    {
        $instruccionFormal = InstrucionFormal::find($id);

        if (!$instruccionFormal) {
            return response()->json(['error' => 'Instrucción Formal no encontrada'], 404);
        }

        $instruccionFormal->delete();

        return response()->json(['message' => 'Instrucción Formal eliminada correctamente'], 200);
    }
}
