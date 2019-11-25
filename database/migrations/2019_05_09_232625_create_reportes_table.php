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
            $table->string('programa');            
            $table->integer('semana_reporte');
            $table->integer('semana_remplazo')->nullable();
            $table->date('fecha_tema');            
            $table->text('descripcion');
            $table->text('justificacion')->nullable();
            $table->unsignedInteger('asignatura_id');            
            $table->unsignedInteger('tema_planeador_id');
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
        Schema::dropIfExists('reportes');
    }
}
