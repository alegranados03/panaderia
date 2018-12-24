<?php

use Illuminate\Database\Seeder;

class MesaDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Mesa::create([
      'codigo_mesa' =>'Para Llevar',
      'capacidad_personas' =>'0',
    ]);

        App\Mesa::create([
      'codigo_mesa' =>'Mesa 1',
      'capacidad_personas' =>'4',
    ]);

    App\Mesa::create([
      'codigo_mesa' =>'Mesa 2',
      'capacidad_personas' =>'4',
    ]);

    App\Mesa::create([
      'codigo_mesa' =>'Mesa 3',
      'capacidad_personas' =>'4',
    ]);

    App\Mesa::create([
      'codigo_mesa' =>'Mesa 4',
      'capacidad_personas' =>'4',
    ]);

    App\Mesa::create([
      'codigo_mesa' =>'Mesa 5',
      'capacidad_personas' =>'4',
    ]);

    App\Mesa::create([
      'codigo_mesa' =>'Mesa 6',
      'capacidad_personas' =>'4',
    ]);

    App\Mesa::create([
      'codigo_mesa' =>'Mesa 7',
      'capacidad_personas' =>'4',
    ]);

    App\Mesa::create([
      'codigo_mesa' =>'Mesa 8',
      'capacidad_personas' =>'4',
    ]);

    App\Mesa::create([
      'codigo_mesa' =>'Mesa 9',
      'capacidad_personas' =>'4',
    ]);
    }
}
