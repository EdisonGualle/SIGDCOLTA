<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoCargoController extends Controller
{
    public function mostrarInformacionEmpleadoCargoDepartamento()
    {
        // Verificar si el usuario está autenticado
        $usuarioAutenticado = Auth::user();
        if (!$usuarioAutenticado) {
            return response()->json(['successful' => false, 'error' => 'Usuario no autenticado'], 401);
        }

        // Obtener el empleado asociado al usuario autenticado
        $empleado = $usuarioAutenticado->empleado;

        // Verificar si el empleado existe
        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener información del cargo y del departamento del empleado
        $cargo = $empleado->cargo;
        $departamento = $empleado->departamento;

        // Crear la respuesta JSON
        $datos = [
            'empleado' => $empleado->toArray(),
            'cargo' => $cargo ? $cargo->toArray() : null,
            'departamento' => $departamento ? $departamento->toArray() : null,
        ];

        // Validar la existencia del cargo
        if (!$cargo) {
            $datos['mensaje_cargo'] = 'El empleado no tiene asignado un cargo aun.';
        }

        // Validar la existencia del departamento
        if (!$departamento) {
            $datos['mensaje_departamento'] = 'El empleado no tiene asignado un departamento aun .';
        }

        return response()->json(['successful' => true, 'datos' => $datos]);
    }
}
