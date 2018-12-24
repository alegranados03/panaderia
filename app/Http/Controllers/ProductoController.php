<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Carrito;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductoRequest;
use App\Http\Requests\ProductoERequest;
use Image;
use DB;
use Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $path = 'administracion/productos/';

    //Referencia al middleware
    public function __construct(){
      //$this->middleware('auth');
    }


    public function index(Request $request){
        $productos=Producto::join('categorias', 'categorias.id', '=', 'productos.categoria_id')
        ->select('productos.*','categorias.nombre_categoria')->get();
        return view($this->path.'index',["productos"=>$productos]);
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categorias=Categoria::pluck('nombre_categoria','id');
        return view($this->path.'create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {

      $direccion=Storage::disk('public')->put('imagenes',$request->file('imagen'));

        try{
          $producto=new Producto($request->all());
          $producto->stock=0;
          $producto->fill(['imagen'=>asset($direccion)])->save();

          return redirect()->action('ProductoController@index',['producto' =>$producto->id])->with('msj','Producto agregado con éxito');
        }catch(Exception $e)
          {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $producto = Producto::findOrFail($id);
      $categorias = Categoria::pluck('nombre_categoria','id')->toArray();

      return view($this->path.'show',compact('producto','categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
      $categorias=Categoria::pluck('nombre_categoria','id');
    return view($this->path.'edit',compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoERequest $request, Producto $producto)
    {
      try{
      $producto->nombre_producto=$request->nombre_producto;
      $producto->categoria_id=$request->categoria_id;
      $producto->precio=$request->precio;
      $producto->descripcion=$request->descripcion;
      if($request->file('imagen')){
      $direccion=Storage::disk('public')->put('imagenes',$request->file('imagen'));
      $producto->fill(['imagen'=>asset($direccion)])->save();}else{
        $producto->update();
    }
        return redirect()->action('ProductoController@show',['producto' =>$producto->id])->with('msj','Producto editado con éxito');
      }catch(Exception $e)
        {

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $producto=Producto::find($id);
           $producto->delete();
           return Redirect::to('productos');
    }



    public function mostrarCategorias()
    {
      $categorias=Categoria::all();
        return view('cliente.productosCat',compact('categorias'));
    }

    public function mostrarProductos($id)
    {$categorias=Categoria::all();
      $productos=Producto::where('categoria_id','=',$id)
      ->where('stock','>',0)
      ->get();
        return view('cliente.productos',compact('productos','categorias'));
    }


    public function verCarrito()
    {
      $categorias=Categoria::all();
      if(!Session::has('carrito')){
          return view('cliente.verCarrito',['productos'=>null],compact('categorias'));
      }
      $carritoAnt=Session::get('carrito');
      $carrito=new Carrito($carritoAnt);
      return view('cliente.verCarrito',['productos'=>$carrito->elementos,'precioTotal'=>$carrito->precioTotal],compact('categorias'));

    }



    public function agregarACarrito(Request $request, $id)
    {
      $producto=Producto::find($id);
      $carritoAnt=Session::has('carrito') ? Session::get('carrito') : null;
      $carrito= new Carrito($carritoAnt);
      $carrito->agregar($producto,$producto->id);
      $request->session()->put('carrito',$carrito);
          return redirect()->back()->with('msj',$producto->nombre_producto.' Agregado al Carrito Exitosamente');

    }


    public function disminuirUno(Request $request, $id)
    {
      $producto=Producto::find($id);
      $carritoAnt=Session::has('carrito') ? Session::get('carrito') : null;
      $carrito= new Carrito($carritoAnt);
      $carrito->disminuir($producto,$producto->id);
      $request->session()->put('carrito',$carrito);
        return redirect()->action('ProductoController@verCarrito')->with('msj',$producto->nombre_producto.'Editado Exitosamente');
    }

    public function quitarProducto(Request $request, $id)
    {
      $producto=Producto::find($id);
      $carritoAnt=Session::has('carrito') ? Session::get('carrito') : null;
      $carrito= new Carrito($carritoAnt);
      $carrito->eliminar($producto->id);
      $request->session()->put('carrito',$carrito);
        return redirect()->action('ProductoController@verCarrito')->with('msj',$producto->nombre_producto.'Editado Exitosamente');
    }

    public function agregarVarios(Request $request,$id, $cantidad){
      $producto = Producto::find($id);
      $carritoAnt=Session::has('carrito') ? Session::get('carrito') : null;
      $carrito= new Carrito($carritoAnt);
      $carrito->agregarVarios($producto,$producto->id,$cantidad);

      $request->session()->put('carrito',$carrito);
      return redirect()->back()->with('info','Agregado con exito')->with('tipo', 'success');
    }

}
