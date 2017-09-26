<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_estudios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 100);
            $table->integer('cliente_id')->unsigned();
            $table->string('obra',100);           
            $table->integer('parroquia_id')->unsigned();
            $table->string('direccion',150);
            $table->string('referencia',200);
            $table->string('coordenadas',50);
            $table->string('contacto',100);          
            $table->integer('progreso');
            $table->enum('estado', ['En Desarrollo', 'Finalizado', 'Anulado'])->default('En Desarrollo');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_estudios');
    }
}
