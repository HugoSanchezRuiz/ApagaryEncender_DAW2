<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_usuario');
            $table->string('email')->unique();
            $table->string('pass');
            $table->enum('rol', ['Administrador', 'Cliente', 'Gestor', 'Técnico']);
            $table->boolean('supervisor')->default(false); 
            $table->unsignedBigInteger('id_sede');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_sede')->references('id')->on('tbl_sedes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
