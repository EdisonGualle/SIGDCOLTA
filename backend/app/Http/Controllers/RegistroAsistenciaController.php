<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RegistroAsistenciaService;

class RegistroAsistenciaController extends Controller
{
    protected $registroAsistenciaService;

    public function __construct(RegistroAsistenciaService $registroAsistenciaService)
    {
        $this->registroAsistenciaService = $registroAsistenciaService;
    }

    public function listarRegistrosAsistencia()
    {
        $response = $this->registroAsistenciaService->listarRegistrosAsistencia();
        return $response;
    }

    public function mostrarRegistroAsistenciaPorId($id)
    {
        $response = $this->registroAsistenciaService->mostrarRegistroAsistenciaPorId($id);
        return $response;
    }

    public function eliminarRegistroAsistencia($id)
    {
        $response = $this->registroAsistenciaService->eliminarRegistroAsistencia($id);
        return $response;
    }

    public function registrarAsistencia(Request $request)
    {
        $response = $this->registroAsistenciaService->registrarAsistencia($request);
        return $response;
    }
}
