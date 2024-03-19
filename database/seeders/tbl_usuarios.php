<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_usuarios extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table("tbl_usuarios")->insert([
            [
                'nombre_usuario' => 'Iker',
                'email' => 'iker@gmail.com',
                'pass' => 'asdASD123',
                'supervisor' => false,
                'rol' => 'Cliente',
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'David',
                'email' => 'david@gmail.com',
                'pass' => 'asdASD123',
                'supervisor' => true,
                'rol' => 'Cliente',
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'Hugo',
                'email' => 'hugo@gmail.com',
                'pass' => 'asdASD123',
                'supervisor' => false,
                'rol' => 'Cliente',
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'Cristina',
                'email' => 'cristina@gmail.com',
                'pass' => 'pass123',
                'supervisor' => true,
                'rol' => 'Técnico',
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'Laura',
                'email' => 'laura@gmail.com',
                'pass' => 'pass123',
                'supervisor' => false,
                'rol' => 'Técnico',
                'id_sede' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'Carlos',
                'email' => 'carlos@gmail.com',
                'pass' => 'pass123',
                'supervisor' => false,
                'rol' => 'Técnico',
                'id_sede' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'Marta',
                'email' => 'marta@gmail.com',
                'pass' => 'pass123',
                'supervisor' => true,
                'rol' => 'Gestor',
                'id_sede' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'Antonio',
                'email' => 'antonio@gmail.com',
                'pass' => 'pass123',
                'supervisor' => false,
                'rol' => 'Gestor',
                'id_sede' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'Pablo',
                'email' => 'pablo@gmail.com',
                'pass' => 'pass123',
                'supervisor' => false,
                'rol' => 'Gestor',
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_usuario' => 'Administrador',
                'email' => 'admin@gmail.com',
                'pass' => 'pass123',
                'supervisor' => false,
                'rol' => 'Administrador',
                'id_sede' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}