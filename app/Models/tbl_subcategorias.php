<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $table = 'tbl_subcategorias';

    protected $fillable = [
        'nombre_subcategoria',
        'id_categoria',
    ];

    // Aquí podrías definir relaciones con otros modelos si es necesario
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
