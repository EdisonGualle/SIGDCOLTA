<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoExperiencialaboralController extends Controller
{
    public function mostrarDetallesEmpleadoYExperiencias()
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

        // Crear el array con los detalles del empleado
        $datosEmpleado = $empleado->toArray();

        // Obtén las experiencias laborales del empleado
        $experienciasLaborales = $empleado->experienciasLaborales->toArray();

        // Retornar la respuesta en el formato deseado
        return response()->json(['successful' => true, 'data' => ['empleado' => $datosEmpleado, 'experiencias_laborales' => $experienciasLaborales]]);
    }
    
    public function obtenerTotalExperienciasLaborales()
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

        // Obtén el total de experiencias laborales del empleado
        $totalExperienciasLaborales = $empleado->experienciasLaborales()->count();

        return response()->json(['successful' => true, 'totalExperienciasLaborales' => $totalExperienciasLaborales]);
    }

    //Lista las experiencias laborales realizadas por el usuario autenticado, ordenadas por fecha.
   
    public function listarExperienciasLaboralesOrdenadasPorFecha($orden = 'desc')
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

        // Valida la dirección del ordenamiento
        $direccionOrden = strtolower($orden) === 'asc' ? 'asc' : 'desc';

        // Obtén las experiencias laborales del empleado, ordenadas por fecha
        $experienciasLaborales = $empleado->experienciasLaborales()
            ->orderBy('fechaDesde', $direccionOrden)
            ->get();

        return response()->json(['successful' => true, 'experienciasLaborales' => $experienciasLaborales]);
    }
}
