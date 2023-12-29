<?php

namespace App\Services;

use App\Models\Empleado;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioService
{
    public function listarUsuarios()
    {
        $usuarios = User::all();
        return response()->json(['successful' => true, 'data' => $usuarios]);
    }

    public function mostrarUsuarioPorId($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['successful' => false, 'error' => 'Usuario no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $usuario]);
    }

    public function crearUsuario(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|integer|exists:empleado,idEmpleado',
            'password' => 'required|string',
            'idTipoEstado' => 'integer|exists:estado,idEstado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Obtener el empleado
        $empleado = Empleado::find($request->input('idEmpleado'));

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Verificar que existe el estado con idEstado proporcionado
        $estado = Estado::find($request->input('idTipoEstado'));

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        // Crear el usuario
        $usuario = User::create([
            'usuario' => strtolower($empleado->nombre . $empleado->apellido),
            'password' => Hash::make($request->input('password')),
            'idEmpleado' => $request->input('idEmpleado'),
            'idTipoEstado' => $request->input('idTipoEstado'),
        ]);

        // Asignar rol 'Empleado' al usuario
        $usuario->assignRole('Empleado');

        // Iniciar sesión y generar token de acceso
        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json(['successful' => true, 'data' => $usuario, 'access_token' => $token], 201);
    }

    public function actualizarUsuario(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'password' => 'string',
            'idEmpleado' => 'integer|exists:empleado,idEmpleado',
            'idTipoEstado' => 'integer|exists:estado,idEstado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['successful' => false, 'error' => 'Usuario no encontrado'], 404);
        }

        // Verificar que existe el estado con idEstado proporcionado
        $estado = Estado::find($request->input('idTipoEstado'));

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        // Actualizar el usuario
        $usuario->update([
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $usuario->password,
            'idEmpleado' => $request->input('idEmpleado'),
            'idTipoEstado' => $request->input('idTipoEstado'),
        ]);

        return response()->json(['successful' => true, 'data' => $usuario]);
    }

    public function eliminarUsuario($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['successful' => false, 'error' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['successful' => true, 'message' => 'Usuario eliminado correctamente']);
    }
}
