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
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campeonato_id')->nullable();
            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete("cascade");
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->foreign('equipo_id')->references('id')->on('equipo_clubs')->onDelete("cascade");
            $table->longText('observacion')->nullable();
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
        Schema::dropIfExists('inscripcions');
    }
};
