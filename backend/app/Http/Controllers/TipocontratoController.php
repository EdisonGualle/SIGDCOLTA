<?php

namespace App\Http\Controllers;

use App\Models\TipoContrato;
use Illuminate\Http\Request;

class TipoContratoController extends Controller
{
    public function listarTiposContrato()
    {
        $tipoContratos = TipoContrato::all();
        return response()->json($tipoContratos);
    }

    public function mostrarTipoContrato($id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['error' => 'Tipo de Contrato no encontrado'], 404);
        }

        return response()->json($tipoContrato);
    }

    public function crearTipoContrato(Request $request)
    {
        $tipoContrato = TipoContrato::create($request->all());
        return response()->json($tipoContrato, 201);
    }

    public function actualizarTipoContrato(Request $request, $id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['error' => 'Tipo de Contrato no encontrado'], 404);
        }

        $tipoContrato->update($request->all());

        return response()->json($tipoContrato, 200);
    }

    public function eliminarTipoContrato($id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['error' => 'Tipo de Contrato no encontrado'], 404);
        }

        $tipoContrato->delete();

        return response()->json(['message' => 'Tipo de Contrato eliminado correctamente'], 200);
    }
}
