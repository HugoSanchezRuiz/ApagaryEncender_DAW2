<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
// use App\Http\Controllers\TecnicoController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Agrega más rutas específicas para el administrador según sea necesario
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', function () {
//         return view('admin.index'); // Cambia 'admin.index' por la ruta correcta de tu vista principal para administradores
//     })->name('home');
// });

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

//Cuando vaya el login
// Route::middleware(['auth', 'client'])->group(function () {
//     Route::get('/client/incident', [IncidentController::class, 'index'])->name('client.incidents');
//     Route::get('/client/incident/{id}', [IncidentController::class, 'show'])->name('client.incident.show');
//     Route::get('/client/incident/create', [IncidentController::class, 'create'])->name('client.incident.create');
//     Route::post('/client/incident/store', [IncidentController::class, 'store'])->name('client.incident.store');
// });


// Ruta para la página principal
Route::get('/', [ClienteController::class, 'index'])->name('index');

// Ruta para cargar las incidencias
Route::get('/incidencias', [ClienteController::class, 'getCargarIncidencias'])->name('getCargarIncidencias');

// Ruta para filtrar las incidencias por estado
Route::get('/incidencias/filtrar', [ClienteController::class, 'getFiltrarIncidencias'])->name('filtrarIncidencias');

// Ruta para ordenar las incidencias
Route::get('/incidencias/ordenar', [ClienteController::class, 'getOrdenarIncidencias'])->name('ordenarIncidencias');

// Ruta para almacenar una nueva incidencia
Route::post('/incidencias/store', [ClienteController::class, 'store'])->name('store');

// Ruta para ver los detalles de una incidencia
Route::get('/show/{id}', [ClienteController::class, 'show'])->name('show');

Route::get('/subcategorias/{categoria_id}', [ClienteController::class, 'getSubcategorias'])->name('getSubcategorias');