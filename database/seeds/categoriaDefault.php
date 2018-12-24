<?php

use Illuminate\Database\Seeder;

class categoriaDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    App\Categoria::create([
      'nombre_categoria' =>'Bolleria',
      'descripcion' =>'Bolleria',
    ]);

    App\Categoria::create([
      'nombre_categoria' =>'Empanadillas',
      'descripcion' =>'Empanadillas',
    ]);

    App\Categoria::create([
      'nombre_categoria' =>'Gourmet',
      'descripcion' =>'Gourmet',
    ]);

    App\Categoria::create([
      'nombre_categoria' =>'Pan',
      'descripcion' =>'Pan',
    ]);

    App\Categoria::create([
      'nombre_categoria' =>'Tartas',
      'descripcion' =>'Tartas',
    ]);

    App\Categoria::create([
      'nombre_categoria' =>'Pastelería',
      'descripcion' =>'Pastelería',
    ]);

    App\Categoria::create([
      'nombre_categoria' =>'Repostería',
      'descripcion' =>'Repostería',
    ]);

    App\Categoria::create([
      'nombre_categoria' =>'Pan Dulce',
      'descripcion' =>'Pan Dulce',
    ]);

    App\Categoria::create([
      'nombre_categoria' =>'Bebidas',
      'descripcion' =>'Bebidas',
    ]);


    }
}
