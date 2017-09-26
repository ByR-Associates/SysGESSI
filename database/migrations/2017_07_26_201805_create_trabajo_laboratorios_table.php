<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajoLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_laboratorios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trabajo_campo_id')->unsigned();
            $table->longText('descripcion_muestra');
            $table->string('cantidad', 100);
            $table->longText('observacion');
            $table->enum('estado', ['En Espera', 'En Proceso', 'En Ejecución', 'En Laboratorio'])->default('En Espera');
            $table->timestamps();

            $table->foreign('trabajo_campo_id')->references('id')->on('trabajo_campos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajo_laboratorios');
    }
}
