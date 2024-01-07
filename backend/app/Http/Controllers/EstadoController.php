<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\EstadoService; // Asegúrate de importar el servicio correspondiente

class EstadoController extends Controller
{
    protected $estadoService;

    public function __construct(EstadoService $estadoService)
    {
        $this->estadoService = $estadoService;
    }

    public function listarEstados()
    {
        return $this->estadoService->listarEstados();
    }

    public function mostrarEstado($id)
    {
        return $this->estadoService->mostrarEstado($id);
    }

    public function crearEstado(Request $request)
    {
        return $this->estadoService->crearEstado($request);
    }

    public function actualizarEstado(Request $request, $id)
    {
        return $this->estadoService->actualizarEstado($request, $id);
    }

    public function eliminarEstado($id)
    {
        return $this->estadoService->eliminarEstado($id);
    }
}
