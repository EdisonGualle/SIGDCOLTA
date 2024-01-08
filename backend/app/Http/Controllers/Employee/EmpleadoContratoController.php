<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoContratoController extends Controller
{
    public function listarContratosPorEmpleadoAuth()
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
    
        // Obtén los contratos realizados por el empleado
        $contratos = $empleado->contratos;
    
        // Verificar si existen contratos
        if ($contratos->isEmpty()) {
            return response()->json(['successful' => true, 'mensaje' => 'El empleado no tiene contratos registrados']);
        }
    
        $contratosArray = $contratos->map(function ($contrato) {
            return [
                'idContrato' => $contrato->idContrato,
                'fechaInicio' => $contrato->fechaInicio,
                'fechaFin' => $contrato->fechaFin,
                'idTipoContrato' => $contrato->idTipoContrato,
                'idEmpleado' => $contrato->idEmpleado,
                'created_at' => $contrato->created_at,
                'updated_at' => $contrato->updated_at,
            ];
        })->toArray();
    
        // Crear la respuesta JSON solo con los datos del empleado
        return response()->json([
            'successful' => true,
            'datos' => [
                'empleado' => [
                    'idEmpleado' => $empleado->idEmpleado,
                    'cedula' => $empleado->cedula,
                    'primerNombre' => $empleado->primerNombre,
                    'segundoNombre' => $empleado->segundoNombre,
                    'primerApellido' => $empleado->primerApellido,
                    'segundoApellido' => $empleado->segundoApellido,
                    'fechaNacimiento' => $empleado->fechaNacimiento,
                    'genero' => $empleado->genero,
                    'telefonoPersonal' => $empleado->telefonoPersonal,
                    'telefonoTrabajo' => $empleado->telefonoTrabajo,
                    'correo' => $empleado->correo,
                    'etnia' => $empleado->etnia,
                    'estadoCivil' => $empleado->estadoCivil,
                    'tipoSangre' => $empleado->tipoSangre,
                    'nacionalidad' => $empleado->nacionalidad,
                    'provinciaNacimiento' => $empleado->provinciaNacimiento,
                    'ciudadNacimiento' => $empleado->ciudadNacimiento,
                    'cantonNacimiento' => $empleado->cantonNacimiento,
                    'idCargo' => $empleado->idCargo,
                ],
                'contratos' => $contratosArray,
            ],
        ]);
    }
    
}
