<?php

use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::resource('usuarios',UsuariosController::class);
Route::resource('especies',EspeciesController::class);
Route::resource('eventos',EventosController::class);