<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_sedes extends Model
{
    use HasFactory;

    protected $table = 'tbl_sedes';

    protected $fillable = [
        'nombre_sede',
    ];
}