<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoscasuisticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentoscasuistica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('tema',100);
            $table->string('autor',150);
            $table->dateTime('fecha');
            $table->dateTime('notificacion');
            $table->string('observacion',200);
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
        Schema::dropIfExists('documentoscasuistica');
    }
}
