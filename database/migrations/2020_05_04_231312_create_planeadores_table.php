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
            $table->unsignedBigInteger("asignatura_grupo_id");
            $table->unsignedBigInteger("docente_id");
            $table->text("evaluaciones");
            $table->timestamps();
            $table->foreign('asignatura_grupo_id')->references('id')->on('asignaturas_grupos');
            $table->foreign('docente_id')->references('id')->on('docentes');
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
