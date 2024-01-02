<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoDatobancarioController extends Controller
{
    public function mostrarDatosBancariosEmpleadoAuth()
    {
        // Obtén al usuario autenticado
        $usuarioAutenticado = Auth::user();
    
        if (!$usuarioAutenticado) {
            return response()->json(['successful' => false, 'error' => 'Usuario no autenticado'], 401);
        }
    
        // Obtén el modelo Empleado a través del modelo User
        $empleado = $usuarioAutenticado->empleado;
    
        // Verifica si el empleado existe
        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }
    
        // Obtén los datos bancarios asociados al empleado
        $datosBancarios = $empleado->datosBancarios;
    
        // Elimina los datos bancarios del array de empleado
        $datosEmpleado = $empleado->toArray();
        unset($datosEmpleado['datos_bancarios']);
    
        // Respuesta final
        $respuesta = [
            'successful' => true,
            'datosEmpleado' => $datosEmpleado,
            'datosBancarios' => $datosBancarios->isEmpty() ? [] : $datosBancarios->toArray(),
        ];
    
        return response()->json($respuesta);
    }
}
