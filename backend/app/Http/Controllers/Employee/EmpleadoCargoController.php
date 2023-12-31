<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoCargoController extends Controller
{
    public function mostrarInformacionEmpleadoCargoDepartamento()
    {
        $usuarioAutenticado = Auth::user();
    
        if (!$usuarioAutenticado) {
            return response()->json(['successful' => false, 'error' => 'Usuario no autenticado'], 401);
        }
    
        $empleado = $usuarioAutenticado->empleado;
    
        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }
    
        // No es necesario cargar explícitamente las relaciones
    
        // Crear la respuesta JSON
        $datos = [
            'empleado' => $empleado->toArray(),
            'cargo' => $empleado->cargo ? $empleado->cargo->toArray() : null,
            'departamento' => $empleado->departamento ? $empleado->departamento->toArray() : null,
        ];
    
        return response()->json(['successful' => true, 'datos' => $datos]);
    }
}
