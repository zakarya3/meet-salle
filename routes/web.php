<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeContorller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeContorller::class, 'index'])->name('home');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/rooms/{id}', [RoomController::class, 'findOne'])->name('rooms.show');

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
