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
        Schema::create('tbl_mensajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_incidencia');
            $table->unsignedBigInteger('id_emisor');
            $table->unsignedBigInteger('id_receptor');
            $table->text('mensaje');
            $table->timestamps();

            /* FK */
            $table->foreign('id_incidencia')->references('id')->on('tbl_incidencias')->onDelete('cascade');
            $table->foreign('id_emisor')->references('id')->on('tbl_usuarios')->onDelete('cascade');
            $table->foreign('id_receptor')->references('id')->on('tbl_usuarios')->onDelete('cascade');
        });
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mensajes');
    }
};