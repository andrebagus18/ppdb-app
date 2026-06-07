<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/ppdb', function () {
    return view('public.home');
});
Route::get('/auth', [AuthController::class, 'showLogin'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Selamat Datang Admin!';
    })->name('admin');
});
Route::middleware(['auth', 'role:panitia'])->group(function () {
    Route::get('/panitia', function () {
        return 'Selamat Datang Panitia!';
    })->name('panitia');
});
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/ppdb', function () {
        return view('public.home');
    })->name('ppdb');
    Route::get('/dashboard', function () {
        return view('public.dashboard');
    })->name('dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/registration', [StudentController::class, 'create'])->name('registration');
    Route::post('/registration', [StudentController::class, 'store'])->name('student.store');
});
