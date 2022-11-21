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
        Schema::create('generar_sancions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('campeonato_id')->nullable();
            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete("cascade");

            $table->unsignedBigInteger('partido_id')->nullable();
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete("cascade");

            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->foreign('equipo_id')->references('id')->on('equipo_clubs')->onDelete("cascade");

            $table->unsignedBigInteger('jugador_id')->nullable();
            $table->foreign('jugador_id')->references('id')->on('jugadors')->onDelete("cascade");

            $table->unsignedBigInteger('sancion_id')->nullable();
            $table->foreign('sancion_id')->references('id')->on('sancions')->onDelete("cascade");

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
        Schema::dropIfExists('generar_sancions');
    }
};
