<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rol;
use App\Models\Estado;
use Illuminate\Http\Request;

class AsignarRolController extends Controller
{
    public function asignarRol(Request $request)
    {
        // Obtener el usuario actualmente autenticado (puedes ajustar esto según tu lógica de autenticación)
        $usuarioAutenticado = auth()->user();

        // Validar la existencia del usuario
        $usuario = User::where('usuario', $request->input('usuario'))->first();

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Validar si el usuario está activo
        if (!$this->isUserActive($usuario)) {
            return response()->json(['error' => 'Usuario inactivo'], 400);
        }

        // Validar que el usuario no esté intentando cambiarse a sí mismo el rol
        if ($usuarioAutenticado && $usuario->id === $usuarioAutenticado->id) {
            return response()->json(['error' => 'No puedes cambiarte a ti mismo el rol'], 400);
        }

        // Validar la existencia del rol
        $nuevoRol = $request->input('rol');
        $rolExistente = $usuario->getRoleNames()->first();

        if (!$rolExistente) {
            // Si el usuario no tiene un rol asignado, asignar el nuevo rol
            $usuario->assignRole($nuevoRol);
            return response()->json(['message' => 'Rol asignado con éxito']);
        }

        // Si el usuario ya tiene un rol, eliminar el antiguo y asignar el nuevo
        $usuario->removeRole($rolExistente);
        $usuario->assignRole($nuevoRol);

        return response()->json(['message' => 'Rol actualizado con éxito']);
    }

    // Función para verificar si el usuario está activo
    private function isUserActive($user)
    {
        $estadoActivo = Estado::where('tipoEstado', 'Activo')->first();

        if (!$estadoActivo) {
            return false; // Manejar caso donde no se encuentra el estado activo
        }

        return $user->idTipoEstado == $estadoActivo->idEstado;
    }
}
