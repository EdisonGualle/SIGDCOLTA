<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoCapacitacionController extends Controller
{
    /**
     * Lista las capacitaciones realizadas por el usuario autenticado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarCapacitacionesPorEmpleadoAuth()
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

        // Obtén las capacitaciones realizadas por el empleado
        $capacitacionesRealizadas = $empleado->capacitacionesDeEmpleado()->with('capacitacion')->get();

        $datos = [
            'capacitaciones' => $capacitacionesRealizadas->pluck('capacitacion')->toArray(),
        ];

        return response()->json(['successful' => true, 'datos' => [$datos]]);
    }

    /**
     * Obtener la cantidad total de capacitaciones que ha realizado el usuario autenticado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtenerTotalCapacitacionesPorEmpleadoAuth()
    {
        // Obtén al usuario autenticado
        $usuarioAutenticado = Auth::user();

        if (!$usuarioAutenticado) {
            return response()->json(['successful' => false, 'error' => 'Usuario no autenticado'], 401);
        }

        // Obtén la cantidad total de capacitaciones realizadas por el usuario autenticado
        $totalCapacitaciones = $usuarioAutenticado->empleado->capacitacionesDeEmpleado()->count();

        return response()->json(['successful' => true, 'datos' => $totalCapacitaciones]);
    }


    // Corregir 
    /**
     * Lista las capacitaciones realizadas por el usuario autenticado, ordenadas por fecha.
     *
     * @param string $orden
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarCapacitacionesOrdenadasPorFecha($orden = 'desc')
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

        // Obtén las capacitaciones realizadas por el empleado, ordenadas por fecha
        $capacitacionesRealizadas = $empleado->capacitacionesDeEmpleado()
            ->join('capacitacion', 'empleado_has_capacitacion.idCapacitacion', '=', 'capacitacion.idCapacitacion')
            ->orderBy('capacitacion.created_at', $direccionOrden)
            ->get();

        $datos = [
            'idEmpleado' => $empleado->idEmpleado,
            'capacitaciones' => $capacitacionesRealizadas->pluck('capacitacion')->toArray(),
        ];

        return response()->json(['successful' => true, 'datos' => [$datos]]);
    }
}
