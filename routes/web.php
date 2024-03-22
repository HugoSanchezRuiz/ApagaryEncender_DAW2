<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\UsuariosController;

// Rutas para el manejo de usuarios
Route::get('/admin/usuarios', [UsuariosController::class, 'index'])->name('vistas.admin.usuarios');
Route::get('/usuarios/filtrar', [UsuariosController::class, 'filtrar'])->name('usuarios.filtrar');
Route::get('/tables/usuarios', [UsuariosController::class, 'index'])->name('tables.usuarios');

// Rutas para el manejo de incidencias
Route::get('/admin/incidencias', [IncidenciasController::class, 'index'])->name('vistas.admin.incidencias');
Route::get('/admin/incidencias/filtrar', [IncidenciasController::class, 'filtroNombre'])->name('incidencias.filtrar');
Route::post('/usuarios/{id}/actualizarEstado', [UsuariosController::class, 'actualizarEstado'])->name('usuarios.actualizarEstado');

