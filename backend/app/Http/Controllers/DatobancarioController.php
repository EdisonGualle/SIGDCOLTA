<?php

namespace App\Http\Controllers;

use App\Models\DatoBancario;
use Illuminate\Http\Request;

class DatoBancarioController extends Controller
{
    public function index()
    {
        $datosBancarios = DatoBancario::all();
        return response()->json($datosBancarios);
    }

    public function show($id)
    {
        $datoBancario = DatoBancario::find($id);

        if (!$datoBancario) {
            return response()->json(['error' => 'Dato Bancario no encontrado'], 404);
        }

        return response()->json($datoBancario);
    }

    public function store(Request $request)
    {
        $datoBancario = DatoBancario::create($request->all());
        return response()->json($datoBancario, 201);
    }

    public function update(Request $request, $id)
    {
        $datoBancario = DatoBancario::find($id);

        if (!$datoBancario) {
            return response()->json(['error' => 'Dato Bancario no encontrado'], 404);
        }

        $datoBancario->update($request->all());

        return response()->json($datoBancario, 200);
    }

    public function destroy($id)
    {
        $datoBancario = DatoBancario::find($id);

        if (!$datoBancario) {
            return response()->json(['error' => 'Dato Bancario no encontrado'], 404);
        }

        $datoBancario->delete();

        return response()->json(['message' => 'Dato Bancario eliminado correctamente'], 200);
    }
}
