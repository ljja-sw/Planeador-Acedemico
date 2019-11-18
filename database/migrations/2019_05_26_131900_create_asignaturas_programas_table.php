<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas_programas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asignatura_id');
            $table->unsignedBigInteger('programa_id');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->foreign('programa_id')->references('id')->on('programas');
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
        Schema::dropIfExists('asignaturas_programas');
    }
}
