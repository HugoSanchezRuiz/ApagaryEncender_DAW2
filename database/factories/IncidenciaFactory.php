<?php
namespace Database\Factories;

use App\Models\Incidencia;
use App\Models\Usuario;
use App\Models\Subcategoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidenciaFactory extends Factory
{
    protected $model = Incidencia::class;

    public function definition()
    {
        return [
            'id_tecnico' => Usuario::factory(),
            'id_cliente' => Usuario::factory(),
            'id_subcategoria' => Subcategoria::factory(),
            'estado' => $this->faker->randomElement(['Sin asignar', 'Asignada', 'En proceso', 'Resuelta', 'Cerrada']),
        ];
    }
}