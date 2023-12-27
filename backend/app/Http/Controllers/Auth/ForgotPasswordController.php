<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['usuario' => 'required|exists:usuarios,usuario']); // Regla de validación ajustada

        $user = User::where('usuario', $request->usuario)->firstOrFail(); // Uso de firstOrFail para mayor claridad

        $status = Password::sendResetLink(['email' => $user->empleado->correo]);

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['usuario' => __($status)]);
    }
}