<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    protected $table = 'tbl_mensajes';
    protected $fillable = ['id_incidencia', 'id_emisor', 'id_receptor', 'mensaje'];

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class, 'id_incidencia');
    }

    public function emisor()
    {
        return $this->belongsTo(Usuario::class, 'id_emisor');
    }

    public function receptor()
    {
        return $this->belongsTo(Usuario::class, 'id_receptor');
    }
}