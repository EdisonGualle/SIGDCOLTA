<?php

namespace App\Http\Controllers;

use App\Models\SalidaCampo;
use Illuminate\Http\Request;

class SalidaCampoController extends Controller
{
    public function index()
    {
        $salidasCampo = SalidaCampo::all();
        return response()->json($salidasCampo);
    }

    public function show($id)
    {
        $salidaCampo = SalidaCampo::find($id);

        if (!$salidaCampo) {
            return response()->json(['error' => 'Salida de Campo no encontrada'], 404);
        }

        return response()->json($salidaCampo);
    }

    public function store(Request $request)
    {
        $salidaCampo = SalidaCampo::create($request->all());
        return response()->json($salidaCampo, 201);
    }

    public function update(Request $request, $id)
    {
        $salidaCampo = SalidaCampo::find($id);

        if (!$salidaCampo) {
            return response()->json(['error' => 'Salida de Campo no encontrada'], 404);
        }

        $salidaCampo->update($request->all());

        return response()->json($salidaCampo, 200);
    }

    public function destroy($id)
    {
        $salidaCampo = SalidaCampo::find($id);

        if (!$salidaCampo) {
            return response()->json(['error' => 'Salida de Campo no encontrada'], 404);
        }

        $salidaCampo->delete();

        return response()->json(['message' => 'Salida de Campo eliminada correctamente'], 200);
    }
}
