<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sede;
use Database\Factories\SedeFactory; // Agrega esta línea

class SedeSeeder extends Seeder
{
    public function run()
    {
        Sede::factory()->count(5)->create(); // Cambia 5 al número de sedes que deseas crear
    }
}