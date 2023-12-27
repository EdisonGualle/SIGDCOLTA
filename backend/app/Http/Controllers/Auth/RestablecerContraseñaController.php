<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auth\RestablecerContraseña;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class RestablecerContraseñaController extends Controller
{
    public function recuperarContraseña(Request $request)
    {
        try {
            // Buscar al usuario por el nombre de usuario o correo en la tabla 'usuario'
            $user = User::where('usuario', $request->usuario)
                ->orWhere('correo', $request->correo)
                ->first(['usuario', 'correo']);

            if ($user && isset($user->correo)) {
                // Generar un token aleatorio
                $token = Str::random(40);

                // Construir la URL con el token
                $domain = URL::to('/');
                $url = $domain . '/recuperar-contraseña?token=' . $token;

                // Configurar datos para el correo
                $datos['url'] = $url;
                $datos['email'] = $user->correo;
                $datos['title'] = "Recuperar Contraseña";
                $datos['body'] = 'Por favor haga clic en el siguiente enlace para restablecer su contraseña';

                // Enviar el correo
                Mail::send('correoRecuperacionContrasena', ['datos' => $datos], function ($message) use ($datos) {
                    $message->to($datos['email'])->subject($datos['title']);
                });

                // Obtener la fecha y hora actual
                $now = Carbon::now()->format('Y-m-d H:i:s');

                // Actualizar o crear un registro en la tabla RestablecerContraseña
                RestablecerContraseña::updateOrCreate(
                    ['correo' => $datos['email']],
                    [
                        'token' => $token,
                        'created_at' => $now
                    ]
                );

                // Respuesta JSON de éxito
                return response()->json([
                    'success' => true,
                    'msg' => 'Por favor revisa tu correo para restablecer tu contraseña',
                    'email_enviado' => $datos['email']
                ]);
            } else {
                // Usuario no encontrado o sin correo asociado
                return response()->json(['success' => false, 'msg' => 'Usuario no encontrado o sin correo asociado.']);
            }
        } catch (\Exception $e) {
            // Manejar excepciones y devolver una respuesta JSON
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }



    // Cargar vista para restablecer contraseña
    public function cargarRestablecerContraseña(Request $request)
    {
        // Buscar el registro en la tabla RestablecerContraseña
        $restablecerDatos = RestablecerContraseña::where('token', $request->token)->first();

        if ($restablecerDatos) {
            // Si se encuentra, buscar al usuario por el correo en la tabla 'usuario'
            $user = User::where('correo', $restablecerDatos->correo)->first();

            if ($user) {
                // Devolver la vista con la información del usuario
                return view('restablecerContraseña', compact('user'));
            } else {
                // El correo no corresponde a un usuario
                return view('404');
            }
        } else {
            // No se encontró el token en la tabla RestablecerContraseña
            return view('404');
        }
    }


    // Funcionalidad para restablecer la contraseña
    public function restablecerContraseña(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        // Encuentra al usuario por su ID
        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['successful' => false, 'error' => 'Usuario no encontrado'], 404);
        }

        // Actualiza la contraseña del usuario con el hash
        $user->password = Hash::make($request->password);
        $user->save();

        // Elimina el token de restablecimiento asociado con el correo del empleado
        RestablecerContraseña::where('correo', $user->correo)->delete();

        // Mensaje de éxito
        return response('<h1>Tu contraseña se ha restablecido exitosamente.</h1>');
    }



}
