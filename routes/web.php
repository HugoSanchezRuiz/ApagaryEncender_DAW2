<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenciasController;

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

Route::get('/', function () {return view('welcome');});

Route::get('/admin', [IncidenciasController::class, 'index'])->name('vistas.admin');

Route::get('/admin/search', [IncidenciasController::class, 'filtroNombre'])->name('incidencia.filtroNombre');
