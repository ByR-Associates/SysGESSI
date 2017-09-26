<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_factura',100);
            $table->integer('solicitud_estudio_id')->unsigned();          
            $table->string('codigo',100);            
            $table->dateTime('fecha');
            $table->decimal('subtotal', 9, 2);
            $table->decimal('descuento', 9, 2);
            $table->decimal('iva', 9, 2);
            $table->decimal('total', 9, 2);
            $table->enum('estado', ['Generada', 'Pagada', 'Anulada'])->default('Generada');
            $table->timestamps();

            $table->foreign('solicitud_estudio_id')->references('id')->on('solicitud_estudios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
