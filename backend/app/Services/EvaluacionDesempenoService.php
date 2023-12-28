<?php

namespace App\Services;

use App\Models\Empleado;
use App\Models\EvaluacionDesempeno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvaluacionDesempenoService
{
    public function listarEvaluacionesDesempeno()
    {
        $evaluacionesDesempeno = EvaluacionDesempeno::all();
        return response()->json(['successful' => true, 'data' => $evaluacionesDesempeno]);
    }


    public function mostrarEvaluacionDesempeno($id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['successful' => false, 'error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $evaluacionDesempeno]);
    }


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

        // Subir y actualizar el archivo si existe en la solicitud
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->storeAs('archivos/evaluaciones', 'evaluacion_' . $evaluacionDesempeno->idEvaluacionDesempeno . '.' . $archivo->getClientOriginalExtension());

            // Actualizar la evaluación de desempeño con la nueva ruta del archivo
            $evaluacionDesempeno->update(['archivo' => $rutaArchivo]);
        }

        return response()->json(['successful' => true, 'data' => $evaluacionDesempeno]);
    }


    public function eliminarEvaluacionDesempeno($id)
    {
        $evaluacionDesempeno = EvaluacionDesempeno::find($id);

        if (!$evaluacionDesempeno) {
            return response()->json(['successful' => false, 'error' => 'Evaluación de Desempeño no encontrada'], 404);
        }

        $evaluacionDesempeno->delete();

        return response()->json(['successful' => true, 'message' => 'Evaluación de Desempeño eliminada correctamente']);
    }



    public function obtenerEvaluacionesPorEmpleado($idEmpleado)
    {
        // Verificar si el empleado existe
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener las evaluaciones del empleado
        $evaluaciones = EvaluacionDesempeno::where('idEmpleado', $idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $evaluaciones]);
    }


    public function obtenerEvaluacionesPorEvaluador($idEvaluador)
    {
        // Verificar si el evaluador existe
        $evaluador = Empleado::find($idEvaluador);

        if (!$evaluador) {
            return response()->json(['successful' => false, 'error' => 'Evaluador no encontrado'], 404);
        }

        // Obtener las evaluaciones del evaluador
        $evaluaciones = EvaluacionDesempeno::where('idEvaluador', $idEvaluador)->get();

        return response()->json(['successful' => true, 'data' => $evaluaciones]);
    }



    public function obtenerEvaluacionesPorFecha($fechaInicio, $fechaFin)
    {
        $validator = Validator::make(compact('fechaInicio', 'fechaFin'), [
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $evaluaciones = EvaluacionDesempeno::whereBetween('fechaEvaluacion', [$fechaInicio, $fechaFin])->get();

        return response()->json(['successful' => true, 'data' => $evaluaciones]);
    }


    public function obtenerEvaluacionesPorCalificacion($calificacionMinima)
    {
        $validator = Validator::make(['calificacionMinima' => $calificacionMinima], [
            'calificacionMinima' => 'required|numeric|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $evaluaciones = EvaluacionDesempeno::where('calificacionGeneral', '>', $calificacionMinima)->get();
        return response()->json(['successful' => true, 'data' => $evaluaciones]);
    }


    public function contarEvaluacionesPorEmpleado($idEmpleado)
    {
        // Validar que $idEmpleado sea un número entero
        $validator = Validator::make(['idEmpleado' => $idEmpleado], [
            'idEmpleado' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Contar las evaluaciones del empleado
        $cantidadEvaluaciones = EvaluacionDesempeno::where('idEmpleado', $idEmpleado)->count();
        return response()->json(['successful' => true, 'cantidad evaluaciones' => $cantidadEvaluaciones]);
    }


    public function calcularPromedioCalificacionPorEvaluador($idEvaluador)
    {
        // Validar que $idEvaluador sea un número entero
        $validator = Validator::make(['idEvaluador' => $idEvaluador], [
            'idEvaluador' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si el evaluador existe
        $evaluador = Empleado::find($idEvaluador);

        if (!$evaluador) {
            return response()->json(['successful' => false, 'error' => 'Evaluador no encontrado'], 404);
        }

        // Calcular el promedio de calificación del evaluador
        $promedioCalificacion = EvaluacionDesempeno::where('idEvaluador', $idEvaluador)->avg('calificacionGeneral');
        return response()->json(['successful' => true, 'data' => $promedioCalificacion]);
    }



    public function listasEvaluacionesPorEstado($estado)
    {
        $validator = Validator::make(['estado' => $estado], [
            'estado' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $evaluaciones = EvaluacionDesempeno::where('estadoEvaluacion', $estado)->get();

        return response()->json(['successful' => true, 'data' => $evaluaciones]);
    }
}
