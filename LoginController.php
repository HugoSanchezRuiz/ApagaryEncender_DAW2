<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tbl_usuarios;

class LoginController extends Controller
{
    // Método para mostrar el formulario de inicio de sesión
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario de inicio de sesión
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Intentar iniciar sesión sin cifrar la contraseña
        $user = tbl_usuarios::where('email', $credentials['email'])->first();
    
        if ($user && $user->pass == $credentials['password']) {
            Auth::login($user);
            // Obtener el rol del usuario autenticado
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
        } else {
            // Si la autenticación falla, redireccionar de nuevo al formulario de inicio de sesión con un mensaje de error
            return redirect()->route('login')->with('error', 'Credenciales inválidas');
        }
    }
}
