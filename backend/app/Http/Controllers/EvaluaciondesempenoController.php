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

    public function mostrarEvaluacionDesempenoPorId($id)
    {
        return $this->evaluacionDesempenoService->mostrarEvaluacionDesempenoPorId($id);
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

    public function listarEvaluacionesPorEmpleadoId($idEmpleado)
    {
        return $this->evaluacionDesempenoService->listarEvaluacionesPorEmpleadoId($idEmpleado);
    }

    public function listarEvaluacionesPorEvaluadorId($idEvaluador)
    {
        return $this->evaluacionDesempenoService->listarEvaluacionesPorEvaluadorId($idEvaluador);
    }

    public function listarEvaluacionesPorRangoFechas($fechaInicio, $fechaFin)
    {
        return $this->evaluacionDesempenoService->listarEvaluacionesPorRangoFechas($fechaInicio, $fechaFin);
    }

    public function listasEvaluacionesPorEstado($estado)
    {
        return $this->evaluacionDesempenoService->listasEvaluacionesPorEstado($estado);
    }

    public function listarEvaluacionesPorCedulaEmpleado($cedulaEmpleado)
    {
        return $this->evaluacionDesempenoService->listarEvaluacionesPorCedulaEmpleado($cedulaEmpleado);
    }


    public function listarEvaluacionesPorCedulaEvaluador($cedulaEvaluador)
    {
        return $this->evaluacionDesempenoService->listarEvaluacionesPorCedulaEvaluador($cedulaEvaluador);
    }
}
