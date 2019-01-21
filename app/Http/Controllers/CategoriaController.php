<?php

namespace App\Http\Controllers;

use App\Categoria;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaForm;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $path = 'administracion/categorias/';

     //Referencia al middleware
     public function __construct(){
       $this->middleware('auth');
       $this->middleware('has.permission:gestionar_categorias');
     }


    public function index()
    {
      $categorias=Categoria::all();
      return view($this->path.'index',["categorias"=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view($this->path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaForm $request)
    {
      $direccion=Storage::disk('public')->put('imagenes',$request->file('imagen'));

      try{
        $categoria=new Categoria($request->all());
        $categoria->imagen=asset($direccion);

        $categoria->save();
        return redirect()->action('CategoriaController@index')->with('msj','Categoria agregada con éxito');
      }catch(Exception $e)
        {

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view($this->path.'show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view($this->path.'edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaForm $request, Categoria $categoria)
    {
      try{
        $categoria->nombre_categoria=$request->nombre_categoria;
        $categoria->descripcion=$request->descripcion;
        if($request->file('imagen')){
        $direccion=Storage::disk('public')->put('imagenes',$request->file('imagen'));
        $categoria->imagen=asset($direccion);
        $categoria->save();}else{
          $categoria->update();
      }
      return redirect()->action('CategoriaController@index',['$categoria' =>$categoria->id])->with('msj','Producto editado con éxito');
      }catch(Exception $e)
        {

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
