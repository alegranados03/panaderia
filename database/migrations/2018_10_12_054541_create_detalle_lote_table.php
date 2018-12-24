<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleLoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_lote', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lote')->unsigned();
            $table->foreign('id_lote')->references('id')->on('lote');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->decimal('costo_invidual',8,2);
            $table->integer('cantidad_lote');
            $table->decimal('sub_total',8,2);
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
        Schema::dropIfExists('detalle_lote');
    }
}
