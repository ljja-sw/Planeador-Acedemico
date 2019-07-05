<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->unsignedBigInteger('dia');
            $table->unsignedBigInteger('jornada_id');
            $table->unsignedBigInteger('salon_sala_id');
            $table->timestamps();
            $table->foreign('salon_sala_id')->references('id')->on('salones_salas')->onDelete('cascade');
            $table->foreign('jornada_id')->references('id')->on('jornadas');
            $table->foreign('dia')->references('id')->on('dias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
