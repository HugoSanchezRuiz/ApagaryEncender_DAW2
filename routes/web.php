<?php

use Illuminate\Support\Facades\Route;

/* CONTROLLERS IKER */
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\UsuariosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/* Manejo de usuarios */
Route::get('/admin/usuarios', [UsuariosController::class, 'index'])->name('vistas.admin.usuarios');

Route::get('/usuarios/filtrar', [UsuariosController::class, 'filtrar'])->name('usuarios.filtrar');

/* Manejo de inicidencias */
Route::get('/admin/incidencias', [IncidenciasController::class, 'index'])->name('vistas.admin.incidencias');

Route::get('/admin/incidencias/filtrar', [IncidenciasController::class, 'filtroNombre'])->name('incidencias.filtrar');

