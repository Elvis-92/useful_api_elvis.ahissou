<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            'message' => 'Created',
            'data' => $user
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $request->validated();

        $user = User::where($request->only('email', $request->email));

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => ''
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'message' => 'OK',
                'data' => [
                    'token' => $token,
                    'user_id' => $request->user()->id
                ]
            ], 200);
    }

}
