<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleRecetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_receta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receta_id')->unsigned();
            $table->foreign('receta_id')->references('id')->on('receta');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('materiaPrima_id')->unsigned();
            $table->foreign('materiaPrima_id')->references('id')->on('materia_prima');
            $table->decimal('cantidad_individual',8,2);
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
        Schema::dropIfExists('detalle_receta');
    }
}
