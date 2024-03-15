<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Categoria;

class TecnicoController extends Controller
{
    public function iniciar($id)
    {
        $incident = Incidencia::findOrFail($id);

        // Verifica si el usuario es un técnico asignado a esta incidencia
        if (!$incident->tecnico || $incident->tecnico->id !== auth()->id()) {
            abort(403, 'No tienes permiso para realizar esta acción en esta incidencia.');
        }

        // Marcar la incidencia como "En progreso"
        $incident->estado = 'En progreso';
        $incident->save();

        return redirect()->back()->with('success', 'Has comenzado a trabajar en esta incidencia.');
    }

    public function resolver($id)
    {
        $incident = Incidencia::findOrFail($id);

        // Verifica si el usuario es un técnico asignado a esta incidencia
        if (!$incident->tecnico || $incident->tecnico->id !== auth()->id()) {
            abort(403, 'No tienes permiso para realizar esta acción en esta incidencia.');
        }

        // Marcar la incidencia como "Resuelta"
        $incident->estado = 'Resuelta';
        $incident->save();

        return redirect()->back()->with('success', 'Has marcado esta incidencia como resuelta.');
    }

    public function index()
{
    $id = 7; // ID del técnico
    $incidentsAssigned = Incidencia::where('id_tecnico', $id)->orderBy('created_at', 'desc')->get();

    // Obtener todas las categorías disponibles
    $categorias = Categoria::all();
    // No puedes obtener las subcategorías aquí sin saber cuál categoría ha sido seleccionada
    $subcategorias = [];

    return view('tecnic.index', compact('incidentsAssigned', 'categorias', 'subcategorias'));
}
}
