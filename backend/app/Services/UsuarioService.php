<?php

namespace App\Services;

use App\Models\Empleado;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Notifications\Registro\RegistroUsuarioNotification;


class UsuarioService
{
    public function listarUsuarios()
    {
        $usuarios = User::select(
            'usuario.idUsuario',
            'usuario.usuario',
            'usuario.correo',
            'usuario.idTipoEstado',
            'usuario.idEmpleado',
            'usuario.intentos_fallidos',
            'usuario.bloqueado_hasta',
            'empleado.cedula',
            'empleado.primerNombre as primer_nombre',
            'empleado.segundoNombre as segundo_nombre',
            'empleado.primerApellido as primer_apellido',
            'empleado.segundoApellido as segundo_apellido',
            'estadousuario.tipoEstado as nombre_tipo_estado'
        )
        ->leftJoin('empleado', 'usuario.idEmpleado', '=', 'empleado.idEmpleado')
        ->leftJoin('estadousuario', 'usuario.idTipoEstado', '=', 'estadousuario.idEstado')
        ->get();
    
        $usuariosTransformados = $usuarios->map(function ($usuario) {
            return [
                'idUsuario' => $usuario->idUsuario,
                'usuario' => $usuario->usuario,
                'correo' => $usuario->correo,
                'idEmpleado' => $usuario->idEmpleado,
                'intentos_fallidos' => $usuario->intentos_fallidos,
                'bloqueado_hasta' => $usuario->bloqueado_hasta,
                'empleado' => [
                    'cedula' => $usuario->cedula,
                    'primer_nombre' => $usuario->primer_nombre,
                    'segundo_nombre' => $usuario->segundo_nombre,
                    'primer_apellido' => $usuario->primer_apellido,
                    'segundo_apellido' => $usuario->segundo_apellido,
                ],
                'idTipoEstado' => $usuario->idTipoEstado,
                'estado' => $usuario->nombre_tipo_estado,
            ];
        });
    
        return $usuariosTransformados;
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
            'correo' => 'required|email|unique:usuario,correo',
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

        // Verificar que el empleado no tenga un usuario existente
        if ($empleado->usuario) {
            return response()->json(['successful' => false, 'error' => 'El empleado ya tiene un usuario'], 422);
        }

        // Verificar si ya existe un usuario con el mismo correo
        if (User::where('correo', $request->input('correo'))->exists()) {
            return response()->json(['successful' => false, 'error' => 'Ya existe un usuario con este correo'], 422);
        }

        // Verificar que existe el estado con idEstado proporcionado
        $estado = Estado::find($request->input('idTipoEstado'));

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        // Generar nombre de usuario único
        $baseUsuario = strtolower($empleado->primerNombre . $empleado->primerApellido);
        $usuario = $baseUsuario;
        $contador = 1;

        while (User::where('usuario', $usuario)->exists()) {
            $usuario = $baseUsuario . $contador;
            $contador++;
        }

        // Generar contraseña automáticamente
        $password = Str::random(8);

        // Crear el usuario
        $nuevoUsuario = User::create([
            'usuario' => $usuario,
            'password' => Hash::make($password),
            'correo' => $request->input('correo'),
            'idEmpleado' => $request->input('idEmpleado'),
            'idTipoEstado' => $request->input('idTipoEstado'),
        ]);

        // Asignar rol 'Empleado' al usuario
        $nuevoUsuario->assignRole('Empleado');

        // Enviar notificación al correo del empleado
        $empleado = Empleado::find($request->input('idEmpleado'));
        $empleado->notify(
            new RegistroUsuarioNotification(
                $empleado->primerNombre,
                $empleado->primerApellido,
                $nuevoUsuario->usuario,
                $nuevoUsuario->correo,
                $password
            )
        );

        // Iniciar sesión y generar token de acceso
        $token = $nuevoUsuario->createToken('auth_token')->plainTextToken;

        return response()->json(['successful' => true, 'data' => $nuevoUsuario, 'access_token' => $token, 'password' => $password], 201);
    }
    

    public function actualizarUsuario(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'correo' => 'string',
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

    public function suspenderUsuario($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['successful' => false, 'error' => 'Usuario no encontrado'], 404);
        }

        // Assuming 'idTipoEstado' represents user status and 'suspendido' is the status for suspension
        $suspendidoEstado = Estado::where('tipoEstado', 'inactivo')->first();

        if (!$suspendidoEstado) {
            return response()->json(['successful' => false, 'error' => 'Estado "suspendido" no encontrado'], 404);
        }

        // Obtener rol antes de eliminar
        $usuario->getRoleNames();

        // Eliminar usuario
        $usuario->syncRoles([]);

        $usuario->update(['idTipoEstado' => $suspendidoEstado->idEstado]);


        return response()->json(['successful' => true, 'message' => 'Usuario suspendido correctamente']);
    }

    public function activarUsuario($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['successful' => false, 'error' => 'Usuario no encontrado'], 404);
        }

        // Assuming 'idTipoEstado' represents user status and 'activo' is the status for activation
        $activoEstado = Estado::where('tipoEstado', 'activo')->first();

        if (!$activoEstado) {
            return response()->json(['successful' => false, 'error' => 'Estado "activo" no encontrado'], 404);
        }

        $usuario->update(['idTipoEstado' => $activoEstado->idEstado]);

        return response()->json(['successful' => true, 'message' => 'Usuario activado correctamente']);
    }

    public function cambiarContrasena(Request $request)
{
    // Verifica que el usuario esté autenticado
    if (!auth()->check()) {
        return response()->json(['error' => 'Usuario no autenticado.'], 401);
    }

    $request->validate([
        'password' => 'required|current_password',
        'new_password' => 'required|string|min:6|different:password|confirmed',
    ], [
        'contrasena.required' => 'El campo Contraseña actual es obligatorio.',
        'nueva_contrasena.required' => 'El campo Nueva Contraseña es obligatorio.',
        'nueva_contrasena.min' => 'La Nueva Contraseña debe tener al menos 6 caracteres.',
        'nueva_contrasena.different' => 'La Nueva Contraseña debe ser diferente de la Contraseña actual.',
        'nueva_contrasena.confirmed' => 'La confirmación de la Nueva Contraseña no coincide.',
    ]);

    // Obtén el usuario autenticado mediante el token
    $user = auth()->user();

    // Verifica que la contraseña actual sea válida
    if (!Hash::check($request->input('password'), $user->password)) {
        return response()->json(['error' => 'La contraseña actual es incorrecta.'], 422);
    }

    // Actualiza la contraseña utilizando una consulta directa
    DB::table('usuario')->where('idUsuario', $user->idUsuario)->update([
        'password' => Hash::make($request->input('new_password')),
    ]);

    return response()->json(['success' => 'Contraseña cambiada exitosamente.']);
}
}
