<?php

namespace App\Http\Controllers;

use App\Services\TipoSalidaService;
use Illuminate\Http\Request;

class TipoSalidaController extends Controller
{
    protected $tipoSalidaService;

    public function __construct(TipoSalidaService $tipoSalidaService)
    {
        $this->tipoSalidaService = $tipoSalidaService;
    }

    public function listarTiposSalida()
    {
        return $this->tipoSalidaService->listarTiposSalida();
    }

    public function mostrarTipoSalidaPorId($id)
    {
        return $this->tipoSalidaService->mostrarTipoSalidaPorId($id);
    }

    public function crearTipoSalida(Request $request)
    {
        return $this->tipoSalidaService->crearTipoSalida($request);
    }

    public function actualizarTipoSalida(Request $request, $id)
    {
        return $this->tipoSalidaService->actualizarTipoSalida($request, $id);
    }

    public function eliminarTipoSalida($id)
    {
        return $this->tipoSalidaService->eliminarTipoSalida($id);
    }
}
