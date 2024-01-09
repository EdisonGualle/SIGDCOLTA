<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoExperiencialaboralController extends Controller
{
    public function mostrarDetallesEmpleadoYExperiencias()
    {
        try {
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
            $experienciasLaborales = $empleado->experienciasLaborales;
    
            // Array de empleados solo con información de empleados
            $arrayEmpleados = $datosEmpleado;
    
            // Array de experiencias laborales
            $arrayExperienciasLaborales = $experienciasLaborales->isEmpty() ?
                ['message' => 'El empleado no tiene experiencias laborales subidas aún'] :
                $experienciasLaborales->toArray();
    
            // Retornar la respuesta en el formato deseado
            return response()->json(['successful' => true, 'data' => ['empleado' => $arrayEmpleados, 'experiencias_laborales' => $arrayExperienciasLaborales]]);
        } catch (\Exception $e) {
            // Manejar cualquier excepción inesperada
            return response()->json(['successful' => false, 'error' => 'Error interno del servidor'], 500);
        }
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
