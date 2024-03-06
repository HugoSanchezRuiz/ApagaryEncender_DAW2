<?php
namespace Database\Factories;

use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\Factory;

class SedeFactory extends Factory
{
    protected $model = Sede::class;

    public function definition()
    {
        return [
            'nombre_sede' => $this->faker->unique()->word,
        ];
    }
}