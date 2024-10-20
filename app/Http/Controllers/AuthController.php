<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $service)
    {
        $result = $service->login(
            $request->validated('phone_number'),
            $request->validated('password')
        );
        return response()->json($result,$result['status']);
    }

    public function logout(AuthService $service)
    {
        $user = auth()->user();
        $result = $service->logout($user);
        return response()->json($result, $result['status']);
    }
}
