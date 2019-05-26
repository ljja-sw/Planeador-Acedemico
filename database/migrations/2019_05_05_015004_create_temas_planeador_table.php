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
            $table->unsignedInteger('metodologia');
            $table->unsignedInteger('planeador_id');
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
