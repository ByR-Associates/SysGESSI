<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factura_id')->unsigned();  
            $table->string('numero_factura',100);
            $table->double('cantidad', 5, 2);           
            $table->mediumText('concepto');
            $table->decimal('valor_unitario', 9, 2);
            $table->timestamps();

            $table->foreign('factura_id')->references('id')->on('facturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_detalles');
    }
}
