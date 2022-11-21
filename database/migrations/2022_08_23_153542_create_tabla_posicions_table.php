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
        Schema::create('tabla_posicions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campeonato_id')->nullable();
            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete("cascade");

            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->foreign('equipo_id')->references('id')->on('equipo_clubs')->onDelete("cascade");
            $table->string('walkover')->nullable(); // 1 = walkover, 0 =  no walkober
            $table->integer('puntos')->nullable(); // total puntos
            $table->string('Pj')->nullable(); //total jugados
            $table->string('Pg')->nullable(); //total ganados
            $table->string('Pp')->nullable(); //total perdidos
            $table->string('Pe')->nullable(); //total emparados
            $table->string('Gf')->nullable(); //total goles a favor
            $table->string('Gc')->nullable(); //total goles en contra
            $table->string('GD')->nullable(); //goles gf - gc
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
        Schema::dropIfExists('tabla_posicions');
    }
};
