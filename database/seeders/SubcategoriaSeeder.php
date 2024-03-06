<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategoria;

class SubcategoriaSeeder extends Seeder
{
    public function run()
    {
        Subcategoria::factory(20)->create(); // Ajusta el número según tus necesidades
    }
}