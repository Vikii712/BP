<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/history', function () {
    return view('history');
});
Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/about', function () {
    return view('aboutus');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/event', function () {
    return view('event');
});

Route::get('/support', function () {
    return view('support');
});
