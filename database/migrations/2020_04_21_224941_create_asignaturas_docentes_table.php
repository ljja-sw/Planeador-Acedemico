<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas_docentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asignatura_grupo_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('horario_id');
            $table->unsignedBigInteger('horario_2_id')->nullable();
            $table->foreign('asignatura_grupo_id')->references('id')->on('asignaturas_grupos');
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->foreign('horario_2_id')->references('id')->on('horarios');
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
        Schema::dropIfExists('asignaturas_docentes');
    }
}
