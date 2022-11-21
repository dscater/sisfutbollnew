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
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('apep');
            $table->string('apem');
            $table->string('ci');
            $table->string('ci_exp',155);
            $table->bigInteger('equipoclub_id')->unsigned()->nullable();
            $table->foreign('equipoclub_id')->references('id')->on('equipo_clubs')->onDelete("cascade");
            $table->date('fecha_nac');
            $table->string('lugar_nac',155);
            $table->string('nacionalidad');
            $table->integer('nro_casaca');
            $table->date('fecha_afi');
            $table->string('foto')->nullable();
            $table->string('observacion',255);
            $table->string('qr',255)->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('jugadors');
    }
};
