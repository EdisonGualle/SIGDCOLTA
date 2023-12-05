<?php

namespace App\Http\Controllers;

use App\Models\TipoContrato;
use Illuminate\Http\Request;

class TipoContratoController extends Controller
{
    public function index()
    {
        $tipoContratos = TipoContrato::all();
        return response()->json($tipoContratos);
    }

    public function show($id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['error' => 'Tipo de Contrato no encontrado'], 404);
        }

        return response()->json($tipoContrato);
    }

    public function store(Request $request)
    {
        $tipoContrato = TipoContrato::create($request->all());
        return response()->json($tipoContrato, 201);
    }

    public function update(Request $request, $id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['error' => 'Tipo de Contrato no encontrado'], 404);
        }

        $tipoContrato->update($request->all());

        return response()->json($tipoContrato, 200);
    }

    public function destroy($id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['error' => 'Tipo de Contrato no encontrado'], 404);
        }

        $tipoContrato->delete();

        return response()->json(['message' => 'Tipo de Contrato eliminado correctamente'], 200);
    }
}
