<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\CourseCategoryController;

/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

// 🔓 Public Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/course-categories', [CourseCategoryController::class, 'index']);

// 🔐 Protected Routes (Requires Auth)
Route::middleware('auth:sanctum')->group(function () {
    

    Route::post('/logout', [UserController::class, 'logout']);


    Route::post('/applications', [ApplicationController::class, 'store']);
    
    Route::post('/students', [StudentInfoController::class, 'store']); 

Route::middleware('auth:sanctum')->get('/students/{userId}', [StudentInfoController::class, 'showByUserId']);


});
