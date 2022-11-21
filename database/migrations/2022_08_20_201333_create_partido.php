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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campeonato_id')->nullable();
            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete("cascade");
            $table->unsignedBigInteger('equipoA_id')->nullable();
            $table->foreign('equipoA_id')->references('id')->on('equipo_clubs')->onDelete("cascade");
            $table->unsignedBigInteger('equipoB_id')->nullable();
            $table->foreign('equipoB_id')->references('id')->on('equipo_clubs')->onDelete("cascade");
            $table->integer('gol_equipoA')->nullable();
            $table->integer('gol_equipoB')->nullable();
            $table->date('fecha_Par')->nullable();
            $table->string('hora')->nullable();
            $table->integer('walkover')->nullable();
            $table->string('detalle')->nullable();
            $table->string('estado')->nullable(); // 0 pendiente, 1 terminado
            $table->string('tipo')->nullable();// 0 final, 1 clasificatoria, 2 semifinal, 3 cuartos
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
        Schema::dropIfExists('partido');
    }
};
