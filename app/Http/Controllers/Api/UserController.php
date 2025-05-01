<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\StudentInfo;

class UserController extends Controller
{
 
    public function register(RegisterRequest $request)
    {

        $validated = $request->validated();

        $user = User::create([
            'email'       => $validated['email'],
            'username'    => $validated['username'],
            'password'    => Hash::make($validated['password']), 
        ]);

      


        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'access_token' => $token,   
            'token_type' => 'Bearer',   
            'user' => $user,
        ], 201);
    }

    /**
     * User Login
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Get authenticated user
        $user = Auth::user();

        // Generate token for the authenticated user
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    /**
     * User Logout
     */
    public function logout(Request $request)
    {
        // Revoke current access token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
