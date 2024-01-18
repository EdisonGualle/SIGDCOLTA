<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Configuracion;
use App\Models\User;
use App\Models\Estado;

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
            'usuario' => 'string',
            'correo' => 'string|email',
            'password' => 'required|string',
        ]);
        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Obtener el usuario por nombre de usuario o correo electrónico
        $user = User::where(function ($query) use ($request) {
            $query->where('usuario', $request->input('usuario'))
                ->orWhere('correo', $request->input('correo'));
        })->first();

        if (!$user) {
            // Verificar si se proporcionó un usuario o un correo
            $mensajeError = $request->input('usuario')
                ? 'El usuario no existe.'
                : 'El correo electronico no existe.';

            return response()->json(['successful' => false, 'mensaje' => $mensajeError], 401);
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

                return response()->json(['successful' => false,  'mensaje' => "Usuario bloqueado. Intenta nuevamente en $tiempoFormateado."], 401);
            }
        }
        // Verificar si el usuario existe y está activo
        if ($user && $this->isUserActive($user)) {
            // Intentar autenticar al usuario
            $credentials = [
                'password' => $request->password,
            ];

            if ($request->has('usuario')) {
                $credentials['usuario'] = $request->input('usuario');
            } elseif ($request->has('correo')) {
                $credentials['correo'] = $request->input('correo');
            }

            if (Auth::attempt($credentials)) {
                // Si la autenticación es exitosa, restablecer intentos fallidos
                $user->update(['intentos_fallidos' => 0]);

                // Eliminar tokens anteriores (revocar todos los tokens)
                $user->tokens()->delete();

                // Generar un nuevo token de acceso
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json(['successful' => true, '_id' => $user->idUsuario, 'usuario' => $user->usuario, 'correo' => $user->correo, 'mensaje' => 'Inicio de sesión exitoso', 'token' => $token], 200);
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

                return response()->json(['successful' => false, 'mensaje' => 'Error. Contraseña incorrecta.'], 401);
            }
        } else {
            // Usuario no encontrado o inactivo
            $mensajeError = $request->input('usuario')
                ? 'Usuario inactivo.'
                : 'Correo inactivo.';

            return response()->json(['successful' => false, 'mensaje' => 'ERROR. ' . $mensajeError], 401);
        }
    }

    // Cerrar Sesión
    public function salir(Request $request)
    {
        // Revocar todos los tokens de acceso del usuario
        $request->user()->tokens()->delete();

        return response()->json(['mensaje' => 'Sesión cerrada correctamente'], 200);
    }

    // Función para verificar si el usuario está activo
    private function isUserActive($user)
    {
        $estadoActivo = Estado::where('tipoEstado', 'Activo')->first();

        return $user->idTipoEstado == $estadoActivo->idEstado;
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
