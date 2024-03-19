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
Route::get('/admin/usuarios', function () {
    return view('vistas.admin.usuarios');
})->name('vistas.admin.usuarios');

/* Manejo de inicidencias */
Route::get('/admin/incidencias', function () {
    return view('vistas.admin.incidencias');
})->name('vistas.admin.incidencias');

Route::get('/admin/search', [IncidenciasController::class, 'filtroNombre'])->name('incidencia.filtroNombre');

