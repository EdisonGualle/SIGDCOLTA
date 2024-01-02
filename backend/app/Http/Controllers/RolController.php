<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RolService; // Asegúrate de importar el servicio correspondiente

class RolController extends Controller
{
    protected $rolService;

    public function __construct(RolService $rolService)
    {
        $this->rolService = $rolService;
    }

    public function listarRoles()
    {
        return $this->rolService->listarRoles();
    }

    public function mostrarRolPorId($id)
    {
        return $this->rolService->mostrarRolPorId($id);
    }

    public function crearRol(Request $request)
    {
        return $this->rolService->crearRol($request);
    }

    public function actualizarRol(Request $request, $id)
    {
        return $this->rolService->actualizarRol($request, $id);
    }

    public function eliminarRol($id)
    {
        return $this->rolService->eliminarRol($id);
    }
}
