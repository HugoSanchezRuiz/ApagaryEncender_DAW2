<?php
namespace Database\Factories;

use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoriaFactory extends Factory
{
    protected $model = Subcategoria::class;

    public function definition()
    {
        return [
            'nombre_categoria' => $this->faker->word,
            'id_categoria' => Categoria::factory(),
        ];
    }
}