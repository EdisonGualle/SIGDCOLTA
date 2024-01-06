<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class EmpleadoInstruccionformalController extends Controller
{
    public function mostrarDetallesEmpleadoEInstruccionesFormales()
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

        // Obtén las instrucciones formales del empleado
        $instruccionesFormales = $empleado->instruccionesFormales->toArray();

        // Retornar la respuesta en el formato deseado
        return response()->json(['successful' => true, 'data' => ['empleado' => $datosEmpleado, 'instrucciones_formales' => $instruccionesFormales]]);
    }

    public function obtenerTotalInstruccionesFormales()
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

        // Obtén el total de instrucciones formales del empleado
        $totalInstruccionesFormales = $empleado->instruccionesFormales()->count();

        return response()->json(['successful' => true, 'totalInstruccionesFormales' => $totalInstruccionesFormales]);
    }

    public function listarInstruccionesFormalesOrdenadasPorFecha($orden = 'desc')
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

        // Obtén las instrucciones formales del empleado, ordenadas por fecha
        $instruccionesFormales = $empleado->instruccionesFormales()
            ->orderBy('fechaRegistro', $direccionOrden)
            ->get();

        return response()->json(['successful' => true, 'instruccionesFormales' => $instruccionesFormales]);
    }
}
