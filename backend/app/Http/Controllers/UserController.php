<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller 
{
    /**
     * Lista todos los usuarios.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarUsuarios()
    {
        $usuarios = User::all();
        return response()->json(['successful' => true, 'data' => $usuarios]);
    }

    /**
     * Muestra los detalles de un usuario específico.
     *
     * @param  int  $id - ID del usuario
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarUsuario($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['successful' => false, 'error' => 'Usuario no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $usuario]);
    }


    /**
     * Crea un nuevo usuario con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'idEmpleado': ID del empleado al que se asociará el usuario (obligatorio).
     *         - 'password': Contraseña del usuario (opcional).
     * @return \Illuminate\Http\JsonResponse
     */
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
            'usuario' => strtolower($empleado->nombre . $empleado->apellido), // Concatenar nombre y apellido
            'password' => Hash::make($request->input('password')), // Hash de la contraseña
            'idEmpleado' => $request->input('idEmpleado'),
            'idTipoEstado' => $request->input('idTipoEstado'),
        ]);

        // Asignar rol 'Empleado' al usuario
        $usuario->assignRole('Empleado');

        // Iniciar sesión y generar token de acceso
        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json(['successful' => true, 'data' => $usuario, 'access_token' => $token], 201);
    }


    /**
     * Actualiza los detalles de un usuario existente.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'password': Nueva contraseña del usuario (opcional).
     *         - 'idEmpleado': Nuevo ID del empleado asociado al usuario (opcional).
     * @param  int  $id - ID del usuario a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
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


    /**
     * Elimina un usuario existente.
     *
     * @param  int  $id - ID del usuario a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
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
