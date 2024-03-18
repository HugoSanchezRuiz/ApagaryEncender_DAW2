<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_usuarios extends Model
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
        return $this->belongsTo(tbl_sedes::class, 'id_sede');
    }

    public function supervisor()
    {
        return $this->belongsTo(tbl_usuarios::class, 'id_supervisor');
    }
}
