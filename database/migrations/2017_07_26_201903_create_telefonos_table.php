<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('telefonos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo_telefono', ['Personal', 'Domicilio', 'Trabajo', 'Emergencia'])->default('Personal');
            $table->string('numero', 10);
            $table->integer('cliente_id')->unsigned();                
            $table->timestamps();
            
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefonos');
    }
}
