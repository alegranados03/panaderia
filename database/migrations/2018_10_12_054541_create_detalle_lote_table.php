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
            $table->integer('numero_obreros');
            $table->decimal('numero_horas',4,2);
            $table->decimal('precio_hora',4,2);
            $table->decimal('sub_total_MO',6,2);
            $table->decimal('suma_materiales',6,2);
            $table->decimal('tasa_cif',8,4);
            $table->decimal('importe',6,2);
            $table->integer('cantidad_unidades');
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
