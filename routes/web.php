<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\JenisPenggunaanController;
use App\Http\Controllers\PersilController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminTanah', [TanahController::class, 'index'])->name('tanah');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('warga', WargaController::class);
Route::resource('jenis_penggunaan', JenisPenggunaanController::class);
