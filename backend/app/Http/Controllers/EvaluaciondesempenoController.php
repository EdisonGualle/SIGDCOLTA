<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionDesempeno;
use Illuminate\Http\Request;

class EvaluacionDesempenoController extends Controller
{
    public function index()
    {
        $evaluacionesDesempeno = EvaluacionDesempeno::all();
        return response()->json($evaluacionesDesempeno);
    }

    public function show($id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        return response()->json($evaluacionDesempeno);
    }

    public function store(Request $request)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::create($request->all());
        return response()->json($evaluacionDesempeno, 201);
    }

    public function update(Request $request, $id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        $evaluacionDesempeno->update($request->all());

        return response()->json($evaluacionDesempeno, 200);
    }

    public function destroy($id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        $evaluacionDesempeno->delete();

        return response()->json(['message' => 'Evaluación de Desempeño eliminada correctamente'], 200);
    }
}
