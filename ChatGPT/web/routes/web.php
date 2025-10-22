<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calendar/ical', [CalendarController::class, 'download'])->name('calendar.ical');
Route::get('/history', [PageController::class, 'history'])->name('history');
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');
