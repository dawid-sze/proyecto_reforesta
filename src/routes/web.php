<?php

use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventosController::class, 'index'])->name('inicio');

Route::resource('usuarios',UsuariosController::class);
Route::resource('especies',EspeciesController::class);
Route::resource('eventos',EventosController::class);
Route::get('login', [UsuariosController::class, 'loginForm']);
Route::get('login', [UsuariosController::class, 'login']);
Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');
