<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CapacitacionService;



class CapacitacionController extends Controller
{
    protected $capacitacionService;

    public function __construct(CapacitacionService $capacitacionService)
    {
        $this->capacitacionService = $capacitacionService;
    }


    /**
     * @OA\Get(
     *     path="/capacitaciones",
     *     summary="Listar todas las capacitaciones",
     *     tags={"Capacitaciones"},
     *     @OA\Response(response="200", description="Lista de todas las capacitaciones"),
     * )
     */
    public function listarCapacitaciones()
    {
        $response = $this->capacitacionService->listarCapacitaciones();
        return $response;
    }

    /**
     * @OA\Get(
     *     path="/capacitaciones/{id}",
     *     summary="Obtener detalles de una capacitación por ID",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID de la capacitación", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Detalles de la capacitación"),
     *     @OA\Response(response="404", description="Capacitación no encontrada"),
     * )
     */
    public function listarCapacitacionPorId($id)
    {
        $response = $this->capacitacionService->listarCapacitacionPorId($id);
        return $response;
    }

    /**
     * @OA\Get(
     *     path="/capacitaciones/nombre/{nombre}",
     *     summary="Listar capacitaciones por nombre",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="nombre", in="path", required=true, description="Nombre de la capacitación", @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="Lista de capacitaciones por nombre"),
     * )
     */
    public function listarCapacitacionPorNombre($nombre)
    {
        $response = $this->capacitacionService->listarCapacitacionPorNombre($nombre);
        return $response;
    }

    /**
     * @OA\Get(
     *     path="/capacitaciones/fecha/{fecha}",
     *     summary="Listar capacitaciones por fecha",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="fecha", in="path", required=true, description="Fecha de la capacitación", @OA\Schema(type="string", format="date")),
     *     @OA\Response(response="200", description="Lista de capacitaciones por fecha"),
     * )
     */
    public function listarCapacitacionesPorFecha($fecha)
    {
        $response = $this->capacitacionService->listarCapacitacionesPorFecha($fecha);
        return $response;
    }

    /**
     * @OA\Get(
     *     path="/capacitaciones/rango-fechas/{fechaInicio}/{fechaFin}",
     *     summary="Listar capacitaciones por rango de fechas",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="fechaInicio", in="path", required=true, description="Fecha de inicio del rango", @OA\Schema(type="string", format="date")),
     *     @OA\Parameter(name="fechaFin", in="path", required=true, description="Fecha de fin del rango", @OA\Schema(type="string", format="date")),
     *     @OA\Response(response="200", description="Lista de capacitaciones por rango de fechas"),
     * )
     */
    public function listarCapacitacionesPorRangoDeFechas($fechaInicio, $fechaFin)
    {
        $response = $this->capacitacionService->listarCapacitacionesPorRangoDeFechas($fechaInicio, $fechaFin);
        return $response;
    }


    /**
     * @OA\Post(
     *     path="/capacitaciones",
     *     summary="Crear una nueva capacitación",
     *     tags={"Capacitaciones"},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="nombre", type="string", example="Nombre de la capacitación"),
     *             @OA\Property(property="descripcion", type="string", example="Descripción de la capacitación"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Capacitación creada exitosamente"),
     *     @OA\Response(response="422", description="Error de validación"),
     * )
     */
    public function crearCapacitacion(Request $request)
    {
        $response = $this->capacitacionService->crearCapacitacion($request);
        return $response;
    }


    /**
     * @OA\Put(
     *     path="/capacitaciones/{id}",
     *     summary="Actualizar una capacitación por ID",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID de la capacitación", @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="nombre", type="string", example="Nuevo nombre de la capacitación"),
     *             @OA\Property(property="descripcion", type="string", example="Nueva descripción de la capacitación"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Capacitación actualizada exitosamente"),
     *     @OA\Response(response="404", description="Capacitación no encontrada"),
     *     @OA\Response(response="422", description="Error de validación"),
     * )
     */
    public function actualizarCapacitacion(Request $request, $id)
    {
        $response = $this->capacitacionService->actualizarCapacitacion($request, $id);
        return $response;
    }


    /**
     * @OA\Delete(
     *     path="/capacitaciones/{id}",
     *     summary="Eliminar una capacitación por ID",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID de la capacitación", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Capacitación eliminada exitosamente"),
     *     @OA\Response(response="404", description="Capacitación no encontrada"),
     * )
     */
    public function eliminarCapacitacion($id)
    {
        $response = $this->capacitacionService->eliminarCapacitacion($id);
        return $response;
    }


    /**
     * @OA\Post(
     *     path="/capacitaciones/asignacion-empleado-capacitacion",
     *     summary="Asignar un empleado a una capacitación",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="idEmpleado", in="path", required=true, description="ID del empleado", @OA\Schema(type="integer")),
     *     @OA\Parameter(name="idCapacitacion", in="path", required=true, description="ID de la capacitación", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Asignación creada exitosamente"),
     *     @OA\Response(response="400", description="Error de validación"),
     *     @OA\Response(response="404", description="Empleado o capacitación no encontrados"),
     * )
     */
    public function crearAsignacionEmpleadoCapacitacion(Request $request)
    {
        $response = $this->capacitacionService->crearAsignacionEmpleadoCapacitacion($request);
        return $response;
    }

    /**
     * @OA\Put(
     *     path="/capacitaciones/asignacion-empleado-capacitacion/{idEmpleado}/{idCapacitacion}",
     *     summary="Actualizar asignación de un empleado a una capacitación",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="idEmpleado", in="path", required=true, description="ID del empleado", @OA\Schema(type="integer")),
     *     @OA\Parameter(name="idCapacitacion", in="path", required=true, description="ID de la capacitación", @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *         )
     *     ),
     *     @OA\Response(response="200", description="Asignación actualizada exitosamente"),
     *     @OA\Response(response="400", description="Error de validación"),
     *     @OA\Response(response="404", description="Asignación de capacitación no encontrada"),
     * )
     */
    public function actualizarAsignacionEmpleadoCapacitacion(Request $request, $idEmpleado, $idCapacitacion)
    {
        $response = $this->capacitacionService->crearAsignacionEmpleadoCapacitacion($request, $idEmpleado, $idCapacitacion);
        return $response;
    }

    /**
     * @OA\Delete(
     *     path="/capacitaciones/asignacion-empleado-capacitacion/{idEmpleado}/{idCapacitacion}",
     *     summary="Eliminar asignación de un empleado a una capacitación",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="idEmpleado", in="path", required=true, description="ID del empleado", @OA\Schema(type="integer")),
     *     @OA\Parameter(name="idCapacitacion", in="path", required=true, description="ID de la capacitación", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Asignación de capacitación eliminada exitosamente"),
     *     @OA\Response(response="404", description="Asignación de capacitación no encontrada"),
     * )
     */
    public function eliminarAsignacionEmpleadoCapacitacion($idEmpleado, $idCapacitacion)
    {
        $response = $this->capacitacionService->eliminarAsignacionEmpleadoCapacitacion($idEmpleado, $idCapacitacion);
        return $response;
    }

    /**
     * @OA\Get(
     *     path="/capacitaciones/capacitaciones-por-empleado/id/{idEmpleado}",
     *     summary="Listar capacitaciones realizadas por un empleado",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="idEmpleado", in="path", required=true, description="ID del empleado", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Lista de capacitaciones realizadas por el empleado"),
     *     @OA\Response(response="404", description="Empleado no encontrado"),
     * )
     */
    public function listarCapacitacionesPorEmpleadoId($idEmpleado)
    {
        $response = $this->capacitacionService->listarCapacitacionesPorEmpleadoId($idEmpleado);
        return $response;
    }

    /**
     * @OA\Get(
     *     path="/capacitaciones/empleados-por-capacitacion/id/{idCapacitacion}",
     *     summary="Listar empleados participantes en una capacitación",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="idCapacitacion", in="path", required=true, description="ID de la capacitación", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Lista de empleados participantes en la capacitación"),
     *     @OA\Response(response="404", description="Capacitación no encontrada"),
     * )
     */
    public function listarEmpleadosPorCapacitacionId($idCapacitacion)
    {
        $response = $this->capacitacionService->listarEmpleadosPorCapacitacionId($idCapacitacion);
        return $response;
    }


    /**
     * @OA\Get(
     *     path="/capacitaciones/capacitaciones-no-realizadas-por-empleado/id/{idEmpleado}",
     *     summary="Listar capacitaciones no realizadas por un empleado",
     *     tags={"Capacitaciones"},
     *     @OA\Parameter(name="idEmpleado", in="path", required=true, description="ID del empleado", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Lista de capacitaciones no realizadas por el empleado"),
     *     @OA\Response(response="404", description="Empleado no encontrado"),
     * )
     */
    public function listarCapacitacionesNoRealizadasPorEmpleadoId($idEmpleado)
    {
        $response = $this->capacitacionService->listarCapacitacionesNoRealizadasPorEmpleadoId($idEmpleado);
        return $response;
    }

    //Funcion para mostar todos los empleados con sus capacitaciones
    public function listarEmpleadosConCapacitaciones()
    {
        // Llama a la función correspondiente en el servicio
        $response = $this->capacitacionService->listarEmpleadosConCapacitaciones();

        // Devuelve la respuesta en formato JSON
        return $response;
    }
}
