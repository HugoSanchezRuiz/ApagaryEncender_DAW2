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

            // Obtener los roles
            $roles = ['Cliente', 'Técnico', 'Gestor', 'Administrador']; // Definir los roles como un array

            // Mapear los IDs de las sedes a sus nombres correspondientes
            $sedesMap = $sedes->pluck('nombre_sede', 'id')->toArray();

            // Modificar los campos de supervisor y estado para imprimir "SI" o "NO"
            $usuarios->transform(function ($usuario) {
                $usuario->supervisor = $usuario->supervisor ? 'Si' : 'No';
                $usuario->estado = $usuario->estado ? 'Activo' : 'Inactivo';
                return $usuario;
            });

            return view('vistas.admin.usuarios', compact('usuarios', 'sedes', 'sedesMap', 'roles'));
        } 
        
        catch (\Exception $e) {
            // Manejo de excepciones si ocurriera algún error
            return redirect()->back()->with('error', 'Error al cargar usuarios: ' . $e->getMessage());
        }
    }

    public function filtrar(Request $request)
    {
        try {
            $usuariosQuery = tbl_usuarios::query();
    
            // Aplicar filtros
            if ($request->has('search')) {
                $usuariosQuery->where('nombre_usuario', 'like', '%' . $request->search . '%');
            }
            if ($request->has('supervisor')) {
                $usuariosQuery->where('supervisor', $request->supervisor);
            }
            if ($request->has('estado')) {
                if ($request->estado !== '') {
                    $usuariosQuery->where('estado', $request->estado);
                }
            }
            if ($request->has('sede')) {
                if ($request->sede !== '') {
                    $usuariosQuery->where('id_sede', $request->sede);
                }
            }
            if ($request->has('rol')) {
                if ($request->rol !== '') {
                    $usuariosQuery->where('rol', $request->rol);
                }
            }            
    
            $usuarios = $usuariosQuery->get();
    
            // Modificar los campos de supervisor y estado para imprimir "Si" o "No"
            $usuarios->transform(function ($usuario) {
                $usuario->supervisor = $usuario->supervisor ? 'Si' : 'No';
                $usuario->estado = $usuario->estado ? 'Activo' : 'Inactivo';
                return $usuario;
            });
    
            // Obtener las sedes
            $sedes = tbl_sedes::all();
            // Mapear los IDs de las sedes a sus nombres correspondientes
            $sedesMap = $sedes->pluck('nombre_sede', 'id')->toArray();
    
            // Devolver la vista de usuarios actualizada with the sedesMap variable
            return view('tables.usuarios', compact('usuarios', 'sedesMap'));
        } 
        
        catch (\Exception $e) {
            // Manejo de excepciones si ocurriera algún error
            return response()->json(['error' => 'Error al filtrar usuarios: ' . $e->getMessage()], 500);
        }
    }
}