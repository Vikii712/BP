<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calendar/ical', [CalendarController::class, 'download'])->name('calendar.ical');
Route::get('/history', [PageController::class, 'history'])->name('history');
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/about', function () {
    return view('aboutus');
})->name('about');

Route::get('/event', [EventController::class, 'show'])->name('event');

Route::get('/events', [EventController::class, 'events'])->name('events');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/documents', function () {
    return view('documents');
})->name('documents');

Route::get('/financial', function () {
    return view('financial');
})->name('financial');

Route::get('/two_percent', function () {
    return view('two_percent');
})->name('two_percent');
