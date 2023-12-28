<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TipoAsistenciaService;

class TipoAsistenciaController extends Controller
{
    protected $tipoAsistenciaService;

    public function __construct(TipoAsistenciaService $tipoAsistenciaService)
    {
        $this->tipoAsistenciaService = $tipoAsistenciaService;
    }

    public function listarTiposAsistencia()
    {
        $response = $this->tipoAsistenciaService->listarTiposAsistencia();
        return $response;
    }

    public function mostrarTipoAsistenciaPorId($id)
    {
        $response = $this->tipoAsistenciaService->mostrarTipoAsistenciaPorId($id);
        return $response;
    }

    public function eliminarTipoAsistencia($id)
    {
        $response = $this->tipoAsistenciaService->eliminarTipoAsistencia($id);
        return $response;
    }

    public function crearTipoAsistencia(Request $request)
    {
        $response = $this->tipoAsistenciaService->crearTipoAsistencia($request);
        return $response;
    }

    public function actualizarTipoAsistencia(Request $request, $id)
    {
        $response = $this->tipoAsistenciaService->actualizarTipoAsistencia($request, $id);
        return $response;
    }
}
