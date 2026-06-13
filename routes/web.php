<?php

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
Route::get('/ppdb', function () {
    return view('public.home');
});

// route untuk menampilkan form login dan register
Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// route 3 role untuk admin, panitia, dan siswa
Route::middleware(['auth', 'role:admin'])->group(function () {
    // route ketika admin login ke dashboard admin
    Route::get('/admin', function () {
        return 'Selamat Datang Admin!';
    })->name('admin');
});

// route panitia dan panitia login
Route::middleware(['auth', 'role:panitia'])->group(function () {
    // route ketika panitia login ke dashboard panitia
    Route::get('/panitia', function () {
        return view('public.panitia');
    })->name('panitia');
    Route::get('/panitia', [PanitiaController::class, 'index'])->name('panitia.dashboard');
    Route::get('/panitia/registrations/{registration}', [RegistrationController::class, 'index'])->name('panitia.show');
    Route::put('/documents/{document}/approve', [PanitiaController::class, 'approve'])->name('panitia.approve');
    Route::put('/documents/{document}/reject', [PanitiaController::class, 'reject'])->name('panitia.reject');
});

// route siswa dan siswa login
Route::prefix('siswa')->middleware(['auth', 'role:siswa'])->name('siswa.')->group(function () {
    // route ketika siswa login ke homepage ppdb
    Route::get('/ppdb', function () {
        return view('public.home');
    })->name('ppdb');
    // route menuju dashboard siswa
    Route::get('/dashboard', function () {
        return view('public.siswa');
    })->name('dashboard');
    // route untuk menampilkan dashboard siswa
    Route::get('/dashboard', [StudentController::class, 'create'])->name('dashboard.siswa');
    // route action form biodata siswa
    Route::post('/registration', [StudentController::class, 'store'])->name('registration.store');
    // route action upload dokumen baru siswa
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    // route action reupload dokumen jika ditolak
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.reupload');
    // route view
    // Route::view('/info', 'siswa.info', [StudentController::class, 'create'])->name('info');
    // Route::view('/formulir', 'siswa.formulir')->name('formulir');
    // Route::view('/upload-document', 'siswa.upload-document')->name('upload-document');
    // Route::view('/pengumuman', 'siswa.pengumuman')->name('pengumuman');
});
