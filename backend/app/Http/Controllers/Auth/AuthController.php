<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Configuracion;

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
    public function ingresar(Request $request)
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

        // Obtener el usuario por nombre de usuario
        $user = User::where('usuario', $request->usuario)->first();

        if (!$user) {
            return response()->json(['successful' => false, 'mensaje' => 'Credenciales incorrectas.'], 401);
        }

        // Verificar si el usuario está bloqueado
        $intentosFallidos = $user->intentos_fallidos ?? 0;
        $maxIntentos = $this->obtenerMaxIntentos();

        if ($intentosFallidos >= $maxIntentos) {
            $tiempoBloqueo = $this->obtenerTiempoBloqueo();

            // Verificar si ha pasado el tiempo de bloqueo
            $bloqueadoHasta = $user->bloqueado_hasta;

            if ($bloqueadoHasta && now()->gt($bloqueadoHasta)) {
                // Reiniciar el contador de intentos fallidos
                $user->update(['intentos_fallidos' => 0]);

                // Eliminar el tiempo de bloqueo
                $user->update(['bloqueado_hasta' => null]);
            } else {
                // Usuario aún bloqueado
                $tiempoRestante = now()->diffInSeconds($bloqueadoHasta);
                $tiempoFormateado = $this->formatoTiempo($tiempoRestante);

                return response()->json(['successful' => false, 'mensaje' => "Usuario bloqueado. Intenta nuevamente en $tiempoFormateado."], 401);
            }
        }

        // Intentar autenticar al usuario
        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
            // Si la autenticación es exitosa, restablecer intentos fallidos
            $user->update(['intentos_fallidos' => 0]);

            // Eliminar tokens anteriores (revocar todos los tokens)
            $user->tokens()->delete();

            // Generar un nuevo token de acceso
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['successful' => true, 'mensaje' => 'Inicio de sesión exitoso', 'access_token' => $token], 200);
        } else {
            // Autenticación fallida (credenciales incorrectas)
            // Incrementar el contador de intentos fallidos
            $intentosFallidos++;
            $user->update(['intentos_fallidos' => $intentosFallidos]);

            // Bloquear al usuario
            if ($intentosFallidos >= $maxIntentos) {
                $tiempoBloqueo = $this->obtenerTiempoBloqueo();
                $bloqueadoHasta = now()->addMinutes($tiempoBloqueo);
                $user->update(['bloqueado_hasta' => $bloqueadoHasta]);
                $tiempoFormateado = $this->formatoTiempo($tiempoBloqueo * 60);

                return response()->json(['successful' => false, 'mensaje' => "Usuario bloqueado. Intenta nuevamente en $tiempoFormateado."], 401);
            }

            return response()->json(['successful' => false, 'mensaje' => 'Credenciales incorrectas. Por favor, verifica tu nombre de usuario y contraseña.'], 401);
        }
    }

    // Cerrar Sesión
    public function salir(Request $request)
    {
        // Revocar todos los tokens de acceso del usuario
        $request->user()->tokens()->delete();

        return response()->json(['mensaje' => 'Sesión cerrada correctamente'], 200);
    }

    // Obtener el número máximo de intentos
    private function obtenerMaxIntentos()
    {
        return Configuracion::where('clave', 'max_intentos')->value('valor');
    }

    // Obtener el tiempo de bloqueo en minutos
    private function obtenerTiempoBloqueo()
    {
        return Configuracion::where('clave', 'tiempo_bloqueo')->value('valor');
    }

    // Formatear el tiempo en minutos:segundos
    private function formatoTiempo($segundos)
    {
        $minutos = floor($segundos / 60);
        $segundosRestantes = $segundos % 60;

        return sprintf('%02d:%02d', $minutos, $segundosRestantes);
    }
}
