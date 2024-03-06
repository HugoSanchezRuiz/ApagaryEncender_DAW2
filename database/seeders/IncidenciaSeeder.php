<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incidencia;

class IncidenciaSeeder extends Seeder
{
    public function run()
    {
        Incidencia::factory(100)->create(); // Ajusta el número según tus necesidades
    }
}