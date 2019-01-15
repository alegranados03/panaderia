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
    /*  App\Producto::create([
    'nombre_producto' =>'Horchata',
    'stock' =>'10',
    'categoria_id'=>'9',
    'imagen'=>'http://127.0.0.1:8000/imagenes/QUakZPDLUDwhdSsBwySn7Zw2MCzA6thwvWvOH6dw.jpeg',
    'precio'=>'1.25',
    'descripcion'=>'Horchata',
  ]);*/


  App\Producto::create([  'nombre_producto' =>'3 Leches con turrón',  'stock' =>'20',  'categoria_id'=>'7',  'imagen'=>'http://127.0.0.1:8000/imagenes/1.jpg',  'precio'=>'3',  'descripcion'=>'3 Leches con turrón ']);
App\Producto::create([  'nombre_producto' =>'3 Leches de caramelo',  'stock' =>'20',  'categoria_id'=>'7',  'imagen'=>'http://127.0.0.1:8000/imagenes/2.jpg',  'precio'=>'3',  'descripcion'=>'3 Leches de caramelo ']);
App\Producto::create([  'nombre_producto' =>'Banana Cream Pie',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/3.jpg',  'precio'=>'3',  'descripcion'=>'Banana Cream Pie ']);
App\Producto::create([  'nombre_producto' =>'Pastel de Fresa',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/4.jpg',  'precio'=>'3',  'descripcion'=>'Pastel de Fresa ']);
App\Producto::create([  'nombre_producto' =>'Pastel de Toffe',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/5.jpg',  'precio'=>'3.35',  'descripcion'=>'Pastel de Toffe ']);
App\Producto::create([  'nombre_producto' =>'capuccino mousse',  'stock' =>'20',  'categoria_id'=>'10',  'imagen'=>'http://127.0.0.1:8000/imagenes/6.jpg',  'precio'=>'3.25',  'descripcion'=>'capuccino mousse ']);
App\Producto::create([  'nombre_producto' =>'Cardenalito con fresas',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/7.jpg',  'precio'=>'2.99',  'descripcion'=>'Cardenalito con fresas ']);
App\Producto::create([  'nombre_producto' =>'Creme Brulee',  'stock' =>'20',  'categoria_id'=>'5',  'imagen'=>'http://127.0.0.1:8000/imagenes/8.jpg',  'precio'=>'3.6',  'descripcion'=>'Creme Brulee ']);
App\Producto::create([  'nombre_producto' =>'Pie de Manzana',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/9.jpg',  'precio'=>'3.35',  'descripcion'=>'Pie de Manzana ']);
App\Producto::create([  'nombre_producto' =>'Flan Cubano',  'stock' =>'20',  'categoria_id'=>'7',  'imagen'=>'http://127.0.0.1:8000/imagenes/10.jpg',  'precio'=>'3',  'descripcion'=>'Flan Cubano ']);
App\Producto::create([  'nombre_producto' =>'Fresas con Crema',  'stock' =>'20',  'categoria_id'=>'7',  'imagen'=>'http://127.0.0.1:8000/imagenes/11.jpg',  'precio'=>'3',  'descripcion'=>'Fresas con Crema ']);
App\Producto::create([  'nombre_producto' =>'Kahlua',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/12.jpg',  'precio'=>'10',  'descripcion'=>'Licor de café Mexicano ']);
App\Producto::create([  'nombre_producto' =>'Macadamia Nut Pie',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/13.jpg',  'precio'=>'3',  'descripcion'=>'Macadamia Nut Pie ']);
App\Producto::create([  'nombre_producto' =>'Mousse de Chocolate',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/14.jpg',  'precio'=>'3',  'descripcion'=>'Mousse de Chocolate ']);
App\Producto::create([  'nombre_producto' =>'Cheesecake de Oreo',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/15.jpg',  'precio'=>'3',  'descripcion'=>'Cheesecake de Oreo ']);
App\Producto::create([  'nombre_producto' =>'Pie de Higo',  'stock' =>'20',  'categoria_id'=>'6',  'imagen'=>'http://127.0.0.1:8000/imagenes/16.jpg',  'precio'=>'3',  'descripcion'=>'Pie de Higo ']);
App\Producto::create([  'nombre_producto' =>'Tartaleta de Fresa',  'stock' =>'20',  'categoria_id'=>'5',  'imagen'=>'http://127.0.0.1:8000/imagenes/17.jpg',  'precio'=>'3',  'descripcion'=>'Tartaleta de Fresa ']);
App\Producto::create([  'nombre_producto' =>'Tartaleta de manzana',  'stock' =>'20',  'categoria_id'=>'5',  'imagen'=>'http://127.0.0.1:8000/imagenes/18.jpg',  'precio'=>'3',  'descripcion'=>'Tartaleta de manzana ']);
App\Producto::create([  'nombre_producto' =>'Tartaleta de melocotón',  'stock' =>'20',  'categoria_id'=>'5',  'imagen'=>'http://127.0.0.1:8000/imagenes/19.jpg',  'precio'=>'3',  'descripcion'=>'Tartaleta de melocotón ']);
App\Producto::create([  'nombre_producto' =>'Tartaleta lemoncello',  'stock' =>'20',  'categoria_id'=>'5',  'imagen'=>'http://127.0.0.1:8000/imagenes/20.jpg',  'precio'=>'3',  'descripcion'=>'Tartaleta lemoncello ']);
App\Producto::create([  'nombre_producto' =>'Tartaleta tropical',  'stock' =>'20',  'categoria_id'=>'5',  'imagen'=>'http://127.0.0.1:8000/imagenes/21.jpg',  'precio'=>'3',  'descripcion'=>'Tartaleta tropical ']);
App\Producto::create([  'nombre_producto' =>'Tiramisu',  'stock' =>'20',  'categoria_id'=>'7',  'imagen'=>'http://127.0.0.1:8000/imagenes/22.jpg',  'precio'=>'3',  'descripcion'=>'Tiramizu ']);
App\Producto::create([  'nombre_producto' =>'Torta Chilena',  'stock' =>'20',  'categoria_id'=>'7',  'imagen'=>'http://127.0.0.1:8000/imagenes/23.jpg',  'precio'=>'3',  'descripcion'=>'Torta Chilena ']);
App\Producto::create([  'nombre_producto' =>'Zebra de caramelo',  'stock' =>'20',  'categoria_id'=>'7',  'imagen'=>'http://127.0.0.1:8000/imagenes/24.jpg',  'precio'=>'3',  'descripcion'=>'Zebra de caramelo ']);
App\Producto::create([  'nombre_producto' =>'Tartaleta de banano',  'stock' =>'20',  'categoria_id'=>'5',  'imagen'=>'http://127.0.0.1:8000/imagenes/25.jpg',  'precio'=>'3',  'descripcion'=>'Tartaleta de banano ']);
App\Producto::create([  'nombre_producto' =>'Tartaleta de limón',  'stock' =>'20',  'categoria_id'=>'5',  'imagen'=>'http://127.0.0.1:8000/imagenes/26.jpg',  'precio'=>'3',  'descripcion'=>'Tartaleta de limón ']);
App\Producto::create([  'nombre_producto' =>'Caramel Latte Frio',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/27.jpg',  'precio'=>'3',  'descripcion'=>'Caramel Latte Frio ']);
App\Producto::create([  'nombre_producto' =>'Vainilla latte Frio',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/28.jpg',  'precio'=>'3',  'descripcion'=>'Vainilla latte Frio ']);
App\Producto::create([  'nombre_producto' =>'Te frío natural',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/29.jpg',  'precio'=>'3',  'descripcion'=>'Te frío natural ']);
App\Producto::create([  'nombre_producto' =>'Horchata',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/30.jpg',  'precio'=>'3',  'descripcion'=>'Horchata ']);
App\Producto::create([  'nombre_producto' =>'Frozen de Horchata',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/31.jpg',  'precio'=>'3',  'descripcion'=>'Frozen de Horchata ']);
App\Producto::create([  'nombre_producto' =>'Coca Cola',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/32.jpg',  'precio'=>'1.5',  'descripcion'=>'Coca Cola ']);
App\Producto::create([  'nombre_producto' =>'Fanta ',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/33.jpg',  'precio'=>'1.5',  'descripcion'=>'Fanta  ']);

App\Producto::create([  'nombre_producto' =>'Tropical Fresa',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/35.jpg',  'precio'=>'1.5',  'descripcion'=>'Tropical Fresa ']);
App\Producto::create([  'nombre_producto' =>'Kolashampan',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/36.jpg',  'precio'=>'1',  'descripcion'=>'Kolashampan ']);
App\Producto::create([  'nombre_producto' =>'Jugo de naranja',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/37.jpg',  'precio'=>'2.5',  'descripcion'=>'Jugo de naranja ']);
App\Producto::create([  'nombre_producto' =>'Limonada Natural',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/38.jpg',  'precio'=>'2.5',  'descripcion'=>'Limonada Natural ']);
App\Producto::create([  'nombre_producto' =>'Rosa de Jamaica',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/39.jpg',  'precio'=>'2.5',  'descripcion'=>'Rosa de Jamaica ']);
App\Producto::create([  'nombre_producto' =>'Limonada con soda',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/40.jpg',  'precio'=>'2.5',  'descripcion'=>'Limonada con soda ']);
App\Producto::create([  'nombre_producto' =>'Jugo de zanahoria',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/41.jpg',  'precio'=>'2.5',  'descripcion'=>'Jugo de zanahoria ']);
App\Producto::create([  'nombre_producto' =>'Frozen de fresa',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/42.jpg',  'precio'=>'3',  'descripcion'=>'Frozen ']);
App\Producto::create([  'nombre_producto' =>'Smoothie Banana-fresa',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/43.jpg',  'precio'=>'3',  'descripcion'=>'Smoothie ']);
App\Producto::create([  'nombre_producto' =>'Piña colada',  'stock' =>'20',  'categoria_id'=>'9',  'imagen'=>'http://127.0.0.1:8000/imagenes/44.jpg',  'precio'=>'3',  'descripcion'=>'Piña colada ']);
App\Producto::create([  'nombre_producto' =>'Café Americano',  'stock' =>'20',  'categoria_id'=>'10',  'imagen'=>'http://127.0.0.1:8000/imagenes/45.jpg',  'precio'=>'3.5',  'descripcion'=>'Café Americano ']);
App\Producto::create([  'nombre_producto' =>'Café Latte',  'stock' =>'20',  'categoria_id'=>'10',  'imagen'=>'http://127.0.0.1:8000/imagenes/46.jpg',  'precio'=>'3.5',  'descripcion'=>'Café Latte ']);
App\Producto::create([  'nombre_producto' =>'Capuccino Moccha',  'stock' =>'20',  'categoria_id'=>'10',  'imagen'=>'http://127.0.0.1:8000/imagenes/47.jpg',  'precio'=>'3.5',  'descripcion'=>'Capuccino Moccha ']);
App\Producto::create([  'nombre_producto' =>'Capuccino Royal',  'stock' =>'20',  'categoria_id'=>'10',  'imagen'=>'http://127.0.0.1:8000/imagenes/48.jpg',  'precio'=>'3.5',  'descripcion'=>'Capuccino Royal ']);
App\Producto::create([  'nombre_producto' =>'Te Caliente',  'stock' =>'20',  'categoria_id'=>'10',  'imagen'=>'http://127.0.0.1:8000/imagenes/49.jpg',  'precio'=>'3.5',  'descripcion'=>'Te Caliente ']);
App\Producto::create([  'nombre_producto' =>'Vainilla latte',  'stock' =>'20',  'categoria_id'=>'10',  'imagen'=>'http://127.0.0.1:8000/imagenes/50.jpg',  'precio'=>'3.5',  'descripcion'=>'Vainilla latte ']);
App\Producto::create([  'nombre_producto' =>'Pan Francés',  'stock' =>'20',  'categoria_id'=>'4',  'imagen'=>'http://127.0.0.1:8000/imagenes/51.jpg',  'precio'=>'1',  'descripcion'=>'Pan Francés ']);
App\Producto::create([  'nombre_producto' =>'Semita',  'stock' =>'20',  'categoria_id'=>'8',  'imagen'=>'http://127.0.0.1:8000/imagenes/52.jpg',  'precio'=>'0.75',  'descripcion'=>'Semita ']);




    }
}
