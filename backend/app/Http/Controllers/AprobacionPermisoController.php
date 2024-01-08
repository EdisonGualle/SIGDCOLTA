<?php

namespace App\Http\Controllers;

use App\Services\AprobacionPermisoService;
use Illuminate\Http\Request;

class AprobacionPermisoController extends Controller
{
    protected $aprobacionPermisoService;

    public function __construct(AprobacionPermisoService $aprobacionPermisoService)
    {
        $this->aprobacionPermisoService = $aprobacionPermisoService;
    }

    public function listarAprobacionesPermiso()
    {
        return $this->aprobacionPermisoService->listarAprobacionesPermiso();
    }

    public function mostrarAprobacionPermiso($id)
    {
        return $this->aprobacionPermisoService->mostrarAprobacionPermiso($id);
    }

    public function crearAprobacionPermiso(Request $request)
    {
        return $this->aprobacionPermisoService->crearAprobacionPermiso($request);
    }

    public function actualizarAprobacionPermiso(Request $request, $id)
    {
        return $this->aprobacionPermisoService->actualizarAprobacionPermiso($request, $id);
    }

    public function eliminarAprobacionPermiso($id)
    {
        return $this->aprobacionPermisoService->eliminarAprobacionPermiso($id);
    }
}
