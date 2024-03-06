<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mensaje;

class MensajeSeeder extends Seeder
{
    public function run()
    {
        Mensaje::factory(200)->create(); // Ajusta el número según tus necesidades
    }
}