<?php

use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilmController::class, 'index'])->name('films.index');
Route::post('/filmes', [FilmController::class, 'store'])->name('films.store');
