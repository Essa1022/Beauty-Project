<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login($phone_number, $password)
    {
        $user = User::where('phone_number', $phone_number)->first();

        if (!Hash::check($password, $user->password))
        {
            return ['message' => 'Wrong password', 'status' => 401];
        }

        $token = $user->createToken("token-name-{$user->id}")->plainTextToken;

        return [
            'message' => 'Logged in successfully',
            'token' => $token,
            'status' => 200
        ];
    }

    public function logout($user)
    {
        $user->currentAccessToken()->delete();
        return [
            'message' => 'Logged out',
            'status' => 200
        ];
    }
}






