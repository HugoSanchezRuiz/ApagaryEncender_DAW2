<?php
namespace Database\Factories;

use App\Models\Usuario;
use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nombre_usuario' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'pass' => bcrypt('password'),
            'rol' => $this->faker->randomElement(['Administrador', 'Cliente', 'Gestor', 'Técnico']),
            'id_sede' => Sede::factory(),
            'id_supervisor' => null, // Puedes ajustar esto según tus necesidades
        ];
    }
}