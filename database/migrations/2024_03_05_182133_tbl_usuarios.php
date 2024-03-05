<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_usuario');
            $table->string('email')->unique();
            $table->string('pass');
            $table->enum('rol', ['Administrador', 'Cliente', 'Gestor', 'Técnico']);
            $table->unsignedBigInteger('id_sede');
            $table->bigInteger('id_supervisor')->unsigned()->nullable();
        
            $table->timestamps();
        
            /* Claves foráneas */
            $table->foreign('id_sede')->references('id')->on('tbl_sedes')->onDelete('cascade');
            $table->foreign('id_supervisor')->references('id')->on('tbl_usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
