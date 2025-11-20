<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\JenisPenggunaanController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\PersilController;

// =========================
//  ROUTE UTAMA
// =========================
Route::get('/', function () {
    return view('pages.auth.login');
});

// =========================
//  AUTENTIKASI ADMIN
// =========================
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

Route::get('/admin/register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'register'])->name('admin.register.submit');

Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// =========================
//  HALAMAN ADMIN
// =========================
Route::get('/adminTanah', [TanahController::class, 'index'])->name('tanah');

// Halaman setelah login
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// =========================
//  DATA MASTER
// =========================
Route::resource('warga', WargaController::class);
Route::resource('jenis_penggunaan', JenisPenggunaanController::class);

Route::resource('data_user', DataUserController::class);
Route::resource('persil', PersilController::class);
