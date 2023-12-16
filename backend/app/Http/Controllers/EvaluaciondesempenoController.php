<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluacionDesempeno;
use Illuminate\Support\Facades\Validator;

class EvaluacionDesempenoController extends Controller
{
    /**
     * Lista todas las evaluaciones de desempeño.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarEvaluacionesDesempeno()
    {
        $evaluacionesDesempeno = EvaluacionDesempeno::all();
        return response()->json(['successful' => true, 'data' => $evaluacionesDesempeno]);
    }

    /**
     * Muestra los detalles de una evaluación de desempeño específica.
     *
     * @param  int  $id - ID de la evaluación de desempeño
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarEvaluacionDesempeno($id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['successful' => false, 'error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $evaluacionDesempeno]);
    }

    /**
     * Crea una nueva evaluación de desempeño con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearEvaluacionDesempeno(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|numeric',
            'idEvaluador' => 'required|numeric',
            'fechaEvaluacion' => 'required|date',
            'ObjetivosMetas' => 'required|string|max:255',
            'cumplimientoObjetivos' => 'required|numeric|min:0|max:100',
            'competencias' => 'required|string',
            'calificacionGeneral' => 'required|numeric|min:0|max:100',
            'comentarios' => 'required|string',
            'areasMejora' => 'required|string',
            'reconocimientosLogros' => 'required|string',
            'desarrolloProfesional' => 'required|string',
            'feedbackEmpleado' => 'required|string',
            'estadoEvaluacion' => 'required|string|max:255',
            'archivo' => 'nullable|mimes:pdf,doc,docx',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la evaluación de desempeño sin el archivo
        $evaluacionDesempeno = EvaluacionDesempeno::create($request->except('archivo'));

        // Subir el archivo al directorio de almacenamiento si existe
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->storeAs('archivos/evaluaciones', 'evaluacion_' . $evaluacionDesempeno->idEvaluacionDesempeno . '.' . $archivo->getClientOriginalExtension());

            // Actualizar la evaluación de desempeño con la ruta del archivo
            $evaluacionDesempeno->update(['archivo' => $rutaArchivo]);
        }

        return response()->json(['successful' => true, 'data' => $evaluacionDesempeno], 201);
    }

    /**
     * Actualiza los detalles de una evaluación de desempeño existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID de la evaluación de desempeño a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarEvaluacionDesempeno(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'numeric',
            'idEvaluador' => 'numeric',
            'fechaEvaluacion' => 'date',
            'ObjetivosMetas' => 'string|max:255',
            'cumplimientoObjetivos' => 'numeric|min:0|max:100',
            'competencias' => 'string',
            'calificacionGeneral' => 'numeric|min:0|max:100',
            'comentarios' => 'string',
            'areasMejora' => 'string',
            'reconocimientosLogros' => 'string',
            'desarrolloProfesional' => 'string',
            'feedbackEmpleado' => 'string',
            'estadoEvaluacion' => 'string|max:255',
            'archivo' => 'nullable|mimes:pdf,doc,docx',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['successful' => false, 'error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        // Actualizar la evaluación de desempeño sin el archivo
        $evaluacionDesempeno->update($request->except('archivo'));

        // Subir el archivo al directorio público
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->storeAs('public/archivos/evaluaciones', 'evaluacion_' . $evaluacionDesempeno->idEvaluacionDesempeno . '.' . $archivo->getClientOriginalExtension());

            // Obtener la ruta relativa del archivo
            $rutaArchivo = str_replace('public/', 'storage/', $rutaArchivo);

            // Actualizar la evaluación de desempeño con la ruta del archivo
            $evaluacionDesempeno->update(['archivo' => $rutaArchivo]);
        }

        return response()->json(['successful' => true, 'data' => $evaluacionDesempeno]);
    }

    /**
     * Elimina una evaluación de desempeño existente.
     *
     * @param  int  $id - ID de la evaluación de desempeño a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarEvaluacionDesempeno($id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['successful' => false, 'error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        $evaluacionDesempeno->delete();

        return response()->json(['successful' => true, 'message' => 'Evaluación de Desempeño eliminada correctamente']);
    }
}
