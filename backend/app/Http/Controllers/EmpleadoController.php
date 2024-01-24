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
    public function EmpleadosReporte()
    {
        return $this->empleadoService->EmpleadosReporte();

    }

    public function mostrarEmpleadoPorId($id)
    {
        return response()->json($this->empleadoService->mostrarEmpleadoPorId($id));
    }
    public function listarEmpleadosPorDireccionId($idDepartamento)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorDireccionId($idDepartamento));
    }
    public function listarEmpleadosPorUnidadId($idUnidad)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorUnidadId($idUnidad));
    }

    public function listarEmpleadosPorCargoId($idCargo)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorCargoId($idCargo));
    }
    ///listarEmpleadosPorCargoId
    public function listarEmpleadosPorEstadoId($idEstado)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorEstadoId($idEstado));
    }
    public function listarEmpleadosPorNacionalidad($nacionalidad)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorNacionalidad($nacionalidad));
    }
    public function listarEmpleadosPorProvincia($provincia)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorProvincia($provincia));
    }
    public function listarEmpleadosPorCanton($canton)
    {
        return response()->json($this->empleadoService->listarEmpleadosPorCanton($canton));
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

    public function listarEmpleadosPorPosicionLaboral()
    {
        $response = $this->empleadoService->listarEmpleadosPorPosicionLaboral();

        return response()->json($response);
    }
}
