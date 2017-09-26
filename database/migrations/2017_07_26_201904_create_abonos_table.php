<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitud_estudio_id')->unsigned();
            $table->dateTime('fecha');
            $table->integer('metodo_pago_id')->unsigned();
            $table->mediumText('detalle');
            $table->string('total');
            $table->timestamps();

            $table->foreign('solicitud_estudio_id')->references('id')->on('solicitud_estudios');
            $table->foreign('metodo_pago_id')->references('id')->on('metodo_pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos');
    }
}
