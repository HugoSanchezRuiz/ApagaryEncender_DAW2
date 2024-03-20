<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class tbl_incidencias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table("tbl_incidencias")->insert([
            [
                'id_tecnico' => 4,
                'id_cliente' => 1,
                'id_subcategoria' => 1,
                'imagen' => 'Imagen',
                'descripcion' => 'Problema con el Active Directory',
                'estado' => 'Asignada',
                'created_at' => $this->generateDateTime($now, rand(1, 5)),
                'updated_at' => $this->generateDateTime($now->addDays(rand(1, 4)), rand(1, 5)),
            ],

            [
                'id_tecnico' => null,
                'id_cliente' => 2,
                'id_subcategoria' => 2,
                'imagen' => 'Imagen',
                'descripcion' => 'Problema con el acceso remoto',
                'estado' => 'Sin asignar',
                'created_at' => $this->generateDateTime($now, rand(1, 5)),
                'updated_at' => null,
            ],

            [
                'id_tecnico' => 5,
                'id_cliente' => 3,
                'id_subcategoria' => 3,
                'imagen' => 'Imagen',
                'descripcion' => 'No se me escucha en la videoconferencia',
                'estado' => 'En proceso',
                'created_at' => $this->generateDateTime($now, rand(1, 5)),
                'updated_at' => $this->generateDateTime($now->addDays(rand(1, 4)), rand(1, 5)),
            ],

            [
                'id_tecnico' => 6,
                'id_cliente' => 1,
                'id_subcategoria' => 4,
                'imagen' => 'Imagen',
                'descripcion' => 'El proyector funciona pero la imagen se ve borrosa',
                'estado' => 'Resuelta',
                'created_at' => $this->generateDateTime($now, rand(1, 5)),
                'updated_at' => $this->generateDateTime($now->addDays(rand(1, 4)), rand(1, 5)),
            ],

            [
                'id_tecnico' => 4,
                'id_cliente' => 2,
                'id_subcategoria' => 5,
                'imagen' => 'Imagen',
                'descripcion' => 'El teclado del aula 301 no funciona',
                'estado' => 'Resuelta',
                'created_at' => $this->generateDateTime($now, rand(1, 5)),
                'updated_at' => $this->generateDateTime($now->addDays(rand(1, 4)), rand(1, 5)),
            ],

            [
                'id_tecnico' => null,
                'id_cliente' => 3,
                'id_subcategoria' => 6,
                'imagen' => 'Imagen',
                'descripcion' => 'El ratón del aula 301 no funciona',
                'estado' => 'Sin asignar',
                'created_at' => $this->generateDateTime($now, rand(1, 5)),
                'updated_at' => null,
            ],

            [
                'id_tecnico' => 5,
                'id_cliente' => 1,
                'id_subcategoria' => 7,
                'imagen' => 'Imagen',
                'descripcion' => 'El monitor del aula 301 no se enciende',
                'estado' => 'Cerrada',
                'created_at' => $this->generateDateTime($now, rand(1, 5)),
                'updated_at' => $this->generateDateTime($now->addDays(rand(1, 4)), rand(1, 5)),
            ],

            [
                'id_tecnico' => 5,
                'id_cliente' => 2,
                'id_subcategoria' => 8,
                'imagen' => 'Imagen',
                'descripcion' => 'El proyector del aula 301 no funciona aún estando conectado',
                'estado' => 'Cerrada',
                'created_at' => $this->generateDateTime($now, rand(1, 5)),
                'updated_at' => $this->generateDateTime($now->addDays(rand(1, 4)), rand(1, 5)),
            ],
        ]);
    }

    private function generateDateTime($now, $daysAgo): string
    {
        $created_at = $now->subDays($daysAgo)->setTime(rand(8, 16), rand(0, 59), rand(0, 59));
        $updated_at = $created_at->copy()->addMinutes(rand(60, 480)); // Añade entre 1 y 8 horas
        return $created_at->format('Y-m-d H:i:s');
    }
}
