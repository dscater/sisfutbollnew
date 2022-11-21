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
        Schema::create('equipo_clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->date('fecha_fund');
            $table->string('presidente');
            $table->string('vicepresidente');
            $table->string('color_camiseta');
            $table->string('color_pantalo');
            $table->string('color_medias');
            $table->string('direccion');
            $table->string('celular');
            $table->string('email');
            $table->string('observacion');
            $table->string('estado');
            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
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
        Schema::dropIfExists('equipo_clubs');
    }
};
