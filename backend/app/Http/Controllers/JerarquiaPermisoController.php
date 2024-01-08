<?php

namespace App\Http\Controllers;

use App\Services\JerarquiaPermisoService;
use Illuminate\Http\Request;

class JerarquiaPermisoController extends Controller
{
    protected $jerarquiaPermisoService;

    public function __construct(JerarquiaPermisoService $jerarquiaPermisoService)
    {
        $this->jerarquiaPermisoService = $jerarquiaPermisoService;
    }

    public function listarJerarquiasPermiso()
    {
        return $this->jerarquiaPermisoService->listarJerarquiasPermiso();
    }

    public function mostrarJerarquiaPermiso($idCargo, $idCargoAprobador)
    {
        return $this->jerarquiaPermisoService->mostrarJerarquiaPermiso($idCargo, $idCargoAprobador);
    }

    public function crearJerarquiaPermiso(Request $request)
    {
        return $this->jerarquiaPermisoService->crearJerarquiaPermiso($request);
    }

    public function actualizarJerarquiaPermiso(Request $request, $idCargo, $idCargoAprobador)
    {
        return $this->jerarquiaPermisoService->actualizarJerarquiaPermiso($request, $idCargo, $idCargoAprobador);
    }

    public function eliminarJerarquiaPermiso($idCargo, $idCargoAprobador)
    {
        return $this->jerarquiaPermisoService->eliminarJerarquiaPermiso($idCargo, $idCargoAprobador);
    }
}
