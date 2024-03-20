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

    public function index()
    {
        $userId = 1;
    
        // Obtener todas las incidencias para el usuario
        $incidencias = Incidencia::where('id_cliente', $userId)->get();
    
        // Obtener todas las categorías y subcategorías
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
    
        // Pasar los datos a la vista
        return view('index', [
            'incidencias' => $incidencias,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'userId' => $userId,
        ]);
    }

    public function show($id)
    {
        $incident = Incidencia::find($id);

        // // Verifica si el usuario tiene acceso a esta incidencia
        // if ($incident->id_cliente !== 1) {
        //     abort(403, 'No tienes permiso para ver esta incidencia.');
        // }

        // Obtener el nombre del cliente
        $tecnico = Usuario::findOrFail($incident->id_tecnico);
        $cliente = Usuario::findOrFail($incident->id_cliente);
        $categoria = Categoria::findOrFail($incident->subcategoria->id_categoria);
        $subcategoria = Subcategoria::findOrFail($incident->id_subcategoria);

        return view('show', compact('incident', 'categoria', 'subcategoria', 'cliente', 'tecnico'));
    }

    public function getCargarIncidencias()
    {
        $userId = 1;
        $incidencias = Incidencia::where('id_cliente', $userId)->get();
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();

        return response()->json([
            'incidents' => $incidencias,
            'categorias' => $categorias,
            'subcategories' => $subcategorias
        ]);
    }

    public function getFiltrarIncidencias(Request $request)
    {
        $estado = $request->input('filtro_estado');
    
        // Verifica si se seleccionó la opción "todos"
        if ($estado == 'todos') {
            // Obtener todas las incidencias del usuario
            $userId = 1; // Ajusta esto según la lógica de tu aplicación
            $incidencias = Incidencia::where('id_cliente', $userId)->get();
        } else {
            // Obtener las incidencias según el estado seleccionado
            $incidencias = Incidencia::where('estado', $estado)->get();
        }
    
        // Verifica si la colección de incidencias está vacía
        if ($incidencias->isEmpty()) {
            return response()->json(['message' => 'No hay incidencias con ese estado']);
        }
    
        return response()->json(['incidents' => $incidencias]);
    }
    

    public function getOrdenarIncidencias(Request $request)
    {
        $orden = $request->input('orden');
        $incidencias = Incidencia::orderBy('estado', $orden)->get();
        return response()->json(['incidents' => $incidencias]);
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

            // return redirect()->route('index')->with('success', 'Incidencia creada correctamente');

            // Devuelve una respuesta de éxito
            return response()->json(['message' => 'Incidencia creada correctamente'], 200);
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollback();

            // Imprimir el mensaje de error para depuración
            dd($e->getMessage());

            // Devuelve una respuesta de error
            return response()->json(['error' => 'Error al crear la incidencia'], 500);
        }
    }

    public function getSubcategorias($categoria_id)
    {
        // Obtener las subcategorías asociadas a la categoría seleccionada
        $subcategorias = Subcategoria::where('id_categoria', $categoria_id)->get();

        // Devolver las subcategorías como una respuesta JSON
        return response()->json(['subcategorias' => $subcategorias]);
    }
}
