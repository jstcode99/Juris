<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion1',255);
            $table->string('descripcion2',255);
            $table->string('descripcion3',255);
            $table->string('cuantia',50);
            $table->string('clase',100);
            $table->string('estado',100);
            $table->tinyInteger('estrato');
            $table->decimal('valor_caso', 10, 2);
            $table->integer('id_producto');
            $table->integer('id_instancia');
            $table->integer('id_persona');
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
        Schema::dropIfExists('casos');
    }
}
