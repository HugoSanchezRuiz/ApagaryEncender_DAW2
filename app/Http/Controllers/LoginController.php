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
        // Validate the form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Authentication passed, redirect to the intended destination or a default route
            return redirect()->intended('/dashboard');
        }

        // Authentication failed, redirect back with an error message
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }
}
