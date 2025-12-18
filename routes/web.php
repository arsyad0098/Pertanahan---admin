<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\JenisPenggunaanController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\PengembangController;
use App\Http\Controllers\DokumentasiController;


// =========================
//  ROUTE AUTH (Tidak Perlu Login)
// =========================
Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::get('/auth/register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('admin.register.post');

// =========================
//  ROUTE YANG PERLU LOGIN (Dengan Middleware)
// =========================
Route::middleware(['auth.admin'])->group(function () {

    // Logout - HARUS POST METHOD
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Halaman Admin (jika masih dipakai)
    Route::get('/adminTanah', [TanahController::class, 'index'])->name('tanah');

    // =========================
    //  DATA MASTER
    // =========================
    Route::resource('warga', WargaController::class);
    Route::resource('jenis_penggunaan', JenisPenggunaanController::class);
    Route::resource('data_user', DataUserController::class);
    Route::resource('persil', PersilController::class);


    Route::get('/pengembang', [PengembangController::class, 'index'])
        ->name('pengembang.index');
    // Route untuk Persil
    Route::resource('persil', PersilController::class);

    // Route khusus untuk delete media (TAMBAHKAN INI)
    Route::delete('persil/{persil}/media/{media}', [PersilController::class, 'deleteMedia'])
        ->name('persil.media.delete');



    // Route untuk Dokumentasi
    Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
    Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
    Route::delete('/dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('dokumentasi.destroy');
});
