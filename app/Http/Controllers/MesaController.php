<?php

namespace App\Http\Controllers;

use App\Mesa;
use App\Orden;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $path = 'administracion/mesas/';

     //Referencia al middleware
     public function __construct(){
       $this->middleware('auth');
       $this->middleware('has.permission:gestionar_mesas');
     }


    public function index()
    {
      $mesas=Mesa::all();
      return view($this->path.'index',["mesas"=>$mesas]);
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
    public function store(Request $request)
    {
        try {
          $mesa = new Mesa($request->all());
          if($mesa->save()){
            return redirect()->action('MesaController@index',["mesa"=>$mesa->id])->with('msj','Mesa registrada con exito');
          }
        } catch (Exception $e) {
          return redirect()->back()->with('msj','Mesa no registrada hubo un error');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show(Mesa $mesa)
    {

      $ordenes = Orden::join('mesas','ordenes.mesa_id','=','mesas.id')
      ->where('ordenes.tipo_orden','=','LOCAL')
      ->where('ordenes.estado_servicio','=','PENDIENTE')
      ->where('mesa_id','=',$mesa->id)
      ->select('ordenes.*','mesas.codigo_mesa')->get();
      return view($this->path.'show',compact('mesa','ordenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        return view($this->path.'edit',compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesa $mesa)
    {
      try {
        $mesa->codigo_mesa=$request->codigo_mesa;
        $mesa->capacidad_personas=$request->capacidad_personas;
        if($mesa->update()){
          return redirect()->action('MesaController@index',["mesa"=>$mesa->id])->with('msj','Mesa editada con exito');
        }


      } catch (Exception $e) {
return redirect()->back()->with('msj','Mesa no registrada hubo un error');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        //
    }
}
