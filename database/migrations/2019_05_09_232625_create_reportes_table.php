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
            $table->string('tema_planeador');            
            $table->text('descripcion');
            $table->text('tipo_clase');         
            $table->text('justificacion')->nullable();

            $table->unsignedBigInteger('reportes_docente');
            $table->unsignedBigInteger('reporte_asignatura');            
            $table->unsignedInteger('programas_id');

            $table->unsignedInteger('asignatura_id');            
            $table->unsignedInteger('tema_planeador_id');

            $table->timestamps();
            $table->foreign('reportes_docente')->references('id')->on('docentes');
            $table->foreign('reporte_asignatura')->references('id')->on('asignaturas');            
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
