<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExperienciaLaboralService; // Asegúrate de importar el servicio correspondiente

class ExperienciaLaboralController extends Controller
{
    protected $experienciaLaboralService;

    public function __construct(ExperienciaLaboralService $experienciaLaboralService)
    {
        $this->experienciaLaboralService = $experienciaLaboralService;
    }

    public function listarExperienciasLaborales()
    {
        return $this->experienciaLaboralService->listarExperienciasLaborales();
    }

    public function mostrarExperienciaLaboralId($id)
    {
        return $this->experienciaLaboralService->mostrarExperienciaLaboralId($id);
    }

    public function crearExperienciaLaboral(Request $request)
    {
        return $this->experienciaLaboralService->crearExperienciaLaboral($request);
    }

    public function actualizarExperienciaLaboral(Request $request, $id)
    {
        return $this->experienciaLaboralService->actualizarExperienciaLaboral($request, $id);
    }

    public function eliminarExperienciaLaboral($id)
    {
        return $this->experienciaLaboralService->eliminarExperienciaLaboral($id);
    }

    public function experienciasLaboralesEmpleadoId($idEmpleado)
    {
        return $this->experienciaLaboralService->listarExperienciasLaboralesPorEmpleadoId($idEmpleado);
    }

    public function experienciasLaboralesPorCedulaEmpleado($idEmpleado)
    {
        return $this->experienciaLaboralService->listarExperienciasLaboralesPorCedulaEmpleado($idEmpleado);
    }
}
