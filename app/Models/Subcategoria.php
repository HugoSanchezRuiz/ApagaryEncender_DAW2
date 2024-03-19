<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table = 'tbl_subcategorias';

    protected $fillable = [
        'nombre_subcategoria',
        'id_categoria',
    ];

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    // Otros métodos y propiedades si son necesarios
}
