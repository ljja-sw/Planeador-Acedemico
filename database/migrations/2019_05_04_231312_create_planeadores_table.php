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
            $table->timestamp('fecha_registro')->nullable();
            $table->unsignedBigInteger("programa_academico");
            $table->unsignedBigInteger("asignatura");
            $table->unsignedBigInteger("docente");
            $table->text("evaluaciones");
            $table->boolean("firmado");
            $table->boolean("revisado");
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
        Schema::dropIfExists('planeadores');
    }
}
