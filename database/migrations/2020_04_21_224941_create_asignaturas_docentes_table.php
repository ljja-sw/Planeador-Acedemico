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
            $table->unsignedBigInteger('asignatura_id');
            $table->unsignedBigInteger('docente_id');
            // $table->unsignedBigInteger('dia_id');
            $table->json('dias');
            // $table->unsignedBigInteger('salon_id');
            // $table->unsignedBigInteger('horario_id');
            // $table->foreign('dia_id')->references('id')->on('dias');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->foreign('docente_id')->references('id')->on('docentes');
            // $table->foreign('salon_id')->references('id')->on('salones_salas');
            // $table->foreign('horario_id')->references('id')->on('horarios');
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
