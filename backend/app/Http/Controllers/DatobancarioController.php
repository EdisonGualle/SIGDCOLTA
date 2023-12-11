<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatoBancario;

class DatoBancarioController extends Controller
{
    public function listarDatosBancarios()
    {
        $datosBancarios = DatoBancario::all();
        return response()->json($datosBancarios);
    }

    public function mostrarDatoBancario($id)
    {
        $datoBancario = DatoBancario::find($id);

        if (!$datoBancario) {
            return response()->json(['error' => 'Dato Bancario no encontrado'], 404);
        }

        return response()->json($datoBancario);
    }

    public function crearDatoBancario(Request $request)
    {
        $datoBancario = DatoBancario::create($request->all());
        return response()->json($datoBancario, 201);
    }

    public function actualizarDatoBancario(Request $request, $id)
    {
        $datoBancario = DatoBancario::find($id);

        if (!$datoBancario) {
            return response()->json(['error' => 'Dato Bancario no encontrado'], 404);
        }

        $datoBancario->update($request->all());

        return response()->json($datoBancario, 200);
    }

    public function eliminarDatoBancario($id)
    {
        $datoBancario = DatoBancario::find($id);

        if (!$datoBancario) {
            return response()->json(['error' => 'Dato Bancario no encontrado'], 404);
        }

        $datoBancario->delete();

        return response()->json(['message' => 'Dato Bancario eliminado correctamente'], 200);
    }
}
