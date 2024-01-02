<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    
        return response()->json(['successful' => true, 'data' => $evaluacionesDesempeno]);
    }
    
    public function obtenerTotalEvaluacionesDesempeno()
    {
        $usuarioAutenticado = Auth::user();
    
        if (!$usuarioAutenticado) {
            return response()->json(['successful' => false, 'error' => 'Usuario no autenticado'], 401);
        }
    
        $totalEvaluacionesDesempeno = $usuarioAutenticado->empleado->evaluacionesDeEmpleado()->count();
    
        return response()->json(['successful' => true, 'data' => $totalEvaluacionesDesempeno]);
    }
    
}
