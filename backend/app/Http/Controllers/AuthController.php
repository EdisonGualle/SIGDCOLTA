<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function registro(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'usuario' => 'required|unique:usuario',
            'password' => 'required',
            'idEmpleado' => 'required'
        ]);

        // Crear un nuevo usuario
        $user = new User([
            'usuario' => $request->usuario,
            'password' => Hash::make($request->password),
            'idEmpleado' => $request->idEmpleado,
        ]);

        // Guardar el usuario en la base de datos
        $user->save();

        $user->assignRole('Empleado');

        // Iniciar sesión y generar token de acceso
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['mensaje' => 'Usuario registrado correctamente', 'access_token' => $token], 201);
    }

    public function login(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
            // Autenticación exitosa
            $user = User::where('usuario', $request->usuario)->first();
             // Eliminar tokens anteriores (revocar todos los tokens)
            $user->tokens()->delete();
             //generar token de acceso
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['mensaje' => 'Inicio de sesión exitoso', 'access_token' => $token], 200);
        }

        // Autenticación fallida
        return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
    }


    //Primer ejemplo
    public function cargos()
    {
        return Auth::user();
    }

    //Cerrar Sesion
    public function logout(Request $request)
    {
        // Revocar todos los tokens de acceso del usuario
        $request->user()->tokens()->delete();
        
        return response()->json(['mensaje' => 'Sesión cerrada correctamente'], 200);
    }
}
