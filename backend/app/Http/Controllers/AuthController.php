<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    /**
     * Intenta autenticar a un usuario y generar un nuevo token de acceso.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'usuario': Nombre de usuario (obligatorio, tipo string).
     *         - 'password': Contraseña del usuario (obligatorio, tipo string).
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Intentar autenticar al usuario
        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
            // Obtener el usuario autenticado
            $user = User::where('usuario', $request->usuario)->first();

            // Eliminar tokens anteriores (revocar todos los tokens)
            $user->tokens()->delete();

            // Generar un nuevo token de acceso
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['successful' => true, 'mensaje' => 'Inicio de sesión exitoso', 'access_token' => $token], 200);
        } else {
            // Autenticación fallida (credenciales incorrectas)
            return response()->json(['successful' => false, 'mensaje' => 'Credenciales incorrectas. Por favor, verifica tu nombre de usuario y contraseña.'], 401);
        }
    }


    /* //Primer ejemplo
    public function cargos()
    {
        return Auth::user();
    } */

    //Cerrar Sesion
    public function logout(Request $request)
    {
        // Revocar todos los tokens de acceso del usuario
        $request->user()->tokens()->delete();

        return response()->json(['mensaje' => 'Sesión cerrada correctamente'], 200);
    }
}
