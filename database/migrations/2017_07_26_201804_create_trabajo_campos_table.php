<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajoCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_campos', function (Blueprint $table) {
         //$table->increments('id');// no se necesita porque es 1 a 1
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->integer('usuario_responsable_id')->unsigned();
            $table->dateTime('fecha');
            $table->string('cantidad', 100);
            $table->decimal('viatico', 5, 2);
            $table->text('observacion'); 
            $table->timestamps();

            $table->foreign('id')->references('id')->on('orden_trabajos')->onDelete('cascade');
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
        Schema::dropIfExists('trabajo_campos');
    }
}
