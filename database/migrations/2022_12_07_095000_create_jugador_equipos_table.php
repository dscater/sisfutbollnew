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
        Schema::create('jugador_equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("jugador_id");
            $table->string("equipo", 255);
            $table->integer("anio");
            $table->string("descripcion", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugador_equipos');
    }
};
