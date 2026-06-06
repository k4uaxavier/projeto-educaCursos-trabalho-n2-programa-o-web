<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\AdminController;

// Landing page pública
Route::get('/', function () {
    return view('welcome');
});

// Painel administrativo
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('categorias', CategoriaController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('inscricoes', InscricaoController::class);
    Route::resource('certificados', CertificadoController::class);
});
