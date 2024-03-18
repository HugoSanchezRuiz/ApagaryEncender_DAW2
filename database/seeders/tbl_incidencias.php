<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_incidencias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_tecnico' => null,
                'id_cliente' => 2, 
                'id_subcategoria' => 2, 
                'imagen' => 'Imagen', 
                'descripcion' => 'Problema con el acceso remoto', 
                'estado' => 'Sin asignar', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_tecnico' => 5,
                'id_cliente' => 3, 
                'id_subcategoria' => 3, 
                'imagen' => 'Imagen', 
                'descripcion' => 'No se me escucha en la videoconferencia', 
                'estado' => 'En proceso', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_tecnico' => 6,
                'id_cliente' => 1, 
                'id_subcategoria' => 4, 
                'imagen' => 'Imagen', 
                'descripcion' => 'El proyector funciona pero la imagen se ve borrosa', 
                'estado' => 'Resuelta', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_tecnico' => 4,
                'id_cliente' => 2, 
                'id_subcategoria' => 5, 
                'imagen' => 'Imagen', 
                'descripcion' => 'El teclado del aula 301 no funciona', 
                'estado' => 'Resuelta', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_tecnico' => null,
                'id_cliente' => 3, 
                'id_subcategoria' => 6, 
                'imagen' => 'Imagen', 
                'descripcion' => 'El ratón del aula 301 no funciona', 
                'estado' => 'Sin asignar', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_tecnico' => 5,
                'id_cliente' => 1, 
                'id_subcategoria' => 7, 
                'imagen' => 'Imagen', 
                'descripcion' => 'El monitor del aula 301 no se enciende', 
                'estado' => 'Cerrada', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_tecnico' => 5,
                'id_cliente' => 2, 
                'id_subcategoria' => 8, 
                'imagen' => 'Imagen', 
                'descripcion' => 'El proyector del aula 301 no funciona aún estando conectado', 
                'estado' => 'Cerrada', 
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
