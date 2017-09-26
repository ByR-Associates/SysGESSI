<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajoCampoEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_campo_equipo', function (Blueprint $table) {
            $table->integer('trabajo_campo_id')->unsigned()->nullable();
            $table->integer('equipo_id')->unsigned()->nullable();
            $table->timestamps();
             
            $table->foreign('trabajo_campo_id')->references('id')->on('trabajo_campos')->onDelete('cascade');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajo_campo_equipo');
    }
}
