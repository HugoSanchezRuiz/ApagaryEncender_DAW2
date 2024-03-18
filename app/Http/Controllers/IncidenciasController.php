<?php

namespace App\Http\Controllers;
use App\Models\tbl_incidencias;


use Illuminate\Http\Request;

class IncidenciasController extends Controller
{
    public function index()
    {
        $incidencias = tbl_incidencias::all();
        return view('vistas.admin', compact('incidencias'));
    }

    public function filtroNombre(Request $request)
    {
        $incidencias = tbl_incidencias::where('incidencia', 'like', '%'.$request->search.'%')->get();
        return view('tables.incidencias', compact('incidencias'));
    }

}
