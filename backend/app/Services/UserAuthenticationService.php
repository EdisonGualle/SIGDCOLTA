<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAuthenticationService
{
    public function attemptLogin($username, $password)
    {
        return Auth::attempt(['usuario' => $username, 'password' => $password]);
    }

    public function generateAccessToken(User $user)
    {
        $user->tokens()->delete(); // Revoking all previous tokens
        return $user->createToken('auth_token')->plainTextToken;
    }
}
