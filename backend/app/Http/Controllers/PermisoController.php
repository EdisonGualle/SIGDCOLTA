<?php

namespace App\Http\Controllers;

use App\Repositories\PermisoRepositoryInterface;
use App\Transformers\PermisoTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermisoController extends Controller
{
    protected $permisoRepository;

    public function __construct(PermisoRepositoryInterface $permisoRepository)
    {
        $this->permisoRepository = $permisoRepository;
    }

    public function listarPermisos()
    {
        $permisosTransformados = $this->permisoRepository->all();
        //$permisosTransformados = PermisoTransformer::transformCollection($permisos);

        return response()->json(['successful' => true, 'data' => $permisosTransformados]);
    }

    public function mostrarPermiso($id)
    {
        $permiso = $this->permisoRepository->find($id);

        if (!$permiso) {
            return response()->json(['successful' => false, 'error' => 'Permiso no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $permiso]);
    }

    public function crearPermiso(Request $request)
    {
        try {


            $validacion=$this->permisoRepository->validacion($request);

            // Validar los datos de entrada
            $validator = Validator::make($request->all(), [
                'fechaSolicitud' => 'required|date',
                'fechaInicio' => 'required|date',
                'fechaFinaliza' => 'required|date',
                'tiempoPermiso' => 'required|string',
                'aprobacionJefeInmediato' => 'required|boolean',
                'aprobacionTalentoHumano' => 'required|boolean',
                'idTipoPermiso' => 'required|numeric',
                'idEmpleado' => 'required|numeric',
            ]);

            // Si la validación falla, retornar errores
            if ($validator->fails()) {
                return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
            }

            // Crear el permiso utilizando el repositorio
            $permiso = $this->permisoRepository->create($request->all());

            return response()->json(['successful' => true, 'data' => $permiso], 201);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => $e->getMessage()], $e->getCode());
        }
    }

    public function actualizarPermiso(Request $request, $id)
    {
        try {
            // Validar los datos de entrada
            $validator = Validator::make($request->all(), [
                'fechaSolicitud' => 'date',
                'fechaInicio' => 'date',
                'fechaFinaliza' => 'date',
                'tiempoPermiso' => 'string',
                'aprobacionJefeInmediato' => 'boolean',
                'aprobacionTalentoHumano' => 'boolean',
                'idTipoPermiso' => 'numeric',
                'idEmpleado' => 'numeric',
            ]);

            // Si la validación falla, lanzar una excepción
            if ($validator->fails()) {
                throw new \Exception('Datos de entrada no válidos', 422);
            }

            // Actualizar el permiso utilizando el repositorio
            $permiso = $this->permisoRepository->update($id, $request->all());

            if (!$permiso) {
                throw new \Exception('Permiso no encontrado', 404);
            }

            return response()->json(['successful' => true, 'data' => $permiso]);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => $e->getMessage()], $e->getCode());
        }
    }

    public function eliminarPermiso($id)
    {
        try {
            // Eliminar el permiso utilizando el repositorio
            $result = $this->permisoRepository->delete($id);

            if (!$result) {
                throw new \Exception('Permiso no encontrado', 404);
            }

            return response()->json(['successful' => true, 'message' => 'Permiso eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => $e->getMessage()], $e->getCode());
        }
    }
}




/* 
NuevaNueva
capacitacion
cargo
contrato
controldiario
datobancario
departamento
discapacidad
empleado
empleado_has_capacitacion
empleado_has_discapacidad
empleado_has_instruccionformal
estado
evaluaciondesempeno
experiencialaboral
instruccionformal
migrations
model_has_permissions
model_has_roles
permiso
permissions
personal_access_tokens
referencialaboral
residencia
roles
role_has_permissions
salidacampo
tipocontrato
tipopermiso
tiposalida
unidad
usuario */