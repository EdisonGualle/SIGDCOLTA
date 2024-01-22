<?php

namespace App\Services\Employee;

use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\AprobacionPermiso;
use App\Models\JerarquiaPermiso;
use App\Models\Empleado;
use App\Models\Cargo;

class SolicitarPermisoService
{
    public function crearPermiso(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $idEmpleado = Auth::user()->idEmpleado;

        // Agregar el ID del empleado al request
        $request->merge(['idEmpleado' => $idEmpleado]);

        // Agregar la fecha y hora de solicitud al request
        $request->merge(['fechaSolicitud' => Carbon::now()]);

        // Validar los datos del permiso
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

        // Crear el permiso y asignar el valor devuelto a $permiso
        $permiso = Permiso::create($request->all());

        // Obtener el ID del jefe inmediato (idEmpleadoAprobador) según la jerarquía
        $idEmpleadoAprobador = $this->obtenerIdEmpleadoAprobador($permiso->tipoPermiso->idCargo);

        // Verificar si se obtuvo un ID de empleado aprobador
        if ($idEmpleadoAprobador === null) {
            return response()->json(['successful' => false, 'errors' => 'No se pudo determinar el jefe inmediato para la aprobación.'], 500);
        }

        // Crear automáticamente la aprobación del permiso
        $this->crearAprobacionPermiso($permiso, $idEmpleadoAprobador);

        return response()->json(['successful' => true, 'data' => $permiso], 201);
    }

    // Método para obtener el ID del jefe inmediato (idEmpleadoAprobador) según la jerarquía
    // Método para obtener el ID del jefe inmediato (idEmpleadoAprobador) según la jerarquía
// Método para obtener el ID del jefe inmediato (idEmpleadoAprobador) según la jerarquía// Método para obtener el ID del jefe inmediato (idEmpleadoAprobador) según la jerarquía
// Método para obtener el ID del jefe inmediato (idEmpleadoAprobador) según la jerarquía
private function obtenerIdEmpleadoAprobador($idCargoSolicitante)
{
    $idEmpleadoAprobador = null;

    // Bucle para buscar en la jerarquía hasta encontrar el jefe inmediato o llegar al final
    while ($jerarquia = JerarquiaPermiso::where('idCargo', $idCargoSolicitante)->first()) {
        // Obtener el idCargoAprobador directamente
        $idCargoAprobador = $jerarquia->idCargoAprobador;

        // Obtener el modelo Cargo del jefe inmediato
        $cargoAprobador = $jerarquia->cargoAprobador;

        // Verificar si se encontró el modelo Cargo
        if ($cargoAprobador) {
            // Obtener el idEmpleado del jefe inmediato usando la relación en el modelo Cargo
            $idEmpleadoAprobador = $cargoAprobador->empleado->idEmpleado;
            break;
        }

        // Actualizar el idCargoSolicitante para la próxima iteración
        $idCargoSolicitante = $idCargoAprobador;
    }

    return $idEmpleadoAprobador;
}




    // Método para crear la aprobación del permiso
    private function crearAprobacionPermiso(Permiso $permiso, $idEmpleadoAprobador)
    {
        $aprobacionPermiso = new AprobacionPermiso([
            'idEmpleadoAprobador' => $idEmpleadoAprobador,
            'nivelAprobacion' => 0,
            'fechaDecision' => Carbon::now(),
            'idEstadoPermiso' => 2, // Estado pendiente
        ]);

        // Asociar la aprobación del permiso al permiso recién creado
        $permiso->aprobaciones()->save($aprobacionPermiso);
    }
}
