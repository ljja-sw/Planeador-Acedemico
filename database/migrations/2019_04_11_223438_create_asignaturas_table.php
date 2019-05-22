<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('codigo');
            $table->unsignedInteger('grupo');
            $table->unsignedInteger('creditos');
            $table->unsignedInteger('intensidad_horaria');
            $table->unsignedInteger('habilitable');
            $table->unsignedInteger('validable');
            $table->unsignedBigInteger('programa_academico');
            $table->foreign('programa_academico')->references('id')->on('programas');
            $table->softDeletes(); //Columna para soft delete
            $table->timestamps();
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
}
