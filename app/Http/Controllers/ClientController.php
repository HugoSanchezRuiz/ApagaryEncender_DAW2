<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class ClientController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $incidents = Incidencia::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

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
}
