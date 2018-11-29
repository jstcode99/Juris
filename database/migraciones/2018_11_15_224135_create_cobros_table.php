<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('n_smlmv');

            $table->decimal('rango1', 10, 2);
            $table->integer('porcentaje1');
            
            $table->decimal('rango2', 10, 2);
            $table->integer('porcentaje2');

            $table->decimal('rango3', 10, 2);
            $table->integer('porcentaje3');

            $table->decimal('rango4', 10, 2);
            $table->integer('porcentaje4');

            $table->decimal('rango5', 10, 2);
            $table->integer('porcentaje5');

            
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
        Schema::dropIfExists('cobros');
    }
}
