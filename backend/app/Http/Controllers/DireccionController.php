<?php

namespace App\Http\Controllers;

use App\Services\DireccionService;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    protected $direccionService;

    public function __construct(DireccionService $direccionService)
    {
        $this->direccionService = $direccionService;
    }

    public function listarDirecciones()
    {
        return $this->direccionService->listarDirecciones();
    }

    public function mostrarDireccionPorId($id)
    {
        return $this->direccionService->mostrarDireccionPorId($id);
    }

    public function crearDireccion(Request $request)
    {
        return $this->direccionService->crearDireccion($request);
    }

    public function actualizarDireccion(Request $request, $id)
    {
        return $this->direccionService->actualizarDireccion($request, $id);
    }

    public function eliminarDireccion($id)
    {
        return $this->direccionService->eliminarDireccion($id);
    }
}
