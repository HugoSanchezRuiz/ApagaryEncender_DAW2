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
        Schema::create('tbl_incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tecnico')->nullable();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_subcategoria');
            $table->text('imagen');
            $table->text('descripcion');
            $table->enum('estado', ['Sin asignar', 'Asignada', 'En proceso', 'Resuelta', 'Cerrada'])->default('Sin asignar');
            $table->timestamps();

            /* FK */
            $table->foreign('id_tecnico')->references('id')->on('tbl_usuarios')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('tbl_usuarios')->onDelete('cascade');
            $table->foreign('id_subcategoria')->references('id')->on('tbl_subcategorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_incidencias');
    }
};