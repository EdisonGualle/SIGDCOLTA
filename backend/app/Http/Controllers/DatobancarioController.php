<?php

namespace App\Http\Controllers;

use App\Services\DatoBancarioService;
use Illuminate\Http\Request;

class DatoBancarioController extends Controller
{
    protected $datoBancarioService;

    public function __construct(DatoBancarioService $datoBancarioService)
    {
        $this->datoBancarioService = $datoBancarioService;
    }

    public function listarDatosBancarios()
    {
        return $this->datoBancarioService->listarDatosBancarios();
    }

    public function mostrarDatoBancarioPorId($id)
    {
        return $this->datoBancarioService->mostrarDatoBancarioPorId($id);
    }

    public function listarDatosBancariosPorIdEmpleado($idEmpleado)
    {
        return $this->datoBancarioService->listarDatosBancariosPorIdEmpleado($idEmpleado);
    }

    public function listarDatosBancariosPorCedulaEmpleado($cedulaEmpleado)
    {
        return $this->datoBancarioService->listarDatosBancariosPorCedulaEmpleado($cedulaEmpleado);
    }

    public function listarDatosBancariosPorNombreBanco($nombreBanco)
    {
        return $this->datoBancarioService->listarDatosBancariosPorNombreBanco($nombreBanco);
    }

    public function listarDatosBancariosPorTipoCuenta($tipoCuenta)
    {
        return $this->datoBancarioService->listarDatosBancariosPorTipoCuenta($tipoCuenta);
    }

    public function crearDatoBancario(Request $request)
    {
        return $this->datoBancarioService->crearDatoBancario($request);
    }

    public function actualizarDatoBancario(Request $request, $id)
    {
        return $this->datoBancarioService->actualizarDatoBancario($request, $id);
    }

    public function eliminarDatoBancario($id)
    {
        return $this->datoBancarioService->eliminarDatoBancario($id);
    }
}
