<?php

namespace App\Http\Controllers;

use App\Models\Referencialaboral;
use Illuminate\Http\Request;

class ReferenciaLaboralController extends Controller
{
    public function index()
    {
        $referenciasLaborales = ReferenciaLaboral::all();
        return response()->json($referenciasLaborales);
    }

    public function show($id)
    {
        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['error' => 'Referencia Laboral no encontrada'], 404);
        }

        return response()->json($referenciaLaboral);
    }

    public function store(Request $request)
    {
        $referenciaLaboral = ReferenciaLaboral::create($request->all());
        return response()->json($referenciaLaboral, 201);
    }

    public function update(Request $request, $id)
    {
        $referenciaLaboral = Referencialaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['error' => 'Referencia Laboral no encontrada'], 404);
        }

        $referenciaLaboral->update($request->all());

        return response()->json($referenciaLaboral, 200);
    }

    public function destroy($id)
    {
        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['error' => 'Referencia Laboral no encontrada'], 404);
        }

        $referenciaLaboral->delete();

        return response()->json(['message' => 'Referencia Laboral eliminada correctamente'], 200);
    }
}
