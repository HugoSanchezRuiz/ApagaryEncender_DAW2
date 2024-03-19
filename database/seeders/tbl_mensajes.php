<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tbl_mensajes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table("tbl_mensajes")->insert([
            [
                'id_incidencia' => 1,
                'id_emisor' => 1, 
                'id_receptor' => 2, 
                'mensaje' => 'Ayuda', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_incidencia' => 2,
                'id_emisor' => 2, 
                'id_receptor' => 3, 
                'mensaje' => 'Ayuda', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_incidencia' => 3,
                'id_emisor' => 3, 
                'id_receptor' => 1, 
                'mensaje' => 'Ayuda', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_incidencia' => 4,
                'id_emisor' => 1, 
                'id_receptor' => 3, 
                'mensaje' => 'Ayuda', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_incidencia' => 5,
                'id_emisor' => 2, 
                'id_receptor' => 1, 
                'mensaje' => 'Ayuda', 
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id_incidencia' => 6,
                'id_emisor' => 3, 
                'id_receptor' => 2, 
                'mensaje' => 'Ayuda', 
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}