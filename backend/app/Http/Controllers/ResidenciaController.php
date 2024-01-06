<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResidenciaService; // Asegúrate de importar el servicio correspondiente

class ResidenciaController extends Controller
{
    protected $residenciaService;

    public function __construct(ResidenciaService $residenciaService)
    {
        $this->residenciaService = $residenciaService;
    }

    public function listarResidencias()
    {
        return $this->residenciaService->listarResidencias();
    }

    public function mostrarResidenciaPorId($id)
    {
        return $this->residenciaService->mostrarResidenciaPorId($id);
    }

    public function crearResidencia(Request $request)
    {
        return $this->residenciaService->crearResidencia($request);
    }

    public function actualizarResidencia(Request $request, $id)
    {
        return $this->residenciaService->actualizarResidencia($request, $id);
    }

    public function eliminarResidencia($id)
    {
        return $this->residenciaService->eliminarResidencia($id);
    }
}
