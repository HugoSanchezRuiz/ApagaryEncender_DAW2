<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ejecutar los seeders para cada tabla
        $this->call([
            tbl_sedes::class,
            tbl_usuarios::class,
            tbl_categorias::class,
            tbl_subcategorias::class,
            tbl_incidencias::class,
            tbl_mensajes::class,
        ]);
    }
}
