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
    App\Categoria::create([ //1
      'nombre_categoria' =>'Bolleria',
      'descripcion' =>'Bolleria',
    ]);

    App\Categoria::create([//2
      'nombre_categoria' =>'Empanadillas',
      'descripcion' =>'Empanadillas',
    ]);

    App\Categoria::create([//3
      'nombre_categoria' =>'Gourmet',
      'descripcion' =>'Gourmet',
    ]);

    App\Categoria::create([//4
      'nombre_categoria' =>'Pan',
      'descripcion' =>'Pan',
    ]);

    App\Categoria::create([//5
      'nombre_categoria' =>'Tartas',
      'descripcion' =>'Tartas',
    ]);

    App\Categoria::create([//6
      'nombre_categoria' =>'Pastelería',
      'descripcion' =>'Pastelería',
    ]);

    App\Categoria::create([//7
      'nombre_categoria' =>'Repostería',
      'descripcion' =>'Repostería',
    ]);

    App\Categoria::create([//8
      'nombre_categoria' =>'Pan Dulce',
      'descripcion' =>'Pan Dulce',
    ]);

    App\Categoria::create([//9
      'nombre_categoria' =>'Bebidas Frías',
      'descripcion' =>'Bebidas Frías',
    ]);

    App\Categoria::create([//10
      'nombre_categoria' =>'Bebidas Calientes',
      'descripcion' =>'Bebidas Calientes',
    ]);


    }
}
