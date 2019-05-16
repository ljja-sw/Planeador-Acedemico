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
            $table->date('fecha');
            $table->string('tema');
            $table->unsignedInteger('metodología');
            $table->unsignedInteger('planeador_id');
            $table->timestamps();
            $table->string('slug');
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
