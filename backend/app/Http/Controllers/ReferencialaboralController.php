<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReferenciaLaboralService; // Asegúrate de importar el servicio correspondiente

class ReferenciaLaboralController extends Controller
{
    protected $referenciaLaboralService;

    public function __construct(ReferenciaLaboralService $referenciaLaboralService)
    {
        $this->referenciaLaboralService = $referenciaLaboralService;
    }

    public function listarReferenciasLaborales()
    {
        return $this->referenciaLaboralService->listarReferenciasLaborales();
    }

    public function mostrarReferenciaLaboralPorId($id)
    {
        return $this->referenciaLaboralService->mostrarReferenciaLaboralPorId($id);
    }

    public function crearReferenciaLaboral(Request $request)
    {
        return $this->referenciaLaboralService->crearReferenciaLaboral($request);
    }

    public function actualizarReferenciaLaboral(Request $request, $id)
    {
        return $this->referenciaLaboralService->actualizarReferenciaLaboral($request, $id);
    }

    public function eliminarReferenciaLaboral($id)
    {
        return $this->referenciaLaboralService->eliminarReferenciaLaboral($id);
    }
}
