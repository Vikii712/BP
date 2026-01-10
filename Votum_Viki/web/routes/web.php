<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('main');

Route::get('/calendar.ics', [HomeController::class, 'ics'])->name('calendar.ics');


Route::post('/set-locale', function (Illuminate\Http\Request $request) {
    $locale = $request->input('locale', 'sk');
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return back();
})->name('setLocale');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/history', [HistoryController::class, 'index'])->name('history');

Route::get('/events', function () {
    return view('pages.events');
})->name('events');

Route::get('/event', function () {
    return view('pages.event');
})->name('event');

Route::get('/documents', function () {
    return view('pages.documents');
})->name('documents');

Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

Route::get('/support', [SupportController::class, 'index'])->name('support');

Route::get('/support/2percent', [SupportController::class, 'percent'])->name('2percent');

Route::get('/support/financial', [SupportController::class, 'financial'])->name('financial');

Route::get('/support/other', [SupportController::class, 'other'])->name('other');

Route::get('/a11y', function () {
    return view('pages.a11y');
})->name('a11y');

require __DIR__.'/auth.php';
