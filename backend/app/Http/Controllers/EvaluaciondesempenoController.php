<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluacionDesempeno;

class EvaluacionDesempenoController extends Controller
{
    public function listarEvaluacionesDesempeno()
    {
        $evaluacionesDesempeno = EvaluacionDesempeno::all();
        return response()->json($evaluacionesDesempeno);
    }

    public function mostrarEvaluacionDesempeno($id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        return response()->json($evaluacionDesempeno);
    }

    public function crearEvaluacionDesempeno(Request $request)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::create($request->all());
        return response()->json($evaluacionDesempeno, 201);
    }

    public function actualizarEvaluacionDesempeno(Request $request, $id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        $evaluacionDesempeno->update($request->all());

        return response()->json($evaluacionDesempeno, 200);
    }

    public function eliminarEvaluacionDesempeno($id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        $evaluacionDesempeno->delete();

        return response()->json(['message' => 'Evaluación de Desempeño eliminada correctamente'], 200);
    }
}
