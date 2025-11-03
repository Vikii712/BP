<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.main');
})->name('main');



Route::post('/set-locale', function (Illuminate\Http\Request $request) {
    $locale = $request->input('locale', 'sk');
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return back();
})->name('setLocale');

Route::get('/about', function () {
    return view('pages.aboutus');
})->name('about');

Route::get('/history', function () {
    return view('pages.history');
})->name('history');

Route::get('/events', function () {
    return view('pages.events');
})->name('events');

Route::get('/event', function () {
    return view('pages.event');
})->name('event');
