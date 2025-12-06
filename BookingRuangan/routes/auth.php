<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Route untuk pengguna yang belum login (guest)
Route::middleware('guest')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create']) // Halaman register
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']); // Proses register

    Route::get('login', [AuthenticatedSessionController::class, 'create']) // Halaman login
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']); // Proses login

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create']) // Form lupa password
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store']) // Kirim link reset password
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create']) // Form reset password
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store']) // Update password baru
        ->name('password.store');
});

// Route untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {

    Route::get('verify-email', EmailVerificationPromptController::class) // Notifikasi verifikasi email
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class) // Proses verifikasi email
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store']) 
        ->middleware('throttle:6,1') // Kirim ulang email verifikasi
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show']) // Form konfirmasi password
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']); // Proses konfirmasi

    Route::put('password', [PasswordController::class, 'update']) // Update password
        ->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']) // Logout
        ->name('logout');
});
