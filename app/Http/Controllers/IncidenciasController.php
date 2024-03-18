<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IncidenciasController extends Controller
{
    public function index()
    {
        // Obtener los datos de incidencias
        $incidencias = $this->getIncidencias();
        
        // Obtener los estados del ENUM de tbl_incidencias
        $estados = $this->getEstadosEnum();

        return view('vistas.admin', compact('incidencias', 'estados'));
    }


    // Método para obtener los estados del ENUM de tbl_incidencias
    private function getEstadosEnum()
    {
        // Definir los estados disponibles
        $estados = ['Sin asignar', 'Asignada', 'En proceso', 'Resuelta', 'Cerrada'];

        return $estados;
    }
    
    public function filtroNombre(Request $request)
    {
        // Obtener los datos de incidencias filtrados por nombre de cliente o técnico
        $incidencias = $this->getIncidencias($request->search, $request->estado);

        // Devolver la vista parcial de la tabla de incidencias
        return view('tables.incidencias', compact('incidencias'));
    }

    private function getIncidencias($search = null, $estado = null)
    {
        // Obtener los datos de incidencias
        $query = DB::table('tbl_incidencias')
            ->select(
                'tbl_incidencias.*',
                'usuarios_tecnico.nombre_usuario as tecnico_nombre',
                'usuarios_cliente.nombre_usuario as cliente_nombre',
                'subcategorias.nombre_subcategoria as subcategoria_nombre'
            )
            ->leftJoin('tbl_usuarios as usuarios_tecnico', 'tbl_incidencias.id_tecnico', '=', 'usuarios_tecnico.id')
            ->leftJoin('tbl_usuarios as usuarios_cliente', 'tbl_incidencias.id_cliente', '=', 'usuarios_cliente.id')
            ->leftJoin('tbl_subcategorias as subcategorias', 'tbl_incidencias.id_subcategoria', '=', 'subcategorias.id');
    
            // Aplicar filtro por nombre de cliente o técnico si se proporciona
            if ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('usuarios_cliente.nombre_usuario', 'like', '%' . $search . '%')
                        ->orWhere('usuarios_tecnico.nombre_usuario', 'like', '%' . $search . '%');
                });
            }
        
            // Aplicar filtro por estado si se proporciona
            if ($estado !== null) {
                $query->where('tbl_incidencias.estado', $estado);
            }
        
            return $query->get();
        }
    }
