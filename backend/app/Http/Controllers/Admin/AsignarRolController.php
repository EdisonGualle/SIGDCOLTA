<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rol;
use App\Models\Estado;
use Illuminate\Http\Request;

class AsignarRolController extends Controller
{
    // Asignar Rol
    public function asignarRolUsuario(Request $request)
    {
        // Obtener el usuario autenticado con Laravel Sanctum
        $usuarioAutenticado = auth()->user();

        // Validar que el usuario autenticado no sea el mismo que se está modificando
        if ($usuarioAutenticado && $usuarioAutenticado->usuario === $request->input('usuario')) {
            return response()->json(['error' => 'No puedes cambiar tu propio rol'], 400);
        }

        // Validar la existencia del usuario
        $usuario = User::where('usuario', $request->input('usuario'))->first();

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Validar si el usuario está activo
        if (!$this->isUserActive($usuario)) {
            return response()->json(['error' => 'Usuario inactivo'], 400);
        }

        // Validar la existencia del nuevo rol
        $nuevoRol = $request->input('rol');

        // Verificar si el usuario ya tiene el mismo rol
        if ($usuario->hasRole($nuevoRol)) {
            return response()->json(['error' => 'El usuario ya posee el rol solicitado'], 400);
        }

        // Validar que no se asigne el rol de Super Administrador
        if ($nuevoRol === 'Super Administrador') {
            return response()->json(['error' => 'No puedes asignar el rol de Super Administrador'], 400);
        }

        if (!$this->existeRol($nuevoRol)) {
            return response()->json(['error' => 'El nuevo rol no existe'], 404);
        }

        // Eliminar el rol existente y asignar el nuevo rol
        $usuario->syncRoles([$nuevoRol]);

        return response()->json(['message' => 'Rol actualizado con éxito']);
    }

    // Eliminar rol de usuario
    public function eliminarRolUsuario($usuario)
    {
        // Obtener el usuario autenticado con Laravel Sanctum
        $usuarioAutenticado = auth()->user();

        // Validar que el usuario autenticado no sea el mismo que se está modificando
        if ($usuarioAutenticado && $usuarioAutenticado->usuario === $usuario) {
            return response()->json(['error' => 'No puedes eliminar tu propio rol'], 400);
        }

        // Validar la existencia del usuario
        $usuario = User::where('usuario', $usuario)->first();

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Obtener rol antes de eliminar
        $rolesAntesDeEliminar = $usuario->getRoleNames();

        // Eliminar usuario
        $usuario->syncRoles([]);

        // Obtener roles después de eliminar
        $rolesDespuésDeEliminar = $usuario->getRoleNames();

        // Verificar si el usuario ya no tiene ningún rol
        if ($rolesAntesDeEliminar->isEmpty() && $rolesDespuésDeEliminar->isEmpty()) {
            return response()->json(['error' => 'El usuario no tiene ningún rol'], 404);
        }

        return response()->json(['message' => 'Rol eliminado con éxito']);
    }

    public function listarUsuariosConRoles()
    {
        // Obtén todos los roles
        $roles = Rol::all();
    
        // Inicializa un array para almacenar usuarios con al menos un rol
        $usersWithRoles = [];
    
        // Itera sobre cada rol
        foreach ($roles as $role) {
            // Obtén todos los usuarios asociados a este rol
            $users = User::role($role->name)->get();
    
            // Agrega los usuarios al array general
            $usersWithRoles = array_merge($usersWithRoles, $users->all());
        }

        // Prepara la respuesta
        $response = [];
    
        // Itera sobre los usuarios con roles y crea la respuesta deseada
        foreach ($usersWithRoles as $user) {
            $response[] = [
                'idUsuario' => $user->idUsuario,
                'usuario' => $user->usuario, 
                'rol' => $user->roles->pluck('name')->first(),
            ];
        }
    
        // Ahora $response contiene la información requerida
        return response()->json(['success' => true, 'data' => $response], 200);
    }


    // Listar todos los usuarios con rol
    public function listarUsuariosPorRol($rol)
    {
        // Validar la existencia del rol
        if (!$this->existeRol($rol)) {
            return response()->json(['error' => 'El rol no existe'], 404);
        }

        // Obtener todos los usuarios con el rol especificado
        $usuariosConRol = User::role($rol)->get();

        // Verificar si se encontraron usuarios
        if ($usuariosConRol->isEmpty()) {
            return response()->json(['message' => 'No se encontraron usuarios con el rol especificado'], 200);
        }

        // Devolver la información de los usuarios
        return response()->json(['usuarios' => $usuariosConRol]);
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

    // Función para verificar la existencia de un rol
    private function existeRol($rol)
    {
        return Rol::where('name', $rol)->exists();
    }
}
