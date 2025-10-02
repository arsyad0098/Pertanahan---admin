<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanahController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/data-tanah', [TanahController::class, 'index']);