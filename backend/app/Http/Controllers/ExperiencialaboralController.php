<?php

namespace App\Http\Controllers;

use App\Models\ExperienciaLaboral;
use Illuminate\Http\Request;

class ExperienciaLaboralController extends Controller
{
    public function index()
    {
        $experienciasLaborales = ExperienciaLaboral::all();
        return response()->json($experienciasLaborales);
    }

    public function show($id)
    {
        $experienciaLaboral = ExperienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json(['error' => 'Experiencia Laboral no encontrada'], 404);
        }

        return response()->json($experienciaLaboral);
    }

    public function store(Request $request)
    {
        $experienciaLaboral = ExperienciaLaboral::create($request->all());
        return response()->json($experienciaLaboral, 201);
    }

    public function update(Request $request, $id)
    {
        $experienciaLaboral = ExperienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json(['error' => 'Experiencia Laboral no encontrada'], 404);
        }

        $experienciaLaboral->update($request->all());

        return response()->json($experienciaLaboral, 200);
    }

    public function destroy($id)
    {
        $experienciaLaboral = ExperienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json(['error' => 'Experiencia Laboral no encontrada'], 404);
        }

        $experienciaLaboral->delete();

        return response()->json(['message' => 'Experiencia Laboral eliminada correctamente'], 200);
    }
}
