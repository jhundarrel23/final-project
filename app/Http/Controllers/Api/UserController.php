<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest; // Import AdminLoginRequest
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterAdminRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Register Student (default role)
     */
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'email'       => $validated['email'],
            'username'    => $validated['username'],
            'password'    => Hash::make($validated['password']),
            // role will default to 'student' from DB migration
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Student registered successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ], 201);
    }

    /**
     * Register Admin (explicit role)
     */
    public function registerAdmin(RegisterAdminRequest $request)
    {
        // Ensure that only authenticated users with the 'admin' role can register admins
        // $user = Auth::user();
        // if ($user->role !== 'admin') {
        //     return response()->json(['message' => 'Unauthorized'], 403);
        // }

        // Proceed with registration
        $validated = $request->validated();

        $newUser = User::create([
            'email'       => $validated['email'],
            'username'    => $validated['username'],
            'password'    => Hash::make($validated['password']),
            'role'        => 'admin', // Force admin role
        ]);

        $token = $newUser->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Admin registered successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $newUser,
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

        $user = Auth::user();
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
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    /**
     * Admin Login (only admins can log in through this route)
     */
    public function adminLogin(AdminLoginRequest $request)
    {
        // Validate the credentials
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is an admin
        if ($user->role !== 'admin') {
            return response()->json([
                'message' => 'Unauthorized: Only admins can log in through this route.',
            ], 403);
        }

        // Create token for the admin
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Admin login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }
}
