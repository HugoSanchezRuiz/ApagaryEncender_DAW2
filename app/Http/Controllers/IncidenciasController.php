<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidenciasController extends Controller
{
    public function index()
    {
        // Obtener los datos de incidencias
        $incidencias = $this->getIncidencias();
        
        // Obtener los estados del ENUM de tbl_incidencias
        $estados = $this->getEstadosEnum();

        // Obtener las categorías
        $categorias = $this->getCategorias();

        return view('vistas.admin.incidencias', compact('incidencias', 'estados', 'categorias'));
    }


    // Método para obtener los estados del ENUM de tbl_incidencias
    private function getEstadosEnum()
    {
        // Definir los estados disponibles
        $estados = ['Sin asignar', 'Asignada', 'En proceso', 'Resuelta', 'Cerrada'];

        return $estados;
    }

    // Método para obtener las categorías
    private function getCategorias()
    {
        // Consulta para obtener las categorías
        $categorias = DB::table('tbl_categorias')->pluck('nombre_categoria');

        return $categorias;
    }
    
    public function filtroNombre(Request $request)
    {
        // Obtener los datos de incidencias filtrados por nombre de cliente o técnico
        $incidencias = $this->getIncidencias($request->search, $request->estado, $request->categoria);

        // Devolver la vista parcial de la tabla de incidencias
        return view('tables.incidencias', compact('incidencias'));
    }

    // Método para obtener los datos de incidencias
    private function getIncidencias($search = null, $estado = null, $categoria = null)
    {
        // Obtener los datos de incidencias
        $query = DB::table('tbl_incidencias')
            ->select(
                'tbl_incidencias.*',
                'usuarios_tecnico.nombre_usuario as tecnico_nombre',
                'usuarios_cliente.nombre_usuario as cliente_nombre',
                'subcategorias.nombre_subcategoria as subcategoria_nombre',
                'categorias.nombre_categoria as categoria_nombre' // Agregamos la columna de nombre de categoría
            )
            ->leftJoin('tbl_usuarios as usuarios_tecnico', 'tbl_incidencias.id_tecnico', '=', 'usuarios_tecnico.id')
            ->leftJoin('tbl_usuarios as usuarios_cliente', 'tbl_incidencias.id_cliente', '=', 'usuarios_cliente.id')
            ->leftJoin('tbl_subcategorias as subcategorias', 'tbl_incidencias.id_subcategoria', '=', 'subcategorias.id')
            ->leftJoin('tbl_categorias as categorias', 'subcategorias.id_categoria', '=', 'categorias.id'); // Unimos la tabla de subcategorías con la de categorías
    
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

        // Aplicar filtro por categoría si se proporciona
        if ($categoria !== null) {
            $query->where('categorias.nombre_categoria', $categoria);
        }
    
        return $query->get();
    }
}
