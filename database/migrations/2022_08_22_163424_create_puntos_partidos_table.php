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
        Schema::create('puntos_partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campeonato_id')->nullable();
            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete("cascade");
            $table->unsignedBigInteger('partido_id')->nullable();
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete("cascade");

            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->foreign('equipo_id')->references('id')->on('equipo_clubs')->onDelete("cascade");
            $table->string('walkover'); // 1 = walkover, 0 =  no walkober
            $table->string('Pj')->nullable();
            $table->string('Pg')->nullable(); //1 = ganado, 0 = perdido
            $table->string('Pp')->nullable(); //1 = perdido, 0 = ganado
            $table->string('Pe')->nullable(); //1 = empate, 0 = no empate
            $table->string('Gf')->nullable(); // goles a favor
            $table->string('Gc')->nullable(); //goles en contra
            $table->string('Gd')->nullable(); //goles diferencia
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
        Schema::dropIfExists('puntos_partidos');
    }
};
