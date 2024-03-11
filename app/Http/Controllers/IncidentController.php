<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incidencia::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('client.incidents.index', compact('incidents'));
    }

    public function show($id)
    {
        $incident = Incidencia::findOrFail($id);

        // Verifica si el usuario tiene acceso a esta incidencia
        if ($incident->user_id !== auth()->user()->id) {
            abort(403, 'No tienes permiso para ver esta incidencia.');
        }

        return view('client.incidents.show', compact('incident'));
    }

    public function create()
    {
        return view('client.incidents.create');
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
            'status' => 'Sin asignar', // Estado predeterminado al crear una nueva incidencia
            'user_id' => $user->id,
        ]);

        $incident->save();

        return redirect()->route('client.incidents')->with('success', 'Incidencia creada correctamente.');
    }
}
