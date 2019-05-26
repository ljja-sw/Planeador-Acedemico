<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaneadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planeadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("programa_academico");
            $table->unsignedBigInteger("asignatura");
            $table->unsignedBigInteger("docente");
            $table->text("evaluaciones");
            $table->timestamps();
            $table->foreign('programa_academico')->references('id')->on('programas');
            $table->foreign('asignatura')->references('id')->on('asignaturas');
            $table->foreign('docente')->references('id')->on('docentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planeadores');
    }
}
