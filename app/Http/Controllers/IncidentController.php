<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Categoria;
use App\Models\Subcategoria;

class IncidentController extends Controller
{
    public function index()
    {
        $userId = 12; // ID del usuario
        $incidents = Incidencia::where('id_cliente', $userId)->orderBy('created_at', 'desc')->get();

        $categorias = Categoria::all();
        // No puedes obtener las subcategorías aquí sin saber cuál categoría ha sido seleccionada
        $subcategorias = [];

        return view('client.incident.index', compact('incidents', 'categorias', 'subcategorias'));
    }

    // public function obtenerSubcategorias($categoriaId)
    // {
    //     // Obtener las subcategorías asociadas a la categoría seleccionada
    //     $subcategorias = Subcategoria::where('id_categoria', $categoriaId)->get();

    //     // Devolver las subcategorías en formato JSON
    //     return response()->json($subcategorias);
    // }


    public function show($id)
    {
        $incident = Incidencia::findOrFail($id);

        // Verifica si el usuario tiene acceso a esta incidencia
        if ($incident->id_cliente !== 12) {
            abort(403, 'No tienes permiso para ver esta incidencia.');
        }

        $categoria = Categoria::findOrFail($incident->subcategoria->id_categoria);
        $subcategoria = Subcategoria::findOrFail($incident->id_subcategoria);

        return view('client.incident.show', compact('incident', 'categoria', 'subcategoria'));
    }



    public function create()
    {
        return view('client.incident.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $user = auth()->user();

        $incident = new Incidencia([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'estado' => 'Sin asignar',
            'user_id' => $user->id,
        ]);

        $incident->save();

        return redirect()->route('client.incidents')->with('success', 'Incidencia creada correctamente.');
    }
}
