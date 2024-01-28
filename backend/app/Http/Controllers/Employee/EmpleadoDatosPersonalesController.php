<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoDatosPersonalesController extends Controller
{
    public function misDatosPersonales()
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

            // Crear la respuesta JSON con la información requerida
            $datos = [
    
                'informacionPersonal' => [
                    'usuario' => $usuarioAutenticado->usuario,
                    'cedula' => $empleado->cedula,
                    'nombre' => $empleado->primerNombre . ' ' . $empleado->segundoNombre,
                    'apellido' => $empleado->primerApellido . ' ' . $empleado->segundoApellido,
                    'fechaNacimiento' => $empleado->fechaNacimiento,
                    'genero' => $empleado->genero,  
                ],
                'informacionContacto' => [
                    'telefonoPesonal' => $empleado->telefonoPersonal,
                    'telefonoTrabajo' => $empleado->telefonoTrabajo,
                    'correoPersonal' => $empleado->correo,
                    'correoInstitucional' => $usuarioAutenticado->correo
                ],
                'informacionAdicional'=>[
                    'nacionalidad' => $empleado->nacionalidad,
                    'etnia' =>$empleado->etnia,
                    'estadoCivi'=>$empleado->estadoCivil,
                    'tipoSangre'=>$empleado->tipoSangre
                ],
                'ubicacionGeografica' =>[
                    'provincia'=>$empleado->provincia->nombre_provincia,
                    'canton'=>$empleado->canton->nombre_canton,
                ]
            ];

           

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