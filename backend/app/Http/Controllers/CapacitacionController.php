<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CapacitacionService;

class CapacitacionController extends Controller
{
    protected $capacitacionService;

    public function __construct(CapacitacionService $capacitacionService)
    {
        $response = $this->capacitacionService = $capacitacionService;
        return $response;
    }

    public function listarCapacitaciones()
    {
        $response = $this->capacitacionService->listarCapacitaciones();
        return $response;
    }

    public function listarCapacitacionPorId($id)
    {
        $response = $this->capacitacionService->listarCapacitacionPorId($id);
        return $response;
    }

    public function listarCapacitacionPorNombre($nombre)
    {
        $response = $this->capacitacionService->listarCapacitacionPorNombre($nombre);
        return $response;
    }

    public function listarCapacitacionesPorFecha($fecha)
    {
        $response = $this->capacitacionService->listarCapacitacionesPorFecha($fecha);
        return $response;
    }

    public function listarCapacitacionesPorRangoDeFechas($fechaInicio, $fechaFin)
    {
        $response = $this->capacitacionService->listarCapacitacionesPorRangoDeFechas($fechaInicio, $fechaFin);
        return $response;
    }

    public function crearCapacitacion(Request $request)
    {
        $response = $this->capacitacionService->crearCapacitacion($request);
        return $response;
    }

    public function actualizarCapacitacion(Request $request, $id)
    {
        $response = $this->capacitacionService->actualizarCapacitacion($request, $id);
        return $response;
    }

    public function eliminarCapacitacion($id)
    {
        $response = $this->capacitacionService->eliminarCapacitacion($id);
        return $response;
    }
}
