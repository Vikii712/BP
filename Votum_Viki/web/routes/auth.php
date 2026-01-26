<?php

use App\Http\Controllers\EventsEditController;
use App\Http\Controllers\HomeEditController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\SectionEditController;
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

    // CHANGE PASSWORD
    Route::get('votumaci/password', [PasswordController::class, 'edit'])
        ->name('password.change');
    Route::put('votumaci/password', [PasswordController::class, 'update'])
        ->name('password.update');

    //MANAGE ADMINS
    Route::get('votumaci/manage-admins', [AdminController::class, 'manageAdmins'])
        ->name('admin.manage');
    Route::post('votumaci/manage-admins/add', [AdminController::class, 'add'])
        ->name('admin.add');
    Route::delete('votumaci/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    // Logout
    Route::post('votumaci/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    //DOMOV
    Route::get('votumaci/admin/home', [HomeEditController::class, 'edit'])
        ->name('home.edit');
    Route::put('votumaci/admin/home', [HomeEditController::class, 'update'])
        ->name('home.update');

    Route::get('votumaci/about', function () {
        return view('pages.admin.about');
    })->name('admin.about');

    Route::prefix('votumaci/admin/events')->group(function () {
        Route::get('/', [EventsEditController::class, 'index'])->name('admin.events');
        Route::get('create', [EventsEditController::class, 'create'])->name('events.create');
        Route::get('{event}/edit', [EventsEditController::class, 'edit'])->name('events.edit');
        Route::post('store', [EventsEditController::class, 'store'])->name('events.store');
        Route::put('{event}', [EventsEditController::class, 'update'])->name('events.update');
        Route::post('{event}/archive', [EventsEditController::class, 'archive'])->name('events.archive');
        Route::post('{event}/restore', [EventsEditController::class, 'restore'])->name('events.restore');
        Route::delete('{event}', [EventsEditController::class, 'destroy'])->name('events.destroy');
    });

    //Sections
    Route::prefix('votumaci/admin/{category}')->group(function () {
        Route::get('/', [SectionEditController::class, 'index'])->name('section.index');
        Route::post('/add', [SectionEditController::class, 'add'])->name('section.add');
        Route::put('/{id}', [SectionEditController::class, 'update'])->name('section.update');
        Route::delete('/{id}', [SectionEditController::class, 'delete'])->name('section.delete');
        Route::post('/{id}/up', [SectionEditController::class, 'moveUp'])->name('section.up');
        Route::post('/{id}/down', [SectionEditController::class, 'moveDown'])->name('section.down');
    });

});
