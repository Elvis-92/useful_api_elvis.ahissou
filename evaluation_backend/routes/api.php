<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/modules', [ModuleController::class, 'index'])->middleware('auth:sanctum');
Route::get('/activate', [ModuleController::class, 'activate'])->middleware('auth:sanctum');
Route::get('/desactivate', [ModuleController::class, 'desactivate'])->middleware('auth:sanctum');
