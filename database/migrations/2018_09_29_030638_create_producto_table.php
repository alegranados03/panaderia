<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre_producto',100);
          $table->integer('stock');
          $table->integer('categoria_id')->unsigned();
          $table->foreign('categoria_id')->references('id')->on('categorias');
          $table->string('imagen');
          $table->decimal('precio',8,2);
          $table->string('descripcion');
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
      Schema::dropIfExists('productos');
    }
}
