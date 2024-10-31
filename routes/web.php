<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/belajar', [HomeController::class, 'belajar']);



// Definisi rute resource yang benar
Route::resource('films', FilmController::class);
