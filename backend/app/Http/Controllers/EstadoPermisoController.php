<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EstadoPermisoService;

use Illuminate\Http\Request;

class EstadoPermisoController extends Controller
{
    private $estadoPermisoService;

    public function __construct(EstadoPermisoService $estadoPermisoService)
    {
        $this->estadoPermisoService = $estadoPermisoService;
    }

    public function listarEstadosPermiso()
    {
        return $this->estadoPermisoService->listarEstadosPermiso();
    }

    public function mostrarEstadoPermisoPorId($id)
    {
        return $this->estadoPermisoService->mostrarEstadoPermisoPorId($id);
    }

    public function crearEstadoPermiso(Request $request)
    {
        return $this->estadoPermisoService->crearEstadoPermiso($request);
    }

    public function actualizarEstadoPermiso(Request $request, $id)
    {
        return $this->estadoPermisoService->actualizarEstadoPermiso($request, $id);
    }

    public function eliminarEstadoPermiso($id)
    {
        return $this->estadoPermisoService->eliminarEstadoPermiso($id);
    }
}
