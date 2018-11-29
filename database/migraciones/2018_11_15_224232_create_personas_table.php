<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_documento',20);
            $table->string('documento');            
            $table->string('primer_nombre',100);
            $table->string('segundo_nombre',100);
            $table->string('primer_apellido',100);
            $table->string('segundo_apellido',100);            
            $table->string('estado',50);            
            $table->tinyInteger('estrato');
            $table->string('tarjeta_profesional',200);
            $table->string('nivel_profesional',100);
            $table->string('direccion',100);
            $table->string('telefono',15);            
            $table->string('name',50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->string('remember_token',255);
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
        Schema::dropIfExists('personas');
    }
}
