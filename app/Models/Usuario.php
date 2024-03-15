<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Usuario extends Model
{
    use HasFactory;
    protected $table = 'tbl_usuarios';
    protected $fillable = ['nombre_usuario', 'email', 'pass', 'rol', 'id_sede', 'id_supervisor'];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function supervisor()
    {
        return $this->belongsTo(Usuario::class, 'id_supervisor');
    }
}