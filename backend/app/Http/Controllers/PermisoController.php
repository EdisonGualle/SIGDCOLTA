<?php

namespace App\Http\Controllers;

use App\Services\PermisoService;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    protected $permisoService;

    public function __construct(PermisoService $permisoService)
    {
        $this->permisoService = $permisoService;
    }

    public function listarPermisos()
    {
        return $this->permisoService->listarPermisos();
    }

    public function mostrarPermisoId($id)
    {
        return $this->permisoService->mostrarPermisoId($id);
    }

    public function crearPermiso(Request $request)
    {
        return $this->permisoService->crearPermiso($request);
    }

    public function actualizarPermiso(Request $request, $id)
    {
        return $this->permisoService->actualizarPermiso($request, $id);
    }

    public function eliminarPermiso($id)
    {
        return $this->permisoService->eliminarPermiso($id);
    }
}
