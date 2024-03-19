<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_categorias extends Model
{
    use HasFactory;

    protected $table = 'tbl_categorias';

    protected $fillable = [
        'nombre_categoria',
    ];

    // Aquí podrías definir relaciones con otros modelos si es necesario
}