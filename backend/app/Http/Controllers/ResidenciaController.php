<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residencia;

class ResidenciaController extends Controller
{
    public function listarResidencias()
    {
        $residencias = Residencia::all();
        return response()->json($residencias);
    }

    public function mostrarResidencia($id)
    {
        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['error' => 'Residencia no encontrada'], 404);
        }

        return response()->json($residencia);
    }

    public function crearResidencia(Request $request)
    {
        $residencia = Residencia::create($request->all());
        return response()->json($residencia, 201);
    }

    public function actualizarResidencia(Request $request, $id)
    {
        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['error' => 'Residencia no encontrada'], 404);
        }

        $residencia->update($request->all());

        return response()->json($residencia, 200);
    }

    public function eliminarResidencia($id)
    {
        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['error' => 'Residencia no encontrada'], 404);
        }

        $residencia->delete();

        return response()->json(['message' => 'Residencia eliminada correctamente'], 200);
    }
}
