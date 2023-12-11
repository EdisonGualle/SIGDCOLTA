<?php

namespace App\Http\Controllers;

use App\Models\ReferenciaLaboral;
use Illuminate\Http\Request;

class ReferenciaLaboralController extends Controller
{
    public function listarReferenciasLaborales()
    {
        $referenciasLaborales = ReferenciaLaboral::all();
        return response()->json($referenciasLaborales);
    }

    public function mostrarReferenciaLaboral($id)
    {
        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['error' => 'Referencia Laboral no encontrada'], 404);
        }

        return response()->json($referenciaLaboral);
    }

    public function crearReferenciaLaboral(Request $request)
    {
        $referenciaLaboral = ReferenciaLaboral::create($request->all());
        return response()->json($referenciaLaboral, 201);
    }

    public function actualizarReferenciaLaboral(Request $request, $id)
    {
        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['error' => 'Referencia Laboral no encontrada'], 404);
        }

        $referenciaLaboral->update($request->all());

        return response()->json($referenciaLaboral, 200);
    }

    public function eliminarReferenciaLaboral($id)
    {
        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['error' => 'Referencia Laboral no encontrada'], 404);
        }

        $referenciaLaboral->delete();

        return response()->json(['message' => 'Referencia Laboral eliminada correctamente'], 200);
    }
}
