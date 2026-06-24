<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

// route login register
Route::prefix('auth')->middleware(['guest'])->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('process-login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::prefix('auth')->middleware(['auth'])->name('auth.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
// route admin dan admin login
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // route ketika admin login ke dashboard admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // seleksi dan publish
    Route::get('/seleksi', [SeleksiController::class, 'index'])->name('seleksi.index');
    Route::get('/seleksi/jalankan-seleksi', [SeleksiController::class, 'seleksi'])->name('seleksi');
    Route::get('/seleksi/publish-seleksi', [SeleksiController::class, 'publishSeleksi'])->name('publish-seleksi');
    Route::get('/seleksi/batal-seleksi', [SeleksiController::class, 'batalSeleksi'])->name('batal-seleksi');
    // CRUD Pengumuman
    Route::get('/announcement', [AnnouncementsController::class, 'index'])->name('announcement');
    Route::post('/announcement/create', [AnnouncementsController::class, 'create'])->name('announcement.create');
    Route::put('/announcement/{announcement}/update', [AnnouncementsController::class, 'update'])->name('announcement.update');
    Route::delete('/announcement/{announcement}/destroy', [AnnouncementsController::class, 'destroy'])->name('announcement.destroy');
    Route::post('/announcement/{announcement}/publish', [AnnouncementsController::class, 'publish'])->name('announcement.publish');
    // CRUD new panitia
    Route::get('/manajemen', [ManajemenController::class, 'index'])->name('manajemen');
    Route::post('/manajemen/create', [ManajemenController::class, 'create'])->name('manajemen.create');
    Route::put('/manajement/{manajemen}/update', [ManajemenController::class, 'update'])->name('manajemen.update');
    Route::delete('/manajemen/{user}/destroy', [ManajemenController::class, 'destroy'])->name('manajemen.destroy');
    // laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/export', [LaporanController::class, 'export'])->name('laporan.export');
});

// route panitia dan panitia login
Route::prefix('panitia')->middleware(['auth', 'role:panitia'])->name('panitia.')->group(function () {
    Route::get('/dashboard', [PanitiaController::class, 'dashboard'])->name('dashboard');
    Route::get('/registrations', [PanitiaController::class, 'registrations'])->name('registrations');
    Route::get('/verifikasi', [PanitiaController::class, 'verifikasi'])->name('verifikasi');
    Route::put('/documents/{document}/approve', [PanitiaController::class, 'approve'])->name('panitia.approve');
    Route::put('/documents/{document}/reject', [PanitiaController::class, 'reject'])->name('panitia.reject');
});


// route siswa dan siswa login
Route::prefix('siswa')->middleware(['auth', 'role:siswa,admin'])->name('siswa.')->group(function () {
    // route ketika siswa login ke homepage ppdb
    Route::get('/ppdb', [StudentController::class, 'home'])->name('ppdb');
    // route untuk menampilkan dashboard siswa
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
    Route::get('/formulir', [StudentController::class, 'formulir'])->name('formulir');
    // route action form biodata siswa
    Route::post('/registration', [StudentController::class, 'store'])->name('registration.store');
    // route action upload dokumen baru siswa
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    // route action reupload dokumen jika ditolak
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.reupload');
});
