<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajeriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajeria', function (Blueprint $table) {
            $table->increments('id_mensaje');
            $table->integer('id_cliente');
            $table->integer('id_tecnico');
            $table->integer('id_comercial');
            $table->string('asunto');
            $table->string('mensaje');
            $table->integer('estado');
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
        Schema::dropIfExists('mensajeria');
    }
}
