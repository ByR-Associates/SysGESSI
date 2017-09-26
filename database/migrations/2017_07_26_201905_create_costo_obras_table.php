<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostoObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costo_obras', function (Blueprint $table) {
            $table->integer('solicitud_estudio_id')->unsigned();
            $table->primary('solicitud_estudio_id');
            $table->decimal('valor', 9, 2);
            $table->timestamps();

            $table->foreign('solicitud_estudio_id')->references('id')->on('solicitud_estudios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costo_obras');
    }
}
