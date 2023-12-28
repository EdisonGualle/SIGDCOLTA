<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EvaluacionDesempenoService; // Asegúrate de importar el servicio correspondiente

class EvaluacionDesempenoController extends Controller
{
    protected $evaluacionDesempenoService;

    public function __construct(EvaluacionDesempenoService $evaluacionDesempenoService)
    {
        $this->evaluacionDesempenoService = $evaluacionDesempenoService;
    }

    public function listarEvaluacionesDesempeno()
    {
        return $this->evaluacionDesempenoService->listarEvaluacionesDesempeno();
    }

    public function mostrarEvaluacionDesempeno($id)
    {
        return $this->evaluacionDesempenoService->mostrarEvaluacionDesempeno($id);
    }

    public function crearEvaluacionDesempeno(Request $request)
    {
        return $this->evaluacionDesempenoService->crearEvaluacionDesempeno($request);
    }

    public function actualizarEvaluacionDesempeno(Request $request, $id)
    {
        return $this->evaluacionDesempenoService->actualizarEvaluacionDesempeno($request, $id);
    }

    public function eliminarEvaluacionDesempeno($id)
    {
        return $this->evaluacionDesempenoService->eliminarEvaluacionDesempeno($id);
    }

    public function obtenerEvaluacionesPorEmpleado($idEmpleado)
    {
        return $this->evaluacionDesempenoService->obtenerEvaluacionesPorEmpleado($idEmpleado);
    }

    public function obtenerEvaluacionesPorEvaluador($idEvaluador)
    {
        return $this->evaluacionDesempenoService->obtenerEvaluacionesPorEvaluador($idEvaluador);
    }

    public function obtenerEvaluacionesPorFecha($fechaInicio, $fechaFin)
    {
        return $this->evaluacionDesempenoService->obtenerEvaluacionesPorFecha($fechaInicio, $fechaFin);
    }

    public function obtenerEvaluacionesPorCalificacion($calificacionMinima)
    {
        return $this->evaluacionDesempenoService->obtenerEvaluacionesPorCalificacion($calificacionMinima);
    }

    public function contarEvaluacionesPorEmpleado($idEmpleado)
    {
        return $this->evaluacionDesempenoService->contarEvaluacionesPorEmpleado($idEmpleado);
    }

    public function calcularPromedioCalificacionPorEvaluador($idEvaluador)
    {
        return $this->evaluacionDesempenoService->calcularPromedioCalificacionPorEvaluador($idEvaluador);
    }

    public function listasEvaluacionesPorEstado($estado)
    {
        return $this->evaluacionDesempenoService->listasEvaluacionesPorEstado($estado);
    }
}
