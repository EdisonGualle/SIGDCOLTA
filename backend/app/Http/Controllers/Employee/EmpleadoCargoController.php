<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoCargoController extends Controller
{
    public function miCargo()
    {
        try {
            // Verificar si el usuario está autenticado
            $usuarioAutenticado = Auth::user();
            if (!$usuarioAutenticado) {
                return $this->errorResponse('Usuario no autenticado', 401);
            }

            // Obtener el empleado asociado al usuario autenticado
            $empleado = $usuarioAutenticado->empleado;

            // Verificar si el empleado existe
            if (!$empleado) {
                return $this->errorResponse('Empleado no encontrado', 404);
            }

            // Obtener información del cargo y de la unidad del empleado
            $cargo = $empleado->cargo;

            // Crear la respuesta JSON con información reducida
            $datos = [
                'empleado' => [
                    'cedula' => $empleado->cedula,
                    'nombre' => $empleado->primerNombre . ' ' . $empleado->segundoNombre,
                    'apellido' => $empleado->primerApellido . ' ' . $empleado->segundoApellido,
                ],
                'cargo' => $cargo ? $cargo->toArray() : null,
            ];

            // Validar la existencia del cargo
            if (!$cargo) {
                $datos['mensaje_cargo'] = 'El empleado no tiene asignado un cargo aún.';
            }

            // Si hay cargo, obtener información de la unidad a través del cargo
            if ($cargo) {
                $unidad = $cargo->unidad;
                $datos['unidad'] = $unidad ? $unidad->toArray() : null;

                // Validar la existencia de la unidad
                if (!$unidad) {
                    $datos['mensaje_unidad'] = 'El empleado no tiene asignada una unidad aún.';
                }
            }

            return $this->successResponse('Datos obtenidos correctamente', $datos);
        } catch (\Exception $e) {
            return $this->errorResponse('Error interno del servidor', 500);
        }
    }

    private function successResponse($message, $data = null)
    {
        return response()->json(['successful' => true, 'message' => $message, 'datos' => $data]);
    }

    private function errorResponse($message, $statusCode)
    {
        return response()->json(['successful' => false, 'error' => $message], $statusCode);
    }
}
