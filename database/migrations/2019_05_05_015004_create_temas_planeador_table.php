<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemasPlaneadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas_planeador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('semana');
            $table->string('fecha');
            $table->string('tema');
            $table->string('slug');
            $table->unsignedBigInteger('metodologia');
            $table->unsignedBigInteger('planeador_id');
            $table->foreign('planeador_id')->references('id')->on('planeadores')->onDelete("cascade");
            $table->foreign('metodologia')->references('id')->on('metodologias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temas_planeador');
    }
}
