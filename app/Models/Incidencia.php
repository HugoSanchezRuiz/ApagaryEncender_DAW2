<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Incidencia extends Model
{
    use HasFactory;
    protected $table = 'tbl_incidencias';
    protected $fillable = ['id_tecnico', 'id_cliente', 'id_subcategoria', 'estado'];

    public function tecnico()
    {
        return $this->belongsTo(Usuario::class, 'id_tecnico');
    }

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'id_cliente');
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'id_subcategoria');
    }

    public static function obtenerEstadosDisponibles()
    {
        // Realizar una consulta para obtener los estados únicos de las incidencias
        $estados = DB::table('tbl_incidencias')->select('estado')->distinct()->get();

        // Crear un array para almacenar los nombres de los estados
        $estadosDisponibles = [];

        // Iterar sobre los resultados y almacenar los nombres de los estados en el array
        foreach ($estados as $estado) {
            $estadosDisponibles[] = $estado->estado;
        }

        return $estadosDisponibles;
    }
}
