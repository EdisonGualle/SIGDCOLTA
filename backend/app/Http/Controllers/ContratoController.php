<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContratoService;

class ContratoController extends Controller
{
    protected $contratoService;

    public function __construct(ContratoService $contratoService)
    {
        $this->contratoService = $contratoService;
    }

    public function listarContratos()
    {
        $response = $this->contratoService->listarContratos();
        return $response;
    }
    public function listarContratos2()
    {
        $response = $this->contratoService->listarContratos2();
        return $response;
    }

    public function listarContratosPorCedula($cedula)
    {
        $response = $this->contratoService->listarContratosPorCedula($cedula);
        return $response;
    }

    public function listarContratosPorIdEmpleado($idEmpleado)
    {
        $response = $this->contratoService->listarContratosPorIdEmpleado($idEmpleado);
        return $response;
    }

    public function listarContratosPorEstado($estadoContrato)
    {
        $response = $this->contratoService->listarContratosPorEstado($estadoContrato);
        return $response;
    }

    public function listarContratosPorIdTipoContrato($idTipoContrato)
    {
        $response = $this->contratoService->listarContratosPorIdTipoContrato($idTipoContrato);
        return $response;
    }
    public function listarContratosPorTipo()
    {
        $response = $this->contratoService->listarContratosPorTipo();
        return $response;
    }

    public function listarContratosPorNombreTipoContrato($nombreTipoContrato)
    {
        $response = $this->contratoService->listarContratosPorNombreTipoContrato($nombreTipoContrato);
        return $response;
    }


    public function mostrarContrato($id)
    {
        $response = $this->contratoService->mostrarContrato($id);
        return $response;
    }

    public function crearContrato(Request $request)
    {
        $response = $this->contratoService->crearContrato($request);
        return $response;
    }

    public function actualizarContrato(Request $request, $id)
    {
        $response = $this->contratoService->actualizarContrato($request, $id);
        return $response;
    }

    public function eliminarContrato($id)
    {
        $response = $this->contratoService->eliminarContrato($id);
        return $response;
    }
    public function listarEmpleadosContratos()
    {
        $response = $this->contratoService->listarEmpleadosContratos();
        return $response;
    }

}
