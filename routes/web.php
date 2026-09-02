<?php

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GaleriaController;
use Illuminate\Support\Facades\Route;


Route::get('/', [GaleriaController::class, 'index'])->name('galeria.index');
Route::get('/filme/{filme}', [GaleriaController::class, 'show'])->name('galeria.show');


Route::get('/admin/filmes', [FilmeController::class, 'index'])->name('filmes.index');
Route::get('/admin/filmes/novo', [FilmeController::class, 'create'])->name('filmes.create');
Route::post('/admin/filmes', [FilmeController::class, 'store'])->name('filmes.store');
Route::get('/admin/filmes/{filme}/editar', [FilmeController::class, 'edit'])->name('filmes.edit');
Route::put('/admin/filmes/{filme}', [FilmeController::class, 'update'])->name('filmes.update');
Route::delete('/admin/filmes/{filme}', [FilmeController::class, 'destroy'])->name('filmes.destroy');
