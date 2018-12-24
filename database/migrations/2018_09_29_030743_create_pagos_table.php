<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')->references('id')->on('ordenes');
            $table->ENUM('tipo_pago',['Efectivo','Tarjeta Crédito']);
            $table->string('tarjeta_credito')->nullable();
            $table->decimal('total_cancelar',8,2);
            $table->decimal('recibido',8,2);
            $table->decimal('cambio',8,2);
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
    Schema::dropIfExists('pagos');
    }
}
