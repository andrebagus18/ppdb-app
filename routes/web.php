<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('public.home');
});
Route::get('/registration', function () {
    return view('public.registration');
});
