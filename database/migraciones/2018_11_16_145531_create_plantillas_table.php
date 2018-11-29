<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->datetime('fecha');
            $table->string('autor',100);
            $table->string('etiquetas',100);
            $table->string('version',10);
            $table->string('documento',10);
            $table->string('tipo_archivo',10);
            $table->integer('id_especialidad');
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
        Schema::dropIfExists('plantillas');
    }
}
