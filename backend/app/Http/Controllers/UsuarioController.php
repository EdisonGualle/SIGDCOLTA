<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function listarUsuarios()
    {
        return $this->usuarioService->listarUsuarios();
    }

    public function mostrarUsuarioPorId($id)
    {
        return $this->usuarioService->mostrarUsuarioPorId($id);
    }

    public function crearUsuario(Request $request)
    {
        return $this->usuarioService->crearUsuario($request);
    }

    public function actualizarUsuario(Request $request, $id)
    {
        return $this->usuarioService->actualizarUsuario($request, $id);
    }

    public function eliminarUsuario($id)
    {
        return $this->usuarioService->eliminarUsuario($id);
    }
}
