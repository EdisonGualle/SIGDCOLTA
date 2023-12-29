<?php

namespace App\Http\Controllers;

use App\Services\SalidaCampoService;
use Illuminate\Http\Request;

class SalidaCampoController extends Controller
{
    protected $salidaCampoService;

    public function __construct(SalidaCampoService $salidaCampoService)
    {
        $this->salidaCampoService = $salidaCampoService;
    }

    public function listarSalidasCampo()
    {
        return $this->salidaCampoService->listarSalidasCampo();
    }

    public function mostrarSalidaCampoPorId($id)
    {
        return $this->salidaCampoService->mostrarSalidaCampoPorId($id);
    }

    public function crearSalidaCampo(Request $request)
    {
        return $this->salidaCampoService->crearSalidaCampo($request);
    }

    public function actualizarSalidaCampo(Request $request, $id)
    {
        return $this->salidaCampoService->actualizarSalidaCampo($request, $id);
    }

    public function eliminarSalidaCampo($id)
    {
        return $this->salidaCampoService->eliminarSalidaCampo($id);
    }
}
