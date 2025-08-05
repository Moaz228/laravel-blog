<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);

        if (!$token) {
            return response()->json(['message' => "Unauthorized access!"], 401);
        }

        return response()->json([
            'access_token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        try {
            $newToken = JWTAuth::parseToken()->refresh();

            return response()->json([
                'access_token' => $newToken,
                'expires_in' => JWTAuth::factory()->getTTL() * 60
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        }
    }
    public function me()
    {
        $user = auth('api')->user();

        return response()->json($user);
    }
    public function logout()
    {
        auth('api')->logout(true);

        return response()->json(["message" => "Logged out successfully."]);
    }
}
