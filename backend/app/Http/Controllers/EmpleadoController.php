<?php

namespace App\Http\Controllers;

use App\Services\EmpleadoService;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    protected $empleadoService;

    public function __construct(EmpleadoService $empleadoService)
    {
        $this->empleadoService = $empleadoService;
    }

    public function listarEmpleados()
    {
        return response()->json($this->empleadoService->listarEmpleados());
    }

    public function mostrarEmpleadoPorId($id)
    {
        return response()->json($this->empleadoService->mostrarEmpleadoPorId($id));
    }
    public function listarEmpleadosPorDepartamentoId($idDepartamento)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorDepartamentoId($idDepartamento));
    }

    public function listarEmpleadosPorEstadoId($idEstado)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorEstadoId($idEstado));
    }

    public function listarEmpleadosPorNacionalidad($nacionalidad)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorNacionalidad($nacionalidad));
    }

    public function listarEmpleadosPorGenero($genero)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorGenero($genero));
    }

    public function crearEmpleado(Request $request)
    {
        return response()->json($this->empleadoService->crearEmpleado($request));
    }

    public function actualizarEmpleado(Request $request, $id)
    {
        return response()->json($this->empleadoService->actualizarEmpleado($request, $id));
    }

    public function eliminarEmpleado($id)
    {
        return response()->json($this->empleadoService->eliminarEmpleado($id));
    }
}
