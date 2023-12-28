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
}
