<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_usuarios; 
use App\Models\tbl_sedes; 
class UsuariosController extends Controller
{
    public function index()
    {
        // Obtener los datos de usuarios
        $usuarios = tbl_usuarios::all();
        
        // Obtener las sedes
        $sedes = tbl_sedes::all();

        return view('tables.usuarios', compact('usuarios', 'sedes'));
    }
}
