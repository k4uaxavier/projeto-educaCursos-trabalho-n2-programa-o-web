<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\CertificadoController;

// Rota padrão do site
Route::get('/', function () {
    return view('welcome');
});

// Painel administrativo agrupado
Route::prefix('admin')->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('inscricoes', InscricaoController::class);
    Route::resource('certificados', CertificadoController::class);
});