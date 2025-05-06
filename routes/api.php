<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\CourseCategoryController;

// 🔓 Public Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/course-categories', [CourseCategoryController::class, 'index']);

// 🔐 Protected Routes (Requires Auth)
Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('/logout', [UserController::class, 'logout']);
    
    // Application-related routes
    Route::post('/applications', [ApplicationController::class, 'store']);
    
    // Student info-related routes
    Route::post('/students', [StudentInfoController::class, 'store']); 
    Route::get('/students/{userId}', [StudentInfoController::class, 'showByUserId']);
});

// Admin-only route (requires 'admin' role)
// Temporarily allow any authenticated user to register an admin (for debugging purposes)
Route::post('/register-admin', [UserController::class, 'registerAdmin']);



Route::post('/admin-login', [UserController::class, 'adminLogin']);

