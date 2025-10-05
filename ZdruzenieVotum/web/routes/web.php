<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/set-locale', [HomeController::class, 'setLocale'])->name('set-locale');
Route::get('/calendar.ics', [HomeController::class, 'calendarIcs'])->name('calendar.ics');
