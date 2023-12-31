<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoDepartamentoController extends Controller
{
    public function obtenerDatosEmpleadoAuth()
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

        // Obtén el departamento asociado al empleado
        $departamento = $empleado->departamento;

        // Crear arrays separados
        $arrayEmpleado = [
            'successful' => true,
            'datosEmpleado' => $empleado, // Corregido de $datosEmpleado a $empleado
        ];

        $arrayDepartamento = [
            'successful' => true,
            'departamento' => $departamento, // Corregido de $datosDepartamento a $departamento
        ];

        // Verificar si la información del departamento está presente en la respuesta del empleado
        if (isset($arrayEmpleado['datosEmpleado']['departamento'])) {
            // Eliminar la información duplicada del departamento en la respuesta del empleado
            unset($arrayEmpleado['datosEmpleado']['departamento']);
        }

        // Retornar los arrays separados
        return response()->json([
            'empleado' => $arrayEmpleado,
            'departamento' => $arrayDepartamento,
        ]);
    }

}
