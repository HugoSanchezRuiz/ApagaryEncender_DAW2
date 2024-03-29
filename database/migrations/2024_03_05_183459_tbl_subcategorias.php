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
        Schema::create('tbl_subcategorias', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_categoria');
            $table->unsignedBigInteger('id_categoria');
            $table->timestamps();

            /* FK */
            $table->foreign('id_categoria')->references('id')->on('tbl_categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_subcategorias');
    }
};
