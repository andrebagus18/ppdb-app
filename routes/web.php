<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
// home page ppdb
// Route::get('/ppdb', function () {
//     return view('public.home');
// });

// route untuk menampilkan form login dan register
Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// route 3 role untuk admin, panitia, dan siswa
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // route ketika admin login ke dashboard admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/seleksi', [AdminController::class, 'seleksi'])->name('seleksi');
    Route::get('/pengumuman', [AdminController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/manajemen', [AdminController::class, 'manajemen'])->name('manajemen');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
});

// route panitia dan panitia login
Route::prefix('panitia')->middleware(['auth', 'role:panitia'])->name('panitia.')->group(function () {
    // route ketika panitia login ke dashboard panitia
    // Route::get('/panitia', function () {
    //     return view('public.panitia');
    // })->name('panitia');
    // Route::get('/dashboard', [PanitiaController::class, 'index'])->name('index');
    Route::get('/dashboard', [PanitiaController::class, 'dashboard'])->name('dashboard');
    Route::get('/registrations', [PanitiaController::class, 'registrations'])->name('registrations');
    Route::get('/verifikasi', [PanitiaController::class, 'verifikasi'])->name('verifikasi');
    Route::put('/documents/{document}/approve', [PanitiaController::class, 'approve'])->name('panitia.approve');
    Route::put('/documents/{document}/reject', [PanitiaController::class, 'reject'])->name('panitia.reject');
});


// route siswa dan siswa login
Route::prefix('siswa')->middleware(['auth', 'role:siswa'])->name('siswa.')->group(function () {
    // route ketika siswa login ke homepage ppdb
    Route::get('/ppdb', [StudentController::class, 'home'])->name('ppdb');
    // route untuk menampilkan dashboard siswa
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
    // route action form biodata siswa
    Route::post('/registration', [StudentController::class, 'store'])->name('registration.store');
    // route action upload dokumen baru siswa
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    // route action reupload dokumen jika ditolak
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.reupload');
});
