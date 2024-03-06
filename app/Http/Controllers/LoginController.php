<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('auth.login');
    }

    /**
     * Procesa la solicitud de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validación de datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intento de inicio de sesión
        if (Auth::attempt($credentials)) {
            // Si el inicio de sesión fue exitoso, redirigir al usuario
            return redirect()->route('home'); // Cambia 'home' por la ruta correcta de tu vista principal para administradores
        }

        // Si el inicio de sesión falla, redirigir de nuevo al formulario con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }
}
