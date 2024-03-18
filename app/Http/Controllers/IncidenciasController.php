<?php
namespace App\Http\Controllers;

use App\Models\tbl_incidencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidenciasController extends Controller
{
    public function index()
    {
        // Obtener los nombres de los técnicos y clientes de las tablas de usuarios y clientes
        $incidencias = DB::table('tbl_incidencias')
            ->select('tbl_incidencias.*', 'usuarios_tecnico.nombre_usuario as tecnico_nombre', 'usuarios_cliente.nombre_usuario as cliente_nombre', 'subcategorias.nombre_subcategoria as subcategoria_nombre')
            ->leftJoin('tbl_usuarios as usuarios_tecnico', 'tbl_incidencias.id_tecnico', '=', 'usuarios_tecnico.id')
            ->leftJoin('tbl_usuarios as usuarios_cliente', 'tbl_incidencias.id_cliente', '=', 'usuarios_cliente.id')
            ->leftJoin('tbl_subcategorias as subcategorias', 'tbl_incidencias.id_subcategoria', '=', 'subcategorias.id')
            ->get();

        return view('vistas.admin', compact('incidencias'));
    }

    public function filtroNombre(Request $request)
    {
        // Obtener los nombres de los técnicos y clientes de las tablas de usuarios y clientes
        $incidencias = DB::table('tbl_incidencias')
            ->select('tbl_incidencias.*', 'usuarios_tecnico.nombre_usuario as tecnico_nombre', 'usuarios_cliente.nombre_usuario as cliente_nombre', 'subcategorias.nombre_subcategoria as subcategoria_nombre')
            ->leftJoin('tbl_usuarios as usuarios_tecnico', 'tbl_incidencias.id_tecnico', '=', 'usuarios_tecnico.id')
            ->leftJoin('tbl_usuarios as usuarios_cliente', 'tbl_incidencias.id_cliente', '=', 'usuarios_cliente.id')
            ->leftJoin('tbl_subcategorias as subcategorias', 'tbl_incidencias.id_subcategoria', '=', 'subcategorias.id')
            ->where('usuarios_cliente.nombre_usuario', 'like', '%' . $request->search . '%')
            ->get();
    
        return view('tables.incidencias', compact('incidencias'));
    }
}
