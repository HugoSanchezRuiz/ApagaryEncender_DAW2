<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}