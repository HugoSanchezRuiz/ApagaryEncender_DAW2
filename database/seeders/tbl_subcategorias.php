<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_subcategorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table("tbl_subcategorias")->insert([
            [
                'nombre_subcategoria' => 'Aplicación gestión administrativa',
                'id_categoria' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_subcategoria' => 'Acceso remoto',
                'id_categoria' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_subcategoria' => 'Aplicación de videoconferencia',
                'id_categoria' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_subcategoria' => 'Imagen de proyector defectuosa',
                'id_categoria' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_subcategoria' => 'Problema con el teclado',
                'id_categoria' => '2',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_subcategoria' => 'El ratón no funciona',
                'id_categoria' => '2',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_subcategoria' => 'Monitor no se enciende',
                'id_categoria' => '2',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_subcategoria' => 'Imagen de proyector defectuosa',
                'id_categoria' => '2',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}