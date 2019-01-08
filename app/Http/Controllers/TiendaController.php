<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Carrito;
use App\Orden;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;


class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
       $this->middleware('auth',['only'=>['miperfil','misordenes']]);
       $this->middleware('has.permission:ver_perfil',['only'=>['miperfil','misordenes']]);
     }
    public function index()
    {
      $categoria=Categoria::select('id')->where('nombre_categoria','=','Pastelería')->value('id');
      $pasteleria=Producto::where('categoria_id','=',$categoria)->take(8)->get();
      $categoria=Categoria::select('id')->where('nombre_categoria','=','Pan Dulce')->value('id');
      $pan=Producto::where('categoria_id','=',$categoria)->take(8)->get();
      $categoria=Categoria::select('id')->where('nombre_categoria','=','Bebidas')->value('id');
      $bebidas=Producto::where('categoria_id','=',$categoria)->take(8)->get();
      $categorias=Categoria::all();

    return view('cliente.iniciocliente',compact('pasteleria','pan','bebidas','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $producto=Producto::findOrFail($id);
        $categorias=Categoria::all();
        $categoriaP=Categoria::findOrFail($producto->categoria_id);
        return view('cliente.detalleProducto',compact('producto','categorias','categoriaP'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function miperfil(){
        if(auth()->user()->isCliente()){
            $categorias = Categoria::all();
            $ordenes=Orden::where('user_id','=',auth()->user()->id)->get();
            return view('cliente.miperfil',compact('categorias','ordenes'));
        }else{
            return view('administracion.usuarios.miperfil');
        }

    }

    public function misordenes(){
        $categorias = Categoria::all();
        $ordenes=Orden::where('user_id','=',auth()->user()->id)
        ->where('estado_servicio','=','PENDIENTE')->get();
        return view('cliente.ordenpendiente',compact('categorias','ordenes'));
    }
}
