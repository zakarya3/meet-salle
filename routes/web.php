<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeContorller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeContorller::class, 'index'])->name('home');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/rooms/{id}', [RoomController::class, 'findOne'])->name('rooms.show');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/search', [RoomController::class, 'searchByName'])->name('search');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/room/create', [DashboardController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.room.create');
Route::post('/dashboard/room', [DashboardController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.room.store');
Route::get('/dashboard/room/{id}/edit', [DashboardController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.room.edit');
Route::put('/dashboard/room/{id}', [DashboardController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.room.update');
Route::delete('/dashboard/room/{id}', [DashboardController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.room.destroy');
Route::put('/dashboard/reservation/{id}', [ReservationController::class, 'updateStatus'])->middleware(['auth', 'verified'])->name('dashboard.reservation.updateStatus');
Route::get('/add-users', function () {
    return view('add-users');
})->middleware(['auth', 'verified'])->name('add-users');
Route::post('/add-users', [DashboardController::class, 'addUser'])->middleware(['auth', 'verified'])->name('users.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
