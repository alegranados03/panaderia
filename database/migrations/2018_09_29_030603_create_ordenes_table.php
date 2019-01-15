<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codigo_seguimiento',150);
          $table->ENUM('estado_servicio',['PENDIENTE','ENTREGADA']);
          $table->ENUM('estado_pago',['SIN CANCELAR', 'CANCELADA']);
          $table->ENUM('tipo_orden',['LOCAL', 'EN LINEA']);
          $table->integer('mesa_id')->unsigned()->nullable();
          $table->foreign('mesa_id')->references('id')->on('mesas');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
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
      Schema::dropIfExists('ordenes');
    }
}
