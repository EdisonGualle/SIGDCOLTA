<?php

namespace App\Http\Controllers;

use App\Services\DepartamentoService;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    protected $departamentoService;

    public function __construct(DepartamentoService $departamentoService)
    {
        $this->departamentoService = $departamentoService;
    }

    public function listarDepartamentos()
    {
        return $this->departamentoService->listarDepartamentos();
    }

    public function mostrarDepartamentoPorId($id)
    {
        return $this->departamentoService->mostrarDepartamentoPorId($id);
    }
    
  

    public function listarDepartamentosPorIdUnidad($idUnidad)
    {
        return $this->departamentoService->listarDepartamentosPorIdUnidad($idUnidad);
    }

    public function listarDepartamentosPorNombreUnidad($nombreUnidad)
    {
        return $this->departamentoService->listarDepartamentosPorNombreUnidad($nombreUnidad);
    }

    public function crearDepartamento(Request $request)
    {
        return $this->departamentoService->crearDepartamento($request);
    }

    public function actualizarDepartamento(Request $request, $id)
    {
        return $this->departamentoService->actualizarDepartamento($request, $id);
    }

    public function eliminarDepartamento($id)
    {
        return $this->departamentoService->eliminarDepartamento($id);
    }

    public function departamentosPorUnidad($idUnidad)
    {
        return $this->departamentoService->departamentosPorUnidad($idUnidad);
    }
}
