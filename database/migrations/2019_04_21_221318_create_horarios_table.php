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
         $table->string('dia');
         $table->unsignedBigInteger('salon_sala_id');
         $table->timestamps();
            $table->foreign('salon_sala_id')->references('id')->on('salones_salas');
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
