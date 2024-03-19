<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\IncidenciaController;

// Rutas para el administrador
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Agrega más rutas específicas para el administrador según sea necesario
});

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/', [LoginController::class, 'showForm'])->name('login')->middleware('guest'); // Agrega el middleware 'guest' para evitar que usuarios autenticados accedan al formulario de inicio de sesión
// Ruta para manejar el inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login.submit')->middleware('guest'); // Agrega el middleware 'guest' para evitar que usuarios autenticados inicien sesión nuevamente

// Rutas para las incidencias no asignadas (para los gestores)

    Route::get('/incidencies/no-assignades', [IncidenciaController::class, 'mostrarIncidenciesNoAssignades'])->name('incidencies.no-assignades');
    Route::post('/incidencies/assignar', [IncidenciaController::class, 'assignarIncidencia'])->name('incidencies.assignar');
    Route::post('/incidencies/filtrar', [IncidenciaController::class, 'filtrarIncidencias'])->name('incidencies.filtrar');


// Rutas para los técnicos
Route::middleware(['auth', 'tecnico'])->group(function () {
    Route::get('/tecnic', [TecnicoController::class, 'index'])->name('tecnic.incident'); 
});
