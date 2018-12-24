<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_orden', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('orden_id')->unsigned();
          $table->foreign('orden_id')->references('id')->on('ordenes')->onDelete('cascade');
          $table->integer('producto_id')->unsigned();
          $table->foreign('producto_id')->references('id')->on('productos');
          $table->integer('cantidad_producto');
          $table->decimal('total_parcial',8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('detalles_orden');
    }
}
