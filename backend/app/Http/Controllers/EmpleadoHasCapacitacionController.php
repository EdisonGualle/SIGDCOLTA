<?php

namespace App\Http\Controllers;

use App\Models\Capacitacion;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\EmpleadoHasCapacitacion;
use Illuminate\Support\Facades\Validator;

class EmpleadoHasCapacitacionController extends Controller
{


    /**
     * Crea una asignación de capacitación para un empleado.
     *
     * @param  Request $request
     *         Parámetros de entrada:
     *         - 'idEmpleado': ID del empleado (numérico, obligatorio).
     *         - 'idCapacitacion': ID de la capacitación (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearAsignacionCapacitacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
            'idCapacitacion' => 'required|exists:capacitacion,idCapacitacion',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $empleado = Empleado::find($request->idEmpleado);
        $capacitacion = Capacitacion::find($request->idCapacitacion);

        if (!$empleado || !$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Empleado o capacitación no encontrados'], 404);
        }

        // Check if the relationship already exists
        if (!$empleado->capacitaciones->contains($capacitacion->idCapacitacion)) {
            $empleado->capacitaciones()->attach($capacitacion);
        }

        return response()->json(['successful' => true, 'message' => 'Asignación creada exitosamente']);
    }


    /**
     * Actualiza la información de una asignación de capacitación para un empleado.
     *
     * @param  Request $request
     *         Parámetros de entrada:
     *         - 'idEmpleado': ID del empleado (numérico, obligatorio).
     *         - 'idCapacitacion': ID de la capacitación (numérico, obligatorio).
     *         - 'nuevaInformacion': Nueva información que se desea actualizar (pueden ser más campos según tus necesidades).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarAsignacionCapacitacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
            'idCapacitacion' => 'required|exists:capacitacion,idCapacitacion',
            // Agrega las reglas de validación para los campos que deseas actualizar (por ejemplo, 'nuevaInformacion').
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $empleado = Empleado::find($request->idEmpleado);
        $capacitacion = Capacitacion::find($request->idCapacitacion);

        if (!$empleado || !$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Empleado o capacitación no encontrados'], 404);
        }

        // Verifica si la relación existe
        if (!$empleado->capacitaciones->contains($capacitacion->idCapacitacion)) {
            return response()->json(['successful' => false, 'error' => 'La asignación no existe'], 404);
        }

        // Actualiza la información en la tabla pivot
        $empleado->capacitaciones()->updateExistingPivot(
            $capacitacion->idCapacitacion,
            $request->only(['nuevaInformacion'])
        );

        return response()->json(['successful' => true, 'message' => 'Asignación actualizada exitosamente']);
    }



    /**
     * Elimina una asignación de capacitación para un empleado.
     *
     * @param  Request $request
     *         Parámetros de entrada:
     *         - 'idEmpleado': ID del empleado (numérico, obligatorio).
     *         - 'idCapacitacion': ID de la capacitación (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarAsignacionCapacitacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
            'idCapacitacion' => 'required|exists:capacitacion,idCapacitacion',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $empleado = Empleado::find($request->idEmpleado);
        $capacitacion = Capacitacion::find($request->idCapacitacion);

        if (!$empleado || !$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Empleado o capacitación no encontrados'], 404);
        }

        // Verifica si la relación existe
        if (!$empleado->capacitaciones->contains($capacitacion->idCapacitacion)) {
            return response()->json(['successful' => false, 'error' => 'La asignación no existe'], 404);
        }

        // Elimina la asignación de la tabla pivot
        $empleado->capacitaciones()->detach($capacitacion);

        return response()->json(['successful' => true, 'message' => 'Asignación eliminada exitosamente']);
    }



    /**
     * Lista todas las asignaciones de capacitaciones a empleados.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarCapacitacionesDeEmpleados()
    {
        $capacitaciones = EmpleadoHasCapacitacion::with('empleado', 'capacitacion')->get();
        return response()->json(['successful' => true, 'data' => $capacitaciones]);
    }


    /**
     * Lista las capacitaciones realizadas por un usuario específico.
     *
     * @param  int  $idEmpleado
     *         Parámetros de entrada:
     *         - 'idEmpleado': ID del empleado (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'exitoso': Indica si la operación fue exitosa (booleano).
     *         - 'datos': Datos de las capacitaciones realizadas por el usuario (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el usuario no fue encontrado.
     */
    public function listarCapacitacionesPorEmpleado($idEmpleado)
    {
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $capacitacionesRealizadas = $empleado->capacitacionesDeEmpleado()->with('capacitacion')->get();

        $datos = [
            'idEmpleado' => $empleado->idEmpleado,
            'idCapacitacion' => $capacitacionesRealizadas->pluck('idCapacitacion')->first(),
            'created_at' => $capacitacionesRealizadas->pluck('created_at')->first(),
            'updated_at' => $capacitacionesRealizadas->pluck('updated_at')->first(),
            'empleado' => $empleado->toArray(),
            'capacitaciones' => $capacitacionesRealizadas->pluck('capacitacion')->toArray(),
        ];

        return response()->json(['successful' => true, 'datos' => [$datos]]);
    }


    /**
     * Obtener la cantidad total de capacitaciones que ha realizado cada empleado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtenerTotalCapacitacionesPorEmpleado()
    {
        $empleados = Empleado::withCount('capacitacionesDeEmpleado')->get();

        return response()->json(['successful' => true, 'datos' => $empleados]);
    }

    /**
     * Encontrar las capacitaciones que aún no ha realizado un empleado en particular.
     *
     * @param  int  $idEmpleado
     * @return \Illuminate\Http\JsonResponse
     */
    public function capacitacionesNoRealizadasPorEmpleado($idEmpleado)
    {
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $capacitacionesNoRealizadas = Capacitacion::whereDoesntHave('empleados', function ($query) use ($idEmpleado) {
            $query->where('empleado.idEmpleado', $idEmpleado);
        })->get();


        return response()->json(['successful' => true, 'capacitacion' => $capacitacionesNoRealizadas]);
    }

    /**
     * Listar todos los empleados que han participado en una capacitación específica.
     *
     * @param  int  $idCapacitacion
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarEmpleadosPorCapacitacion($idCapacitacion)
    {
        $capacitacion = Capacitacion::find($idCapacitacion);

        if (!$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Capacitación no encontrada'], 404);
        }

        $empleadosParticipantes = $capacitacion->empleados;

        return response()->json(['successful' => true, 'empleados' => $empleadosParticipantes]);
    }
}
