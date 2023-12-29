<?php

namespace App\Http\Controllers;

use App\Services\TipoPermisoService;
use Illuminate\Http\Request;

class TipoPermisoController extends Controller
{
    protected $tipoPermisoService;

    public function __construct(TipoPermisoService $tipoPermisoService)
    {
        $this->tipoPermisoService = $tipoPermisoService;
    }

    public function listarTiposPermiso()
    {
        return $this->tipoPermisoService->listarTiposPermiso();
    }

    public function mostrarTipoPermisoPorId($id)
    {
        return $this->tipoPermisoService->mostrarTipoPermisoPorId($id);
    }

    public function crearTipoPermiso(Request $request)
    {
        return $this->tipoPermisoService->crearTipoPermiso($request);
    }

    public function actualizarTipoPermiso(Request $request, $id)
    {
        return $this->tipoPermisoService->actualizarTipoPermiso($request, $id);
    }

    public function eliminarTipoPermiso($id)
    {
        return $this->tipoPermisoService->eliminarTipoPermiso($id);
    }
}
