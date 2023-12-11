<?php

namespace App\Http\Controllers;

use App\Models\PreguntaRespuestaCuestionario;
use Illuminate\Http\Request;

class PreguntaRespuestaCuestionarioController extends Controller
{
    public function listarPreguntasRespuestasCuestionarios()
    {
        $preguntasRespuestasCuestionarios = PreguntaRespuestaCuestionario::all();
        return response()->json($preguntasRespuestasCuestionarios);
    }

    public function mostrarPreguntaRespuestaCuestionario($id)
    {
        $preguntaRespuestaCuestionario = PreguntaRespuestaCuestionario::find($id);

        if (!$preguntaRespuestaCuestionario) {
            return response()->json(['error' => 'Pregunta y Respuesta de Cuestionario no encontrada'], 404);
        }

        return response()->json($preguntaRespuestaCuestionario);
    }

    public function crearPreguntaRespuestaCuestionario(Request $request)
    {
        $preguntaRespuestaCuestionario = PreguntaRespuestaCuestionario::create($request->all());
        return response()->json($preguntaRespuestaCuestionario, 201);
    }

    public function actualizarPreguntaRespuestaCuestionario(Request $request, $id)
    {
        $preguntaRespuestaCuestionario = PreguntaRespuestaCuestionario::find($id);

        if (!$preguntaRespuestaCuestionario) {
            return response()->json(['error' => 'Pregunta y Respuesta de Cuestionario no encontrada'], 404);
        }

        $preguntaRespuestaCuestionario->update($request->all());

        return response()->json($preguntaRespuestaCuestionario, 200);
    }

    public function eliminarPreguntaRespuestaCuestionario($id)
    {
        $preguntaRespuestaCuestionario = PreguntaRespuestaCuestionario::find($id);

        if (!$preguntaRespuestaCuestionario) {
            return response()->json(['error' => 'Pregunta y Respuesta de Cuestionario no encontrada'], 404);
        }

        $preguntaRespuestaCuestionario->delete();

        return response()->json(['message' => 'Pregunta y Respuesta de Cuestionario eliminada correctamente'], 200);
    }
}
