<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route profil (hanya untuk user yang login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');      // Form edit profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update data profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Hapus akun
});

// Route untuk user biasa
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');              // Dashboard user
    Route::post('/booking', [UserController::class, 'store'])->name('booking.store');           // Membuat booking
    Route::get('/user-booking', [UserController::class, 'booking'])->name('booking.user');      // Riwayat booking user
    Route::get('/booking/jam-terpakai', [RoomController::class, 'jamTerpakai']);                // Cek jadwal terpakai
});

// Route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');           // Dashboard admin
    Route::resource('rooms', RoomController::class);                                            // CRUD ruangan
    Route::get('/admin-booking', [AdminController::class, 'bookingAdmin'])->name('booking.admin'); // List booking untuk admin
    Route::put('/booking/update-status/{booking}', [AdminController::class, 'updateStatus'])     // Mengubah status booking
        ->name('booking.updateStatus');
});

// Route auth (login, register, logout)
require __DIR__ . '/auth.php';
