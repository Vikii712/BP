<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::get('votumaci', [AuthenticatedSessionController::class, 'check'])->name('login');

Route::middleware('guest')->post('votumaci', [AuthenticatedSessionController::class, 'store']);


Route::middleware('guest')->group(function () {
    Route::get('votumaci/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('votumaci/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('votumaci/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('votumaci/reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('votumaci/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('votumaci/verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('votumaci/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('votumaci/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Confirm password
    Route::get('votumaci/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    Route::post('votumaci/confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Update password
    Route::put('votumaci/password', [PasswordController::class, 'update'])
        ->name('password.update');

    // Logout
    Route::post('votumaci/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
