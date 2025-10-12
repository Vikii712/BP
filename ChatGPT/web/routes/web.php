<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calendar/ical', [CalendarController::class, 'download'])->name('calendar.ical');
