<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;

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

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Route::middleware(['auth', 'client'])->group(function () {
//     Route::get('/client/incidents', [IncidentController::class, 'index'])->name('client.incidents');
//     Route::get('/client/incidents/{id}', [IncidentController::class, 'show'])->name('client.incident.show');
//     Route::get('/client/incidents/create', [IncidentController::class, 'create'])->name('client.incident.create');
//     Route::post('/client/incidents/store', [IncidentController::class, 'store'])->name('client.incident.store');
// });
Route::get('/client/incident', [ClienteController::class, 'index'])->name('client.incident');
Route::get('/client/incident/{id}', [ClienteController::class, 'show'])->name('client.incident.show');
Route::get('/client/incident/create', [ClienteController::class, 'create'])->name('client.incident.create');
Route::post('/client/incident/store', [ClienteController::class, 'store'])->name('client.incident.store');

// Route::get('/obtener_subcategorias/{categoria}', 'CategoriaController@obtenerSubcategorias')->name('obtener_subcategorias');
// Route::get('/incident/{id}', 'IncidentController@showDetails')->name('incident.details');

Route::get('/tecnic', [TecnicoController::class, 'index'])->name('tecnic.incident');