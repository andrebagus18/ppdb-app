<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/ppdb', function () {
    return view('public.home');
});
Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'role:admin'])->group(function () {
    // route ketika admin login ke dashboard admin
    Route::get('/admin', function () {
        return 'Selamat Datang Admin!';
    })->name('admin');
});
Route::middleware(['auth', 'role:panitia'])->group(function () {
    // route ketika panitia login ke dashboard panitia
    Route::get('/panitia', function () {
        return 'Selamat Datang Panitia!';
    })->name('panitia');
});
Route::middleware(['auth', 'role:siswa'])->group(function () {
    // route ketika siswa login ke homepage ppdb
    Route::get('/ppdb', function () {
        return view('public.home');
    })->name('ppdb');
    // route menuju dashboard siswa
    Route::get('/dashboard', function () {
        return view('public.registration');
    })->name('dashboard');
});
Route::middleware(['auth'])->group(function () {
    // route untuk menampilkan dashboard siswa
    Route::get('/dashboard', [StudentController::class, 'create'])->name('dashboard');
    // route action form biodata siswa
    Route::post('/registration', [StudentController::class, 'store'])->name('student.store');
    // route action upload dokumen baru siswa
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    // route action reupload dokumen jika ditolak
    Route::post('/documents/{document}', [DocumentController::class, 'update'])->name('documents.reupload');
});
