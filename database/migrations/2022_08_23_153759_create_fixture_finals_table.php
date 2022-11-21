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
        Schema::create('fixture_finals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campeonato_id')->nullable();
            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete("cascade");
            $table->unsignedBigInteger('partido_id')->nullable();
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete("cascade");
            $table->unsignedBigInteger('posicion_id')->nullable();
            $table->foreign('posicion_id')->references('id')->on('tabla_posicions')->onDelete("cascade");
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->foreign('equipo_id')->references('id')->on('equipo_clubs')->onDelete("cascade");
            $table->string('walkover'); // 1 = walkover, 0 =  no walkober
            $table->string('puntos'); // total puntos
            $table->string('Pj'); //total ganados
            $table->string('Pp'); //total perdidos
            $table->string('Pe'); //total emparados
            $table->string('Gf'); //total goles a favor
            $table->string('Gc'); //total goles en contra
            $table->string('GD'); //goles gf - gc
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
        Schema::dropIfExists('fixture_finals');
    }
};
