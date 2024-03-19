<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario ha iniciado sesión y tiene el rol 'gestor'
        if (Auth::check() && Auth::user()->rol === 'Gestor') { // Asegúrate de que el rol coincida exactamente, considerando mayúsculas y minúsculas
            return $next($request);
        }

        // Si el usuario no tiene el rol 'gestor', redireccionar al formulario de inicio de sesión
        return redirect('/login')->with('error', 'Acceso no autorizado.');
    }
}
