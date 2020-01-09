<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->integer('semana_tema');
            $table->text('descripcion');
            $table->text('tipo_clase');         
            $table->text('justificacion')->nullable();
           
            $table->unsignedInteger('programas_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('asignatura_id');
            $table->unsignedInteger('tema_planeador_id');                    



            $table->timestamps();
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
