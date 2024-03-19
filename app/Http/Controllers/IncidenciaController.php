<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Categoria;
use App\Models\tbl_usuarios;
use Illuminate\Http\Request;
use App\Models\Subcategoria;

class IncidenciaController extends Controller
{
    public function mostrarIncidenciesNoAssignades()
    {
        $incidenciesNoAssignades = Incidencia::where('estado', 'Sin asignar')->get();
        $tecnic = tbl_usuarios::where('rol', '=', 'Gestor')->get();
        $categorias = Categoria::all();
        
        return view('incidencies.no-assignades', compact('incidenciesNoAssignades', 'tecnic', 'categorias'));
    }

    public function assignarIncidencia(Request $request)
    {
        $request->validate([
            'idIncidencia' => 'required|exists:tbl_incidencias,id',
            'idTecnic' => 'required|exists:tbl_usuarios,id',
        ]);
    
        $incidencia = Incidencia::find($request->idIncidencia);
        $incidencia->id_tecnico = $request->idTecnic;
        $incidencia->estado = 'Asignada';
        $incidencia->save();
    
        // Redirige a la misma página
        return back()->with('success', 'Incidencia asignada correctamente');
    }
    
    public function filtrarPorCategoria(Request $request)
    {
        $categoria = $request->input('categoria');
        
        if ($categoria === 'Todas') {
            $incidenciesNoAssignades = Incidencia::where('estado', 'Sin asignar')->get();
        } else {
            $incidenciesNoAssignades = Incidencia::whereHas('subcategoria', function ($query) use ($categoria) {
                $query->where('id_categoria', $categoria);
            })->where('estado', 'Sin asignar')->get();
        }
        
        return response()->json($incidenciesNoAssignades);
    }
}
