<?php


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\IncidenciaController;

// Ruta para mostrar la página de inicio
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [LoginController::class, 'showForm'])->name('login')->middleware('guest');

// Ruta para manejar el inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login.submit')->middleware('guest');

// Rutas para el administrador
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Agrega más rutas específicas para el administrador según sea necesario
});

// Rutas para los gestores
Route::middleware(['auth', 'gestor'])->group(function () {
    Route::get('/incidencies/no-assignades', [IncidenciaController::class, 'mostrarIncidenciesNoAssignades'])->name('incidencies.no-assignades');
    Route::post('/incidencies/assignar', [IncidenciaController::class, 'assignarIncidencia'])->name('incidencies.assignar');
    Route::post('/incidencies/filtrar', [IncidenciaController::class, 'filtrarIncidencias'])->name('incidencies.filtrar');
});

// Rutas para los técnicos
Route::middleware(['auth', 'tecnico'])->group(function () {
    Route::get('/tecnic', [TecnicoController::class, 'index'])->name('tecnic.incident');
});

// Ruta predeterminada para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/default', function () {
        $user = Auth::user();
        switch ($user->rol) {
            case 'Administrador':
                return redirect()->route('admin.dashboard');
                break;
            case 'Gestor':
                return redirect()->route('incidencies.no-assignades');
                break;
            case 'Cliente':
                // Ajusta esto según las necesidades de tu aplicación
                return redirect()->route('ruta_para_clientes');
                break;
            case 'Técnico':
                // Ajusta esto según las necesidades de tu aplicación
                return redirect()->route('ruta_para_tecnicos');
                break;
            default:
                // Por seguridad, redireccionar al login si el rol no está definido
                return redirect()->route('login')->with('error', 'Rol no definido');
                break;
        }
    })->name('default');
});
