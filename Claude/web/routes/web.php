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

