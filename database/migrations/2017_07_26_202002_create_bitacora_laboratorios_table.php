<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_laboratorios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trabajo_laboratorio_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->timestamps();

            $table->foreign('trabajo_laboratorio_id')->references('id')->on('trabajo_laboratorios');
            $table->foreign('usuario_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_laboratorios');
    }
}
