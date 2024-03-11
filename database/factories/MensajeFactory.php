<?php
namespace Database\Factories;

use App\Models\Mensaje;
use App\Models\Incidencia;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class MensajeFactory extends Factory
{
    protected $model = Mensaje::class;

    public function definition()
    {
        return [
            'id_incidencia' => Incidencia::factory(),
            'id_emisor' => Usuario::factory(),
            'id_receptor' => Usuario::factory(),
            'mensaje' => $this->faker->text,
        ];
    }
}