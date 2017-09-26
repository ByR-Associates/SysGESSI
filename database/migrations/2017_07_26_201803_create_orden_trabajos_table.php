<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitud_estudio_id')->unsigned();
            $table->string('descripcion',100); 
            $table->dateTime('fecha');
            $table->integer('usuario_responsable_id')->unsigned();
            $table->string('image');
            $table->text('observacion');
            $table->decimal('extras', 9, 2);  
            $table->enum('estado', ['En Espera', 'En Proceso', 'En Ejecución', 'En Laboratorio'])->default('En Espera');            
            $table->timestamps();

            $table->foreign('solicitud_estudio_id')->references('id')->on('solicitud_estudios');
            $table->foreign('usuario_responsable_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_trabajos');
    }
}
