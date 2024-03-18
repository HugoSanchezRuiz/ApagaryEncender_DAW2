<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $userId = 1; // Reemplaza esto con el ID del usuario actual
        $query = Incidencia::where('id_cliente', $userId);
        $estados = Incidencia::obtenerEstadosDisponibles();
        $order = $request->input('orden');

        // Verificar si se ha seleccionado un estado en el formulario
        if ($request->filled('filtro_estado')) {
            $filtro_estado = $request->input('filtro_estado');
            $query->where('estado', $filtro_estado);
        }

        // Aplicar el orden seleccionado
        if ($order === 'asc') {
            $query->orderBy('id', 'asc');
        } elseif ($order === 'desc') {
            $query->orderBy('id', 'desc');
        }

        // Obtener las incidencias
        $incidents = $query->get();

        // Recuperar las categorías y subcategorías independientemente de si se ha aplicado un filtro de estado
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();

        return view('client.incident.index', compact('incidents', 'categorias', 'subcategorias', 'estados', 'userId'));
    }


    public function show($id)
    {
        $incident = Incidencia::findOrFail($id);

        // Verifica si el usuario tiene acceso a esta incidencia
        if ($incident->id_cliente !== 1) {
            abort(403, 'No tienes permiso para ver esta incidencia.');
        }

        // Obtener el nombre del cliente
        $tecnico = Usuario::findOrFail($incident->id_tecnico);
        $cliente = Usuario::findOrFail($incident->id_cliente);
        $categoria = Categoria::findOrFail($incident->subcategoria->id_categoria);
        $subcategoria = Subcategoria::findOrFail($incident->id_subcategoria);

        return view('client.incident.show', compact('incident', 'categoria', 'subcategoria', 'cliente', 'tecnico'));
    }

    public function store(Request $request)
    {
        try {
            // Iniciar una transacción
            DB::beginTransaction();

            // Crea una nueva instancia de Incidencia
            $incidencia = new Incidencia();
            $incidencia->descripcion = $request->input('descripcion');
            $incidencia->estado = 'Sin asignar'; // Estado por defecto
            $incidencia->id_cliente = $request->input('id_cliente');
            $incidencia->id_subcategoria = $request->input('subcategoria');

            // Verificar si se proporcionó una imagen
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $imagen->move(public_path('img'), $nombreImagen);
                $incidencia->imagen = $nombreImagen;
            } else {
                // Si no se proporciona una imagen, establecer el campo imagen como vacío
                $incidencia->imagen = '';
            }


            // Guarda la incidencia en la base de datos
            $incidencia->save();

            // Confirmar la transacción
            DB::commit();

            return redirect()->route('client.incident')->with('success', 'Incidencia creada correctamente');

            // Devuelve una respuesta de éxito
            // return response()->json(['message' => 'Incidencia creada correctamente'], 200);
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollback();

            // Imprimir el mensaje de error para depuración
            dd($e->getMessage());

            // Devuelve una respuesta de error
            return response()->json(['error' => 'Error al crear la incidencia'], 500);
        }
    }





    // public function create(Request $request)
    // {
    //     // $request->validate([
    //     //     'title' => 'required|string|max:255',
    //     //     'description' => 'required|string',
    //     // ]);

    //     // // $user = auth()->user();
    //     $descripcion = $request->input('descripcion');
    //     $estado = 'Sin asignar';
    //     $id_cliente = $request->input('id_cliente');
    //     $nombre_subcategoria = $request->input('nombre_subcategoria');


    //     $subcategoria = Subcategoria::where('nombre_subcategoria', $nombre_subcategoria)->first();

    //     // Verificar si se encontró la subcategoría
    //     if ($subcategoria) {
    //         $id_subcategoria = $subcategoria->id;
    //     } else {
    //         echo "error";
    //     }

    //     // Consulta para sacar el id de la subcategoria por su nombre

    //     $incident = new Incidencia();
    //     $incident->descripcion = $descripcion;
    //     $incident->id_cliente = $id_cliente;
    //     $incident->estado = $estado;
    //     $incident->id_subcategoria = $id_subcategoria;


    //     $incident->save();

    //     return redirect()->route('client.incident')->with('success', 'Incidencia creada correctamente.');
    // }
}
