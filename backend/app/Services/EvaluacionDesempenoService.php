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
        // Obtener las evaluaciones de desempeño con la información relacionada
        $evaluaciones = EvaluacionDesempeno::with(['empleado', 'evaluador'])->get();

        // Formatear los datos según lo requerido
        $data = $evaluaciones->map(function ($evaluacion) {
            return [
                'idEvaluacionDesempeno' => $evaluacion->idEvaluacionDesempeno,
                'idEmpleado' => [
                    'id' => $evaluacion->empleado->idEmpleado,
                    'primerNombre' => $evaluacion->empleado->primerNombre,
                    'segundoNombre' => $evaluacion->empleado->segundoNombre,
                    'primerApellido' => $evaluacion->empleado->primerApellido,
                    'segundoApellido' => $evaluacion->empleado->segundoApellido,
                ],
                'idEvaluador' => [
                    'id' => $evaluacion->evaluador->idEmpleado,
                    'primerNombre' => $evaluacion->evaluador->primerNombre,
                    'segundoNombre' => $evaluacion->evaluador->segundoNombre,
                    'primerApellido' => $evaluacion->evaluador->primerApellido,
                    'segundoApellido' => $evaluacion->evaluador->segundoApellido,
                ],
                'fechaEvaluacion' => $evaluacion->fechaEvaluacion,
                'ObjetivosMetas' => $evaluacion->ObjetivosMetas,
                'cumplimientoObjetivos' => $evaluacion->cumplimientoObjetivos,
                'competencias' => $evaluacion->competencias,
                'calificacionGeneral' => $evaluacion->calificacionGeneral,
                'comentarios' => $evaluacion->comentarios,
                'areasMejora' => $evaluacion->areasMejora,
                'reconocimientosLogros' => $evaluacion->reconocimientosLogros,
                'desarrolloProfesional' => $evaluacion->desarrolloProfesional,
                'feedbackEmpleado' => $evaluacion->feedbackEmpleado,
                'estadoEvaluacion' => $evaluacion->estadoEvaluacion,
                'archivo' => $evaluacion->archivo,
            ];
        });

        // Devolver la respuesta JSON con los datos formateados
        
        return response()->json(['successful' => true, 'data' => $data]);
    }
    public function listarSinEvaluacionesDesempeno()
    {
        // Obtiene todos los IDs de empleados con evaluaciones de desempeño
        $empleadosConEvaluaciones = EvaluacionDesempeno::pluck('idEmpleado')->unique()->toArray();

        // Obtiene los empleados que no están en la lista de IDs de empleados con evaluaciones de desempeño
        $empleadosSinEvaluaciones = Empleado::whereNotIn('idEmpleado', $empleadosConEvaluaciones)->get();
        return response()->json(['successful' => true, 'data' => $empleadosSinEvaluaciones]);
        
    }
     
    


    public function mostrarEvaluacionDesempenoPorId($id)
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



    public function listarEvaluacionesPorEmpleadoId($idEmpleado)
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


    public function listarEvaluacionesPorEvaluadorId($idEvaluador)
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



    public function listarEvaluacionesPorRangoFechas($fechaInicio, $fechaFin)
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


    public function listarEvaluacionesPorCedulaEmpleado($cedulaEmpleado)
    {
        // Verificar si el empleado existe
        $empleado = Empleado::where('cedula', $cedulaEmpleado)->first();

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener las evaluaciones del empleado
        $evaluaciones = EvaluacionDesempeno::where('idEmpleado', $empleado->idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $evaluaciones]);
    }

    public function listarEvaluacionesPorCedulaEvaluador($cedulaEvaluador)
    {
        // Verificar si el evaluador existe
        $evaluador = Empleado::where('cedula', $cedulaEvaluador)->first();

        if (!$evaluador) {
            return response()->json(['successful' => false, 'error' => 'Evaluador no encontrado'], 404);
        }

        // Obtener las evaluaciones del evaluador
        $evaluaciones = EvaluacionDesempeno::where('idEvaluador', $evaluador->idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $evaluaciones]);
    }
}
