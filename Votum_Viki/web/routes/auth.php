<?php

use App\Http\Controllers\ContactsEditController;
use App\Http\Controllers\DocumentsEditController;
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
use App\Http\Controllers\SupportEditController;
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
    Route::get('votumaci/panel', [AdminController::class, 'index'])->name('admin');

    Route::get('votumaci/verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('votumaci/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('votumaci/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('votumaci/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    Route::post('votumaci/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::get('votumaci/password', [PasswordController::class, 'edit'])
        ->name('password.change');
    Route::put('votumaci/password', [PasswordController::class, 'update'])
        ->name('password.update');

    Route::get('votumaci/admins', [AdminController::class, 'manageAdmins'])
        ->name('admin.manage');
    Route::post('votumaci/admins', [AdminController::class, 'add'])
        ->name('admin.add');
    Route::delete('votumaci/admins/{id}', [AdminController::class, 'delete'])
        ->name('admin.delete');

    Route::post('votumaci/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // DOMOV
    Route::get('votumaci/home', [HomeEditController::class, 'edit'])
        ->name('home.edit');
    Route::put('votumaci/home', [HomeEditController::class, 'update'])
        ->name('home.update');

    Route::get('votumaci/about', function () {
        return view('pages.admin.about');
    })->name('admin.about');

    // EVENTS
    Route::prefix('votumaci/events')->group(function () {
        Route::get('/', [EventsEditController::class, 'index'])->name('events.index');
        Route::get('/create', [EventsEditController::class, 'create'])->name('events.create');
        Route::post('/', [EventsEditController::class, 'store'])->name('events.store');
        Route::get('/{event}', [EventsEditController::class, 'edit'])->name('events.edit');
        Route::put('/{event}', [EventsEditController::class, 'update'])->name('events.update');
        Route::post('/{event}/archive', [EventsEditController::class, 'archive'])->name('events.archive');
        Route::post('/{event}/unarchive', [EventsEditController::class, 'unarchive'])->name('events.unarchive');
        Route::post('/{event}/restore', [EventsEditController::class, 'restore'])->name('events.restore');
        Route::delete('/{event}', [EventsEditController::class, 'destroy'])->name('events.destroy');
    });

    Route::get('votumaci/support', function () {
        return view('pages.admin.support');
    })->name('admin.support');

    Route::post('votumaci/support/percent-documents',
        [SupportEditController::class, 'storePercentDocuments']
    )->name('support.percent.documents.store');

    // SUPPORT
    Route::prefix('votumaci/support')->group(function () {
        Route::get('/{type}', [SupportEditController::class, 'edit'])
            ->where('type', 'percent|financial|other')
            ->name('support.edit');
        Route::put('/{id}', [SupportEditController::class, 'update'])
            ->name('support.update');
    });

    // CONTACTS
    Route::prefix('votumaci/contacts')->group(function () {
        Route::get('/', [ContactsEditController::class, 'edit'])->name('contacts.edit');
        Route::put('/{id}', [ContactsEditController::class, 'update'])->name('contacts.update');
    });

    // DOCUMENTS
    Route::prefix('votumaci/documents')->group(function () {
        Route::get('/{id}', [DocumentsEditController::class, 'edit'])->name('documents.edit');
        Route::put('/{id}', [DocumentsEditController::class, 'update'])->name('documents.update');
    });

    // SECTIONS - musí byť posledná, {category} je wildcard
    Route::prefix('votumaci/sections/{category}')->group(function () {
        Route::get('/', [SectionEditController::class, 'index'])->name('section.index');
        Route::post('/', [SectionEditController::class, 'add'])->name('section.add');
        Route::put('/{id}', [SectionEditController::class, 'update'])->name('section.update');
        Route::post('/{id}/up', [SectionEditController::class, 'moveUp'])->name('section.up');
        Route::post('/{id}/down', [SectionEditController::class, 'moveDown'])->name('section.down');
        Route::delete('/{id}', [SectionEditController::class, 'destroy'])->name('section.destroy');
        Route::post('/{id}/restore', [SectionEditController::class, 'restore'])->name('section.restore');
    });
});

