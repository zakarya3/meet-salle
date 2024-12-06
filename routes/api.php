<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Open Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::group(['middleware' => 'auth:api'], function () {
  Route::get('/profile', [AuthController::class, 'profile']);
  Route::get('/logout', [AuthController::class, 'logout']);
});
