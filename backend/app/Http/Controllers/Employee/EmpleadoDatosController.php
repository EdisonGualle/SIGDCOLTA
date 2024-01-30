<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class EmpleadoDatosController extends Controller
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
                'informacionAdicional' => [
                    'nacionalidad' => $empleado->nacionalidad,
                    'etnia' => $empleado->etnia,
                    'estadoCivil' => $empleado->estadoCivil,
                    'tipoSangre' => $empleado->tipoSangre
                ],
                'ubicacionGeografica' => [
                    'provincia' => $empleado->provincia->nombre_provincia,
                    'canton' => $empleado->canton->nombre_canton,
                ]
            ];

            return $this->successResponse('Datos obtenidos correctamente', $datos);
        } catch (\Exception $e) {
            return $this->errorResponse('Error interno del servidor', 500);
        }
    }

    public function misDatosLaborales()
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

            $contratoActivo = null;
            // Obtener el contrato activo del empleado
            $contratoActivo = $empleado->contratos->where('estadoContrato', 'activo')->first();

            // Verificar si hay un contrato activo
            if (!$contratoActivo) {
                return $this->errorResponse('Contrato activo no encontrado', 404);
            }

            // Crear la respuesta JSON con la información requerida
            $datos = [

                'informacionDatosLaborales' => [
                    'direccion' => $empleado->cargo->unidad->direccion->nombre,
                    'unidad' => $empleado->cargo->unidad->nombre,
                    'cargo' => $empleado->cargo->nombre,
                    'salario' => $contratoActivo->salario,
                    'fechaIngreso' => $contratoActivo->fechaInicio,
                    'fechaTermino' => $contratoActivo->fechaFin,
                    'tipoContrato' => $contratoActivo->tipoContrato->nombre,
                ],
                'informacionTipoContrato' => [
                    'descripcion' => $contratoActivo->tipoContrato->descripcion,
                    'clausulas' => $contratoActivo->tipoContrato->clausulas,
                ]
            ];



            return $this->successResponse('Datos obtenidos correctamente', $datos);
        } catch (\Exception $e) {
            return $this->errorResponse('Error interno del servidor', 500);
        }
    }

    public function misDatosUsuario()
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

            $contratoActivo = null;
            // Obtener el contrato activo del empleado
            $contratoActivo = $empleado->contratos->where('estadoContrato', 'activo')->first();

            // Verificar si hay un contrato activo
            if (!$contratoActivo) {
                return $this->errorResponse('Contrato activo no encontrado', 404);
            }

            // Crear la respuesta JSON con la información requerida
            $datos = [
                'perfil' => [
                    'idUsuario' => $usuarioAutenticado->idUsuario,
                    'usuario' => $usuarioAutenticado->usuario,
                    'idEmpleado' => $empleado->idEmpleado,
                    'nombre' => $empleado->primerNombre . ' ' . $empleado->segundoNombre,
                    'apellido' => $empleado->primerApellido . ' ' . $empleado->segundoApellido,
                    'correoPersonal' => $empleado->correo,
                    'telefonoPersonal' => $empleado->telefonoPersonal,
                    'correoInstitucional' => $usuarioAutenticado->correo,
                    'contrasena' => $usuarioAutenticado->password,
                ]
            ];
            return $this->successResponse('Datos obtenidos correctamente', $datos);
        } catch (\Exception $e) {
            return $this->errorResponse('Error interno del servidor', 500);
        }
    }
    public function actualizarMisDatosUsuario(Request $request)
    {
        try {
            $usuarioAutenticado = Auth::user();

            if (!$usuarioAutenticado) {
                return $this->errorResponse('Usuario no autenticado', 401);
            }

            $empleado = $usuarioAutenticado->empleado;

            if (!$empleado) {
                return $this->errorResponse('Empleado no encontrado', 404);
            }

            $datosEmpleado = [
                'primerNombre' => $request->input('primerNombre'),
                'segundoNombre' => $request->input('segundoNombre'),
                'primerApellido' => $request->input('primerApellido'),
                'segundoApellido' => $request->input('segundoApellido'),
                'correo' => $request->input('correoPersonal'),
                'telefonoPersonal' => $request->input('telefonoPersonal'),
                // Agrega más columnas según tus necesidades
            ];

            // Filtra solo los campos no nulos para la actualización
            $datosEmpleado = array_filter($datosEmpleado, function ($valor) {
                return $valor !== null;
            });

            // Verifica si se proporcionaron campos de empleado para actualizar
            if (!empty($datosEmpleado)) {
                $empleado->update($datosEmpleado);
            }

            $datosUsuario = [
                'correo' => $request->input('correoInstitucional'),
                // Agrega más columnas según tus necesidades
            ];

              // Actualiza la contraseña si se proporciona en la solicitud
        if ($request->has('contrasena')) {
            $usuarioAutenticado->password = bcrypt($request->input('contrasena'));
        }

            // Filtra solo los campos no nulos para la actualización
        $datosUsuario = array_filter($datosUsuario, function ($valor) {
            return $valor !== null;
        });

        // Verifica si se proporcionaron campos de usuario para actualizar
        if (!empty($datosUsuario)) {
            // Actualiza cada campo individualmente
            foreach ($datosUsuario as $campo => $valor) {
                $usuarioAutenticado->$campo = $valor;
            }
            if ($usuarioAutenticado instanceof \Illuminate\Database\Eloquent\Model) {
                $usuarioAutenticado->update($datosUsuario);
            }
        }


            return $this->successResponse('Datos actualizados correctamente', [
                'perfil' => [
                    'idUsuario' => $usuarioAutenticado->idUsuario,
                    'usuario' => $usuarioAutenticado->usuario,
                    'idEmpleado' => $empleado->idEmpleado,
                    'nombre' => $empleado->primerNombre . ' ' . $empleado->segundoNombre,
                    'apellido' => $empleado->primerApellido . ' ' . $empleado->segundoApellido,
                    'correoPersonal' => $empleado->correo,
                    'telefonoPersonal' => $empleado->telefonoPersonal,
                    'correoInstitucional' => $usuarioAutenticado->correo,
                    'contrasena'=>$usuarioAutenticado->password,
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error interno del servidor: ' . $e->getMessage());
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