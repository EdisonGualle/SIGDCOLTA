<?php

namespace App\Http\Controllers;

use App\Services\TipoContratoService;
use Illuminate\Http\Request;

class TipoContratoController extends Controller
{
    protected $tipoContratoService;

    public function __construct(TipoContratoService $tipoContratoService)
    {
        $this->tipoContratoService = $tipoContratoService;
    }

    public function listarTiposContrato()
    {
        return $this->tipoContratoService->listarTiposContrato();
    }

    public function mostrarTipoContratoPorId($id)
    {
        return $this->tipoContratoService->mostrarTipoContratoPorId($id);
    }

    public function crearTipoContrato(Request $request)
    {
        return $this->tipoContratoService->crearTipoContrato($request);
    }

    public function actualizarTipoContrato(Request $request, $id)
    {
        return $this->tipoContratoService->actualizarTipoContrato($request, $id);
    }

    public function eliminarTipoContrato($id)
    {
        return $this->tipoContratoService->eliminarTipoContrato($id);
    }
}
