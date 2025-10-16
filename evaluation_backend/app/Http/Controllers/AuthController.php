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
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Created',
            'data' => $user
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $request->validated();

        if(Auth::attempt($request->only('email', 'password'))) {
            $token = $request->user()->createToken()->plainTextToken;
            
            return response()->json([
                'message' => 'OK',
                'data' => [
                    'token' => $token,
                    'user_id' => $request->user()->id
                ]
            ], 200);
        }

        return response()->json([
            'message' => ''
        ], 401);
    }
}
