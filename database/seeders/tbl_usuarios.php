<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_usuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table("tbl_usuarios")->insert([
            [
                'nombre_usuario' => 'Iker',
                'email' => 'iker@gmail.com',
                'pass' => 'asdASD123',
                'rol' => 'Cliente',
                'id_sede' => 1,
                'id_supervisor' => null, // Cambiado a null para dejarlo vacío
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'hugo',
                'email' => 'hugo@gmail.com',
                'pass' => 'asdASD123',
                'rol' => 'Gestor',
                'id_sede' => 2,
                'id_supervisor' => null, // Cambiado a null para dejarlo vacío
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'David',
                'email' => 'david@gmail.com',
                'pass' => 'asdASD123',
                'rol' => 'Técnico',
                'id_sede' => 3,
                'id_supervisor' => null, // Cambiado a null para dejarlo vacío
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Administrador',
                'email' => 'admin@gmail.com',
                'pass' => 'asdASD123',
                'rol' => 'Administrador',
                'id_sede' => 1,
                'id_supervisor' => null, // Cambiado a null para dejarlo vacío
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
