<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado',50);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->decimal('valor', 10, 2);
            $table->string('tiempo',50);
            $table->integer('id_casuistica');  
            $table->integer('id_instancia'); 
            $table->integer('id_producto');   
            $table->string('riesgo',50);
            $table->string('lugar',100);
            $table->string('dificultad',50);
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
        Schema::dropIfExists('procesos');
    }
}
