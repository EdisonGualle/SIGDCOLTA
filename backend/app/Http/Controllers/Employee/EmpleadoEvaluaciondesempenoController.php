<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluaciondesempeno;
class EmpleadoEvaluaciondesempenoController extends Controller
{
    public function listarEvaluacionesDesempeno()
    {
        $usuarioAutenticado = Auth::user();

        if (!$usuarioAutenticado) {
            return response()->json(['successful' => false, 'error' => 'Usuario no autenticado'], 401);
        }

        $empleado = $usuarioAutenticado->empleado;

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $evaluacionesDesempeno = $empleado->evaluacionesDeEmpleado()->get();

        if ($evaluacionesDesempeno->isEmpty()) {
            return response()->json([
                'successful' => true,
                'message' => 'El empleado no tiene evaluaciones de desempeño',
                'empleado' => [
                    'idEmpleado' => $empleado->idEmpleado,
                    'segundoNombre' => $empleado->segundoNombre,
                    'segundoApellido' => $empleado->segundoApellido,
                    // Agrega más campos según sea necesario
                ],
                'evaluaciones' => [],
            ]);
        }

        $evaluacionesData = $evaluacionesDesempeno->map(function ($evaluacion) {
            return [
                'idEvaluacionDesempeno' => $evaluacion->idEvaluacionDesempeno,
                'fechaEvaluacion' => $evaluacion->fechaEvaluacion,
                'calificacionGeneral' => $evaluacion->calificacionGeneral,
                // Agrega más campos según sea necesario
            ];
        });

        $empleadoData = [
            'idEmpleado' => $empleado->idEmpleado,
            'segundo nombre' => $empleado->segundoNombre,
            'segundo apellido' => $empleado->segundoApellido,
            // Agrega más campos según sea necesario
        ];

        return response()->json([
            'successful' => true,
            'empleado' => $empleadoData,
            'evaluaciones' => $evaluacionesData,
        ]);
    }
    public function obtenerTotalEvaluacionesDesempeno()
    {
        $usuarioAutenticado = Auth::user();

        if (!$usuarioAutenticado) {
            return response()->json(['successful' => false, 'error' => 'Usuario no autenticado'], 401);
        }

        $empleado = $usuarioAutenticado->empleado;

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $totalEvaluacionesDesempeno = $empleado->evaluacionesDeEmpleado()->count();

        if ($totalEvaluacionesDesempeno == 0) {
            return response()->json(['successful' => true, 'message' => 'El empleado no tiene evaluaciones de desempeño']);
        }

        return response()->json(['successful' => true, 'total_evaluaciones' => $totalEvaluacionesDesempeno]);
    }
}
