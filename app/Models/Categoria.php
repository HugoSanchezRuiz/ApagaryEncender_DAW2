<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'tbl_categorias';
    protected $fillable = ['nombre_categoria'];

    public static function obtenerSubcategoriasPorCategoria($categoriaId)
    {
        // Obtener las subcategorías vinculadas a una categoría específica
        return Subcategoria::where('id', $categoriaId)->get();
    }
}
