<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_usuarios; 
use App\Models\tbl_sedes; 

class UsuariosController extends Controller
{
    public function index()
    {
        try {
            // Obtener los datos de usuarios
            $usuarios = tbl_usuarios::all();
            
            // Obtener las sedes
            $sedes = tbl_sedes::all();

            // Mapear los IDs de las sedes a sus nombres correspondientes
            $sedesMap = $sedes->pluck('nombre_sede', 'id')->toArray();

            // Modificar los campos de supervisor y estado para imprimir "SI" o "NO"
            $usuarios->transform(function ($usuario) {
                $usuario->supervisor = $usuario->supervisor ? 'Si' : 'No';
                $usuario->estado = $usuario->estado ? 'Activo' : 'Inactivo';
                return $usuario;
            });

            return view('vistas.admin.usuarios', compact('usuarios', 'sedes', 'sedesMap'));
        } 
        
        catch (\Exception $e) {
            // Manejo de excepciones si ocurriera algún error
            return redirect()->back()->with('error', 'Error al cargar usuarios: ' . $e->getMessage());
        }
    }
}
