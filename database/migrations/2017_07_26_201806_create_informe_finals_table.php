<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_finals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_trabajo_id');
            $table->longText('url');
            $table->timestamps();

            $table->foreign('orden_trabajo_id')->references('id')->on('orden_trabajos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informe_finals');
    }
}
