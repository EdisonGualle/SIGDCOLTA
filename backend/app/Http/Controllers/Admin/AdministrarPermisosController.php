<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AprobacionPermiso;
use App\Models\EstadoPermiso;
use App\Models\Empleado;
use App\Models\Cargo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;



class AdministrarPermisosController extends Controller
{

    public function listarAprobacionesPermiso()
    {
        // Obtén el ID del empleado aprobador autenticado
        $idEmpleadoAprobador = Auth::user()->idEmpleado;

        // Verifica si el empleado aprobador tiene el cargo de 'Jefe de Talento Humano'
        $esJefeTalentoHumano = Cargo::where('nombre', 'Jefe de Talento Humano')
            ->whereHas('empleados', function ($query) use ($idEmpleadoAprobador) {
                $query->where('idEmpleado', $idEmpleadoAprobador);
            })->exists();

        // Busca todas las aprobaciones de permiso asociadas al idEmpleadoAprobador con información adicional
        $aprobaciones = AprobacionPermiso::with([
            'permiso' => function ($query) {
                $query->with(['empleado', 'tipoPermiso']);
            }
        ])->where('idEmpleadoAprobador', $idEmpleadoAprobador)->get();

        // Transforma la estructura de la respuesta dependiendo del cargo del empleado aprobador
        $data = $aprobaciones->map(function ($aprobacion) use ($esJefeTalentoHumano) {
            if ($esJefeTalentoHumano) {
                // Si es Jefe de Talento Humano
                return [
                    'idAprobacionSolicitud' => $aprobacion->idAprobacionSolicitud,
                    'direccion' => $aprobacion->permiso->empleado->cargo->unidad->direccion->nombre,
                    'unidad' => $aprobacion->permiso->empleado->cargo->unidad->nombre,
                    'cedula' => $aprobacion->permiso->empleado->cedula,
                    'nombresCompletos' => $aprobacion->permiso->empleado->nombresCompletos(),
                    'nombreTipoPermiso' => $aprobacion->permiso->tipoPermiso->nombre,
                    'motivo' => $aprobacion->permiso->motivo,
                    'fechaSolicitud' => $aprobacion->permiso->fechaSolicitud,
                    'fechaInicio' => $aprobacion->permiso->fechaInicio,
                    'fechaFinaliza' => $aprobacion->permiso->fechaFinaliza,
                    'tiempoPermiso' => $aprobacion->permiso->tiempoPermiso,
                    'estadoPermiso' => $aprobacion->estadoPermiso->estado,
                ];
            } else {
                // Si es otro empleado aprobador
                return [
                    'idAprobacionSolicitud' => $aprobacion->idAprobacionSolicitud,
                    'cedula' => $aprobacion->permiso->empleado->cedula,
                    'nombresCompletos' => $aprobacion->permiso->empleado->nombresCompletos(),
                    'nombreTipoPermiso' => $aprobacion->permiso->tipoPermiso->nombre,
                    'motivo' => $aprobacion->permiso->motivo,
                    'fechaSolicitud' => $aprobacion->permiso->fechaSolicitud,
                    'fechaInicio' => $aprobacion->permiso->fechaInicio,
                    'fechaFinaliza' => $aprobacion->permiso->fechaFinaliza,
                    'tiempoPermiso' => $aprobacion->permiso->tiempoPermiso,
                    'estadoPermiso' => $aprobacion->estadoPermiso->estado,
                ];
            }
        });

        // Devuelve las aprobaciones en formato JSON
        return response()->json(['successful' => true, 'data' => $data], 200);
    }

    public function listarAprobacionesEmpleadoId($idEmpleado)
    {
        // Obtén el ID del empleado aprobador autenticado
        $idEmpleadoAprobador = Auth::user()->idEmpleado;

        // Verifica si el empleado proporcionado existe
        $empleadoExistente = Empleado::where('idEmpleado', $idEmpleado)->exists();
        if (!$empleadoExistente) {
            return response()->json(['successful' => false, 'message' => 'Empleado no encontrado'], 404);
        }

        // Verifica si el empleado aprobador tiene el cargo de 'Jefe de Talento Humano'
        $esJefeTalentoHumano = Cargo::where('nombre', 'Jefe de Talento Humano')
            ->whereHas('empleados', function ($query) use ($idEmpleadoAprobador) {
                $query->where('idEmpleado', $idEmpleadoAprobador);
            })->exists();

        // Inicializa la consulta para obtener las aprobaciones de permiso
        $query = AprobacionPermiso::with([
            'permiso' => function ($query) {
                $query->with(['empleado', 'tipoPermiso']);
            }
        ])->where('idEmpleadoAprobador', $idEmpleadoAprobador);

        // Filtra por el empleado proporcionado
        $query->whereHas('permiso', function ($query) use ($idEmpleado) {
            $query->where('idEmpleado', $idEmpleado);
        });

        // Ejecuta la consulta
        $aprobaciones = $query->get();

        // Transforma la estructura de la respuesta dependiendo del cargo del empleado aprobador
        $data = $aprobaciones->map(function ($aprobacion) use ($esJefeTalentoHumano) {
            if ($esJefeTalentoHumano) {
                // Si es Jefe de Talento Humano
                return [
                    'idAprobacionSolicitud' => $aprobacion->idAprobacionSolicitud,
                    'direccion' => $aprobacion->permiso->empleado->cargo->unidad->direccion->nombre,
                    'unidad' => $aprobacion->permiso->empleado->cargo->unidad->nombre,
                    'cedula' => $aprobacion->permiso->empleado->cedula,
                    'nombresCompletos' => $aprobacion->permiso->empleado->nombresCompletos(),
                    'nombreTipoPermiso' => $aprobacion->permiso->tipoPermiso->nombre,
                    'motivo' => $aprobacion->permiso->motivo,
                    'fechaSolicitud' => $aprobacion->permiso->fechaSolicitud,
                    'fechaInicio' => $aprobacion->permiso->fechaInicio,
                    'fechaFinaliza' => $aprobacion->permiso->fechaFinaliza,
                    'tiempoPermiso' => $aprobacion->permiso->tiempoPermiso,
                    'estadoPermiso' => $aprobacion->estadoPermiso->estado,
                ];
            } else {
                // Si es otro empleado aprobador
                return [
                    'idAprobacionSolicitud' => $aprobacion->idAprobacionSolicitud,
                    'cedula' => $aprobacion->permiso->empleado->cedula,
                    'nombresCompletos' => $aprobacion->permiso->empleado->nombresCompletos(),
                    'nombreTipoPermiso' => $aprobacion->permiso->tipoPermiso->nombre,
                    'motivo' => $aprobacion->permiso->motivo,
                    'fechaSolicitud' => $aprobacion->permiso->fechaSolicitud,
                    'fechaInicio' => $aprobacion->permiso->fechaInicio,
                    'fechaFinaliza' => $aprobacion->permiso->fechaFinaliza,
                    'tiempoPermiso' => $aprobacion->permiso->tiempoPermiso,
                    'estadoPermiso' => $aprobacion->estadoPermiso->estado,
                ];
            }
        });

        // Devuelve las aprobaciones en formato JSON
        return response()->json(['successful' => true, 'data' => $data], 200);
    }

    // public function listarPermisosPorEstado($estadoPermiso)
    // {
    //     // Obtén el ID del empleado aprobador autenticado
    //     $idEmpleadoAprobador = Auth::user()->idEmpleado;

    //     // Validar que el estado proporcionado existe en la base de datos
    //     $estadoExistente = EstadoPermiso::where('estado', $estadoPermiso)->exists();
    //     if (!$estadoExistente) {
    //         return response()->json(['successful' => false, 'message' => 'Estado no encontrado'], 404);
    //     }

    //     // Inicializa la consulta para obtener las aprobaciones de permiso
    //     $query = AprobacionPermiso::with([
    //         'permiso' => function ($query) {
    //             $query->with(['empleado', 'tipoPermiso']);
    //         }
    //     ])->where('idEmpleadoAprobador', $idEmpleadoAprobador);

    //     // Filtra por el estado proporcionado
    //     $query->whereHas('estadoPermiso', function ($query) use ($estadoPermiso) {
    //         $query->where('estado', $estadoPermiso);
    //     });

    //     // Ejecuta la consulta
    //     $aprobaciones = $query->get();

    //     // Transforma la estructura de la respuesta
    //     $data = $aprobaciones->map(function ($aprobacion) {
    //         return [
    //             'idAprobacionSolicitud' => $aprobacion->idAprobacionSolicitud,
    //             'cedula' => $aprobacion->permiso->empleado->cedula,
    //             'nombresCompletos' => $aprobacion->permiso->empleado->nombresCompletos(),
    //             'nombreTipoPermiso' => $aprobacion->permiso->tipoPermiso->nombre,
    //             'motivo' => $aprobacion->permiso->motivo,
    //             'fechaSolicitud' => $aprobacion->permiso->fechaSolicitud,
    //             'fechaInicio' => $aprobacion->permiso->fechaInicio,
    //             'fechaFinaliza' => $aprobacion->permiso->fechaFinaliza,
    //             'tiempoPermiso' => $aprobacion->permiso->tiempoPermiso,
    //             'estadoPermiso' => $aprobacion->estadoPermiso->estado, // Ajusta esto según la columna real en tu tabla
    //         ];
    //     });

    //     // Devuelve las aprobaciones en formato JSON
    //     return response()->json(['successful' => true, 'data' => $data], 200);
    // }

    public function listarPermisosPorEstado($estadoPermiso)
    {
        // Obtén el ID del empleado aprobador autenticado
        $idEmpleadoAprobador = Auth::user()->idEmpleado;

        // Validar que el estado proporcionado existe en la base de datos
        $estadoExistente = EstadoPermiso::where('estado', $estadoPermiso)->exists();
        if (!$estadoExistente) {
            return response()->json(['successful' => false, 'message' => 'Estado no encontrado'], 404);
        }

        // Verifica si el empleado aprobador tiene el cargo de 'Jefe de Talento Humano'
        $esJefeTalentoHumano = Cargo::where('nombre', 'Jefe de Talento Humano')
            ->whereHas('empleados', function ($query) use ($idEmpleadoAprobador) {
                $query->where('idEmpleado', $idEmpleadoAprobador);
            })->exists();

        // Inicializa la consulta para obtener las aprobaciones de permiso
        $query = AprobacionPermiso::with([
            'permiso' => function ($query) {
                $query->with(['empleado', 'tipoPermiso']);
            }
        ])->where('idEmpleadoAprobador', $idEmpleadoAprobador);

        // Filtra por el estado proporcionado
        $query->whereHas('estadoPermiso', function ($query) use ($estadoPermiso) {
            $query->where('estado', $estadoPermiso);
        });

        // Ejecuta la consulta
        $aprobaciones = $query->get();

        // Transforma la estructura de la respuesta dependiendo del cargo del empleado aprobador
        $data = $aprobaciones->map(function ($aprobacion) use ($esJefeTalentoHumano) {
            if ($esJefeTalentoHumano) {
                // Si es Jefe de Talento Humano
                return [
                    'idAprobacionSolicitud' => $aprobacion->idAprobacionSolicitud,
                    'direccion' => $aprobacion->permiso->empleado->cargo->unidad->direccion->nombre,
                    'unidad' => $aprobacion->permiso->empleado->cargo->unidad->nombre,
                    'cedula' => $aprobacion->permiso->empleado->cedula,
                    'nombresCompletos' => $aprobacion->permiso->empleado->nombresCompletos(),
                    'nombreTipoPermiso' => $aprobacion->permiso->tipoPermiso->nombre,
                    'motivo' => $aprobacion->permiso->motivo,
                    'fechaSolicitud' => $aprobacion->permiso->fechaSolicitud,
                    'fechaInicio' => $aprobacion->permiso->fechaInicio,
                    'fechaFinaliza' => $aprobacion->permiso->fechaFinaliza,
                    'tiempoPermiso' => $aprobacion->permiso->tiempoPermiso,
                    'estadoPermiso' => $aprobacion->estadoPermiso->estado,
                ];
            } else {
                // Si es otro empleado aprobador
                return [
                    'idAprobacionSolicitud' => $aprobacion->idAprobacionSolicitud,
                    'cedula' => $aprobacion->permiso->empleado->cedula,
                    'nombresCompletos' => $aprobacion->permiso->empleado->nombresCompletos(),
                    'nombreTipoPermiso' => $aprobacion->permiso->tipoPermiso->nombre,
                    'motivo' => $aprobacion->permiso->motivo,
                    'fechaSolicitud' => $aprobacion->permiso->fechaSolicitud,
                    'fechaInicio' => $aprobacion->permiso->fechaInicio,
                    'fechaFinaliza' => $aprobacion->permiso->fechaFinaliza,
                    'tiempoPermiso' => $aprobacion->permiso->tiempoPermiso,
                    'estadoPermiso' => $aprobacion->estadoPermiso->estado,
                ];
            }
        });

        // Devuelve las aprobaciones en formato JSON
        return response()->json(['successful' => true, 'data' => $data], 200);
    }



    public function editarAprobacionPermisoId(Request $request, $idAprobacionSolicitud)
    {
        // Validar y obtener el idEmpleadoAprobador
        $idEmpleadoAprobador = Auth::user()->idEmpleado;

        // Validar y obtener la aprobación de permiso
        $aprobacion = AprobacionPermiso::where('idAprobacionSolicitud', $idAprobacionSolicitud)
            ->where('idEmpleadoAprobador', $idEmpleadoAprobador)
            ->first();

        // Verificar si la aprobación existe
        if (!$aprobacion) {
            return response()->json(['successful' => false, 'message' => 'Aprobación no encontrada o no autorizada'], 404);
        }

        // Validar y obtener datos de la solicitud
        $nivelAprobacion = $aprobacion->nivelAprobacion;
        $idEstadoPermiso = $request->input('idEstadoPermiso');
        $motivoRechazo = $request->input('motivoRechazo');

        // Verificar si el nivel de aprobación es válido
        if ($nivelAprobacion < 0 || $nivelAprobacion > 2) {
            return response()->json(['successful' => false, 'message' => 'Nivel de aprobación no válido'], 400);
        }

        // Obtener dinámicamente el ID del estado "Rechazado" desde la base de datos
        $idEstadoRechazado = EstadoPermiso::where('estado', 'Rechazado')->value('idEstadoPermiso');

        // Validar si el motivo de rechazo es obligatorio cuando el estado es "Rechazado"
        if ($idEstadoPermiso == $idEstadoRechazado && empty($motivoRechazo)) {
            return response()->json(['successful' => false, 'message' => 'El motivo de rechazo es obligatorio cuando el estado es "Rechazado"'], 400);
        }

        // Actualizar los campos necesarios
        $aprobacion->idEstadoPermiso = $idEstadoPermiso;
        $aprobacion->motivoRechazo = ($idEstadoPermiso == $idEstadoRechazado) ? $motivoRechazo : null;
        $aprobacion->fechaDecision = now();

        // Incrementar el nivel de aprobación solo si es 0
        $aprobacion->nivelAprobacion = ($nivelAprobacion == 0) ? 1 : $nivelAprobacion;

        // Guardar los cambios
        $aprobacion->save();

        // Obtener dinámicamente el ID del estado "Rechazado" desde la base de datos
        $idEstadoRechazado = EstadoPermiso::where('estado', 'Rechazado')->value('idEstadoPermiso');

        // Verificar si el estado es "Rechazado" y actualizar el estado en la tabla de permiso
        if ($idEstadoPermiso == $idEstadoRechazado) {
            // Obtener el permiso asociado a la aprobación
            $permiso = $aprobacion->permiso;
            // Actualizar el estado del permiso en la tabla de permiso
            $permiso->idEstadoPermiso = $idEstadoRechazado;
            $permiso->save();
        }

        // Obtener dinámicamente el ID del estado "Aprobado" desde la base de datos
        $idEstadoAprobado = EstadoPermiso::where('estado', 'Aprobado')->value('idEstadoPermiso');

        // Obtener dinámicamente el ID del estado "Pendiente" desde la base de datos
        $idEstadoPendiente = EstadoPermiso::where('estado', 'Pendiente')->value('idEstadoPermiso');
        // Verificar si el estado es "Aprobado" y actualizar el estado en la tabla de permiso a "Pendiente"

        if ($idEstadoPermiso == $idEstadoAprobado) {
            // Obtener el permiso asociado a la aprobación
            $permiso = $aprobacion->permiso;

            // Verificar si el estado del permiso en la tabla Permiso es "Rechazado" y cambiarlo a "Pendiente"
            if ($permiso->idEstadoPermiso == $idEstadoRechazado) {
                $permiso->idEstadoPermiso = $idEstadoPendiente; // Reemplaza $idEstadoPendiente con el ID correcto de "Pendiente"
                $permiso->save();
            }
        }
        // Obtener el id del cargo "Jefe de Talento Humano"
        $idCargoJefeTalentoHumano = Cargo::where('nombre', 'Jefe de Talento Humano')->value('idCargo');

        // Obtener el id del empleado con el cargo "Jefe de Talento Humano"
        $idEmpleadoAprobadorJefeTalentoHumano = Empleado::where('idCargo', $idCargoJefeTalentoHumano)->value('idEmpleado');
        // Obtener el permiso asociado a la aprobación
        $permiso = $aprobacion->permiso;

        // Verificar si ya existen dos aprobaciones para este permiso
        if ($permiso->aprobaciones->count() >= 2) {

            // Verificar que el nivel de aprobación sea 1 y el estado sea "Rechazado"
            if ($nivelAprobacion == 1 && $idEstadoPermiso == $idEstadoRechazado) {
                // Obtener la segunda aprobación del permiso con el nivel de aprobación 2
                $segundaAprobacion = $permiso->aprobaciones()->where('nivelAprobacion', 2)->first();

                // Eliminar la segunda aprobación del permiso
                $segundaAprobacion->delete();
            }

        } else {

            // Verificar que el nivel de aprobación no sea 1 y el estado no sea "Rechazado"
            if ($nivelAprobacion != 1 || $idEstadoPermiso != $idEstadoRechazado) {
                // Crear automáticamente la nueva aprobación del permiso con el id del Jefe de Talento Humano como aprobador
                $nuevaAprobacionPermiso = new AprobacionPermiso([
                    'idEmpleadoAprobador' => $idEmpleadoAprobadorJefeTalentoHumano,
                    'nivelAprobacion' => 2,
                    'fechaDecision' => now(),
                    'idEstadoPermiso' => 1, // Estado pendiente
                ]);

                // Asociar la nueva aprobación del permiso al permiso recién creado
                $permiso->aprobaciones()->save($nuevaAprobacionPermiso);
            }
        }

        // Actualizar la fecha de decisión solo si el nivel de aprobación es 1
        if ($nivelAprobacion == 2) {
            // Buscar la aprobación del "Jefe de Talento Humano"
            $aprobacionJefeTalentoHumano = $permiso->aprobaciones
                ->where('idEmpleadoAprobador', $idEmpleadoAprobadorJefeTalentoHumano)
                ->first();

            // Verificar si se encontró la aprobación del "Jefe de Talento Humano"
            if ($aprobacionJefeTalentoHumano) {
                // Actualizar la fecha de decisión de la aprobación del "Jefe de Talento Humano"
                $aprobacionJefeTalentoHumano->fechaDecision = now();
                $aprobacionJefeTalentoHumano->save();

                // Actualizar el estado del permiso a "Aprobado" si el estado de la aprobación del "Jefe de Talento Humano" es "Aprobado"
                if ($aprobacionJefeTalentoHumano->idEstadoPermiso == $idEstadoAprobado) {
                    $permiso->idEstadoPermiso = $idEstadoAprobado;
                    $permiso->save();
                }
            } else {
                return response()->json(['successful' => false, 'message' => 'Ya hay dos aprobaciones para este permiso y no se encontró la aprobación del Jefe de Talento Humano'], 400);
            }
        }


        // Mensaje de éxito
        return response()->json(['successful' => true, 'message' => 'Aprobación actualizada con éxito'], 200);
    }
}





