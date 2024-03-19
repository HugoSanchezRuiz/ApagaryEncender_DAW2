<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'tbl_incidencias';

    protected $fillable = [
        'id_tecnico',
        'id_cliente',
        'id_subcategoria',
        'imagen',
        'descripcion',
        'estado',
    ];

    // Relación con el técnico
    public function tecnico()
    {
        return $this->belongsTo(tbl_usuarios::class, 'id_tecnico');
    }

    // Relación con el cliente
    public function cliente()
    {
        return $this->belongsTo(tbl_usuarios::class, 'id_cliente');
    }

    // Relación con la subcategoría
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'id_subcategoria');
    }

    // Otros métodos y propiedades si son necesarios
}
