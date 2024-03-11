<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sede;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Incidencia;
use App\Models\Mensaje;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Sede::factory()->count(5)->create();
        Usuario::factory()->count(10)->create();
        Categoria::factory()->count(5)->create();
        Subcategoria::factory()->count(10)->create();
        Incidencia::factory()->count(20)->create();
        Mensaje::factory()->count(30)->create();
      
    }
}