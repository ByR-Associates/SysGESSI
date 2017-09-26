<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajoCampoVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_campo_vehiculo', function (Blueprint $table) {
            $table->integer('trabajo_campo_id')->unsigned()->nullable();
            $table->integer('vehiculo_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('trabajo_campo_id')->references('id')->on('trabajo_campos')->onDelete('cascade'); 
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajo_campo_vehiculo');
    }
}
