<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo_documento', ['Cedula', 'RUC', 'Pasaporte'])->default('Cedula');
            $table->string('numero_documento', 15);
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->integer('parroquia_id')->unsigned();                
            $table->string('direccion',150);
            $table->boolean('activo')->default('true');

            $table->foreign('parroquia_id')->references('id')->on('parroquias');

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
        Schema::dropIfExists('clientes');
    }
}
