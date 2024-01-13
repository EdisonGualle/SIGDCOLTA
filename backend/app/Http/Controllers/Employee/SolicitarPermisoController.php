<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permiso;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\AprobacionPermiso;
use App\Models\Empleado;
use App\Models\JerarquiaPermiso;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class SolicitarPermisoController extends Controller
{
    public function crearPermiso(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $idEmpleado = Auth::user()->idEmpleado;

        // Buscar el empleado que realiza la solicitud
        try {
            $empleadoSolicitante = Empleado::findOrFail($idEmpleado);
        } catch (ModelNotFoundException $e) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener el idCargo del empleado que realiza la solicitud
        $idCargoEmpleadoSolicitante = $empleadoSolicitante->idCargo;

        // Agregar el ID del empleado al request
        $request->merge(['idEmpleado' => $idEmpleado]);

        // Agregar la fecha y hora de solicitud al request
        $request->merge(['fechaSolicitud' => Carbon::now()]);

        $validator = Validator::make($request->all(), [
            'idTipoPermiso' => 'required|numeric|exists:tipopermiso,idTipoPermiso',
            'motivo' => 'required|string',
            'fechaInicio' => 'required|date_format:Y-m-d H:i:s',
            'fechaFinaliza' => 'required|date_format:Y-m-d H:i:s',
            'tiempoPermiso' => 'required|numeric',
            'idEstadoPermiso' => 'required|numeric|exists:estadopermiso,idEstadoPermiso',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el permiso
        $permiso = Permiso::create($request->all());

        // Encontrar el idEmpleadoAprobador basado en la jerarquía de permisos
        $idEmpleadoAprobador = $this->encontrarEmpleadoAprobador($idCargoEmpleadoSolicitante);

        if ($idEmpleadoAprobador === null) {
            return response()->json(['successful' => false, 'error' => 'Empleado aprobador no encontrado'], 500);
        }

        // Crear automáticamente la aprobación del permiso
        $aprobacionPermiso = new AprobacionPermiso([
            'idEmpleadoAprobador' => $idEmpleadoAprobador,
            'nivelAprobacion' => 0,
            'fechaDecision' => Carbon::now(),
            'idEstadoPermiso' => 1, // Estado pendiente
        ]);

        // Asociar la aprobación del permiso al permiso recién creado
        $permiso->aprobaciones()->save($aprobacionPermiso);

        return response()->json(['successful' => true, 'data' => $permiso], 201);
    }

    // Método para encontrar el idEmpleadoAprobador basado en la jerarquía de permisos
    private function encontrarEmpleadoAprobador($idCargoSolicitante)
    {
        try {
            $jerarquia = JerarquiaPermiso::where('idCargo', $idCargoSolicitante)->firstOrFail();
            $idCargoAprobador = $jerarquia->idCargoAprobador;

            // Buscar al empleado que tiene el cargo aprobador
            $empleadoAprobador = Empleado::where('idCargo', $idCargoAprobador)->firstOrFail();

            return $empleadoAprobador->idEmpleado;
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }


    public function listarMisPermisos()
    {
        // Obtener el ID del empleado autenticado
        $idEmpleado = Auth::user()->idEmpleado;

        // Obtener los permisos del empleado desde la base de datos
        $permisos = Permiso::where('idEmpleado', $idEmpleado)
            ->with(['tipoPermiso', 'estadoPermiso'])
            ->get();

        // Transformar la colección de permisos según tus requerimientos
        $permisosTransformados = $permisos->map(function ($permiso) {
            return [
                'idPermiso' => $permiso->idPermiso,
                'idTipoPermiso' => $permiso->tipoPermiso->nombre,
                'motivo' => $permiso->motivo,
                'fechaSolicitud' => $permiso->fechaSolicitud,
                'fechaInicio' => $permiso->fechaInicio,
                'fechaFinaliza' => $permiso->fechaFinaliza,
                'tiempoPermiso' => $permiso->tiempoPermiso,
                'idEstadoPermiso' => $permiso->estadoPermiso->estado,
            ];
        });

        // Retornar la lista de permisos en formato JSON
        return response()->json(['permisos' => $permisosTransformados], 200);
    }

}
