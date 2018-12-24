<?php

use Illuminate\Database\Seeder;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Producto::create([
    'nombre_producto' =>'Horchata',
    'stock' =>'10',
    'categoria_id'=>'9',
    'imagen'=>'http://127.0.0.1:8000/imagenes/QUakZPDLUDwhdSsBwySn7Zw2MCzA6thwvWvOH6dw.jpeg',
    'precio'=>'1.25',
    'descripcion'=>'Horchata',
  ]);

  App\Producto::create([
    'nombre_producto' =>'Dona',
    'stock' =>'10',
    'categoria_id'=>'7',
    'imagen'=>'http://127.0.0.1:8000/imagenes/yZWluSFIyxd2am76lBA1tqTUVu17A90XNlg41X69.jpeg',
    'precio'=>'0.75',
    'descripcion'=>'Dona',
  ]);

  App\Producto::create([
    'nombre_producto' =>'Pastel',
    'stock' =>'10',
    'categoria_id'=>'6',
    'imagen'=>'http://127.0.0.1:8000/imagenes/YTaQBhWHaY8KWNPNbziIqhr73cb7OxL7YUiPdlnm.jpeg',
    'precio'=>'15.25',
    'descripcion'=>'Pastel',
  ]);
    }
}
