<?php

namespace App\Http\Controllers;

use App\Services\UnidadService;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    protected $unidadService;

    public function __construct(UnidadService $unidadService)
    {
        $this->unidadService = $unidadService;
    }

    public function listarUnidades()
    {
        return $this->unidadService->listarUnidades();
    }

    public function mostrarUnidadPorId($id)
    {
        return $this->unidadService->mostrarUnidadPorId($id);
    }

    public function crearUnidad(Request $request)
    {
        return $this->unidadService->crearUnidad($request);
    }

    public function actualizarUnidad(Request $request, $id)
    {
        return $this->unidadService->actualizarUnidad($request, $id);
    }

    public function eliminarUnidad($id)
    {
        return $this->unidadService->eliminarUnidad($id);
    }
}
