<?php

namespace App\Http\Controllers;

use App\Services\DiscapacidadService;
use Illuminate\Http\Request;

class DiscapacidadController extends Controller
{
    protected $discapacidadService;

    public function __construct(DiscapacidadService $discapacidadService)
    {
        $this->discapacidadService = $discapacidadService;
    }

    public function listarDiscapacidades()
    {
        return $this->discapacidadService->listarDiscapacidades();
    }

    public function mostrarDiscapacidadPorId($id)
    {
        return $this->discapacidadService->mostrarDiscapacidadPorId($id);
    }

    public function listarDiscapacidadesPorTipo($tipo)
    {
        return $this->discapacidadService->listarDiscapacidadesPorTipo($tipo);
    }

    public function crearDiscapacidad(Request $request)
    {
        return $this->discapacidadService->crearDiscapacidad($request);
    }

    public function actualizarDiscapacidad(Request $request, $id)
    {
        return $this->discapacidadService->actualizarDiscapacidad($request, $id);
    }

    public function eliminarDiscapacidad($id)
    {
        return $this->discapacidadService->eliminarDiscapacidad($id);
    }



    public function crearAsignacionEmpleadoDiscapacidad(Request $request)
    {
        return $this->discapacidadService->crearAsignacionEmpleadoDiscapacidad($request);
    }

    public function actualizarAsignacionEmpleadoDiscapacidad(Request $request, $idEmpleado, $idDiscapacidad)
    {
        return $this->discapacidadService->actualizarAsignacionEmpleadoDiscapacidad($request, $idEmpleado, $idDiscapacidad);
    }

    public function eliminarAsignacionEmpleadoDiscapacidad($idEmpleado, $idDiscapacidad)
    {

        return $this->discapacidadService->eliminarAsignacionEmpleadoDiscapacidad($idEmpleado, $idDiscapacidad);
    }


    public function listarDiscapacidadesPorEmpleadoId($idEmpleado)
    {
        return $this->discapacidadService->listarDiscapacidadesPorEmpleadoId($idEmpleado);
    }


    public function listarEmpleadosPorDiscapacidadId($idDiscapacidad)
    {
        return $this->discapacidadService->listarEmpleadosPorDiscapacidadId($idDiscapacidad);
    }
}
