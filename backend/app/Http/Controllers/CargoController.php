<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CargoService;

class CargoController extends Controller
{
    protected $cargoService;

    public function __construct(CargoService $cargoService)
    {
        $this->cargoService = $cargoService;
    }

    public function listarCargos()
    {
        $response = $this->cargoService->listarCargos();
        return $response;
    }

    public function mostrarCargo($id)
    {
        $response = $this->cargoService->mostrarCargo($id);
        return $response;
    }

    public function crearCargo(Request $request)
    {
        $response = $this->cargoService->crearCargo($request);
        return $response;
    }

    public function actualizarCargo(Request $request, $id)
    {
        $response = $this->cargoService->actualizarCargo($request, $id);
        return $response;
    }

    public function eliminarCargo($id)
    {
        $response = $this->cargoService->eliminarCargo($id);
        return $response;
    }
}
