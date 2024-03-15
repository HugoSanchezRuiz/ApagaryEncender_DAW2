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
                'id_supervisor' => 2, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'hugo',
                'email' => 'hugo@gmail.com',
                'pass' => 'asdASD123',
                'rol' => 'Gestor',
                'id_sede' => 2,
                'id_supervisor' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'David',
                'email' => 'david@gmail.com',
                'pass' => 'asdASD123',
                'rol' => 'Técnico',
                'id_sede' => 1,
                'id_supervisor' => 1, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Administrador',
                'email' => 'admin@gmail.com',
                'pass' => 'asdASD123',
                'rol' => 'Administrador',
                'id_sede' => 1,
                'id_supervisor' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            [
                'nombre_usuario' => 'Luis',
                'email' => 'luis@gmail.com',
                'pass' => 'qweQWE123',
                'rol' => 'Cliente',
                'id_sede' => 3,
                'id_supervisor' => 2, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Maria',
                'email' => 'maria@gmail.com',
                'pass' => 'zxcZXC123',
                'rol' => 'Gestor',
                'id_sede' => 4,
                'id_supervisor' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Ana',
                'email' => 'ana@gmail.com',
                'pass' => 'rtyRTY123',
                'rol' => 'Técnico',
                'id_sede' => 3,
                'id_supervisor' => 1, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Pedro',
                'email' => 'pedro@gmail.com',
                'pass' => 'fghFGH123',
                'rol' => 'Administrador',
                'id_sede' => 5,
                'id_supervisor' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Laura',
                'email' => 'laura@gmail.com',
                'pass' => 'vbnVBN123',
                'rol' => 'Cliente',
                'id_sede' => 2,
                'id_supervisor' => 2, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Pablo',
                'email' => 'pablo@gmail.com',
                'pass' => 'uioUIO123',
                'rol' => 'Cliente',
                'id_sede' => 6,
                'id_supervisor' => 1, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Sara',
                'email' => 'sara@gmail.com',
                'pass' => 'mnbMNB123',
                'rol' => 'Gestor',
                'id_sede' => 2,
                'id_supervisor' => 3, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Marcos',
                'email' => 'marcos@gmail.com',
                'pass' => 'poiPOI123',
                'rol' => 'Técnico',
                'id_sede' => 4,
                'id_supervisor' => 2, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Elena',
                'email' => 'elena@gmail.com',
                'pass' => 'lkjLKJ123',
                'rol' => 'Cliente',
                'id_sede' => 3,
                'id_supervisor' => 3, 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'nombre_usuario' => 'Roberto',
                'email' => 'roberto@gmail.com',
                'pass' => 'wxcWXC123',
                'rol' => 'Administrador',
                'id_sede' => 1,
                'id_supervisor' => 4, 
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
