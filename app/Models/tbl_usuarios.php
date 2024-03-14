<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tbl_usuarios';

    protected $fillable = [
        'nombre_usuario',
        'email',
        'pass',
        'rol',
        'id_sede',
        'id_supervisor',
    ];

    // Definir relaciones con otros modelos si es necesario
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function supervisor()
    {
        return $this->belongsTo(Usuario::class, 'id_supervisor');
    }
}
