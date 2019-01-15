<?php

namespace App\Http\Controllers;

use App\Orden;
use App\Categoria;
use App\Pago;
use App\Mesa;
use App\Producto;
use App\DetalleOrden;
use Illuminate\Http\Request;


class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
       $this->middleware('has.permission:gestionar_ordenes',['except'=>['show']]);
     }
    public function index()
    {
        $ordenes = Orden::join('mesas','ordenes.mesa_id','=','mesas.id')
        ->where('ordenes.tipo_orden','=','LOCAL')
              ->where('ordenes.estado_pago','=','SIN CANCELAR')
        ->select('ordenes.*','mesas.codigo_mesa')->get();
        return view('administracion.orden.index',compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mesas = Mesa::pluck('codigo_mesa','id')->toArray();
        return view('administracion.orden.create',compact('mesas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { try {
      $orden = new Orden();
      $orden->codigo_seguimiento = substr(microtime(),11,strlen(microtime())-11);
      $orden->estado_servicio = $request->estado_servicio;
      $orden->estado_servicio="PENDIENTE";
      $orden->estado_pago="SIN CANCELAR";
      $orden->tipo_orden="LOCAL";
      $orden->mesa_id = $request->mesa_id;
      $orden->user_id=auth()->user()->id;
      $orden->save();
      return redirect()->action('OrdenController@agregarDetalle',['id' =>$orden->id])->with('msj','Orden Creada con éxito');
    } catch (Exception $e) {
      return back()->with('msj','Hubo un error al crear la orden');
    }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->isCliente()){
       //Lado del Cliente
       $orden=Orden::findOrFail($id);
        $detallesOrden=Orden::join('detalles_orden','ordenes.id','=','detalles_orden.orden_id')
        ->join('productos','productos.id','=','detalles_orden.producto_id')
        ->where('ordenes.id','=',$orden->id)
        ->select('ordenes.codigo_seguimiento','productos.nombre_producto','productos.precio','detalles_orden.cantidad_producto','detalles_orden.total_parcial')
        ->get();

        $codigo=$orden->codigo_seguimiento;
        $total = Pago::select('total_cancelar')->where('orden_id','=',$orden->id)->value('total_cancelar');
        $fechaCreacion=$orden->created_at;
        $categorias=Categoria::all();
        return view('cliente.detalleOrden',compact('detallesOrden','codigo','total','fechaCreacion','categorias'));
        }else{
            $orden=Orden::findOrFail($id);
            $detallesOrden=Orden::join('detalles_orden','ordenes.id','=','detalles_orden.orden_id')
            ->join('productos','productos.id','=','detalles_orden.producto_id')
            ->where('ordenes.id','=',$orden->id)
            ->select('ordenes.codigo_seguimiento','productos.nombre_producto','detalles_orden.cantidad_producto','detalles_orden.total_parcial')
            ->get();

            $codigo=$orden->codigo_seguimiento;
            $total=0;
            foreach ($detallesOrden as $key => $value) {
                $total+= $value->total_parcial;
            }
            $fechaCreacion=$orden->created_at;
            return view('administracion.orden.show',compact('detallesOrden','codigo','total','fechaCreacion'));
        }
    }

    /*'*'
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orden = Orden::findOrFail($id);
        $mesa_id = $orden->mesa_id;
        $mesas = Mesa::pluck('codigo_mesa','id')->toArray();
        return view('administracion.orden.edit', compact('mesas','orden','mesa_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $orden = Orden::findOrFail($id);
            $orden->mesa_id = $request->mesa_id;
            $orden->estado_servicio=$request->estado_servicio;
            $orden->update();
            return redirect()->action('OrdenController@index')->with('msj','Orden editada con exito');
        } catch (Exception $e) {
          return back()->with('msj','Hubo un error al crear la orden');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $orden=Orden::findOrFail($id);
      if($orden->estado_pago=="SIN CANCELAR"){
        $orden->delete();
      }

    return redirect()->action('OrdenController@index')->with('msj','Orden eliminada con exito');
    } catch (Exception $e) {

    }


    }


    public function historialLocal()
    {
      $ordenes = Orden::join('mesas','ordenes.mesa_id','=','mesas.id')
      ->where('ordenes.tipo_orden','=','LOCAL')
      ->where('ordenes.estado_pago','=','CANCELADA')
      ->select('ordenes.*','mesas.codigo_mesa')->get();
        return view('administracion.orden.historialLocal',compact('ordenes'));
    }

    public function historialLinea()
    {
        $ordenes = Orden::where('tipo_orden','=','EN LINEA')
        ->where('estado_servicio','=','ENTREGADA')->get();
        return view('administracion.orden.historialOLinea',compact('ordenes'));
    }

    public function pendienteLinea()
    {
        $ordenes = Orden::where('ordenes.tipo_orden','=','EN LINEA')
        ->where('ordenes.estado_servicio','=','PENDIENTE')->get();
        return view('administracion.orden.pendienteLinea',compact('ordenes'));
    }

    public function agregarDetalle($id){
        $orden =$id;
        $productos = Producto::all();
        return view('administracion.orden.agregarDetalles',compact('productos','orden'));
    }

    public function agregarDetalleStore(Request $request){
        if(!is_null($request->productos)){
            try {
                $productosObj = Producto::all();
                foreach ($productosObj as $key => $value) {
                    for ($i=0; $i < sizeof($request->productos) ; $i++) {
                        if($value->id == $request->productos[$i]){
                            $detallesObj = DetalleOrden::select('*')
                            ->where('orden_id', '=', $request->idOrden)
                            ->where('producto_id','=', $request->productos[$i])->get();
                            if(sizeof($detallesObj) !=0){
                                foreach ($detallesObj as $key => $detalleFor) {
                                    $idDetalle = $detalleFor->id;
                                }
                                $detallesObj = DetalleOrden::findOrFail($idDetalle);
                                $detallesObj->cantidad_producto+=$request[$request->productos[$i]];
                                //disminuye valor en stock del producto
                                $value->stock-=$request[$request->productos[$i]];
                                $value->update();
                                //fin

                                $detallesObj->total_parcial += $request[$request->productos[$i]]*$value->precio;
                                $detallesObj->update();
                            }else{
                                $detalle=new DetalleOrden();
                                $detalle->orden_id=$request->idOrden;
                                $detalle->producto_id=$request->productos[$i];
                                $detalle->cantidad_producto=$request[$request->productos[$i]];
                                $detalle->total_parcial = $request[$request->productos[$i]]*$value->precio;
                                if(!is_null($request[$request->productos[$i]])){
                                    $detalle->save();
                                    //disminuye valor en stock del producto
                                    $value->stock-=$request[$request->productos[$i]];
                                    $value->update();
                                    //fin
                                }else{
                                    return redirect()->back();
                                }
                            }
                        }
                    }
                }
                return redirect()->action('OrdenController@index');
            } catch (Exception $e) {
                return back()->with('msj','Hubo un error al agregar detalles a la orden');
            }
        }else{
            return redirect()->back();
        }
    }


    public function quitarDetalle($id){
      $orden=$id;
    $productos=Producto::join('detalles_orden','productos.id','=','detalles_orden.producto_id')
    ->where('detalles_orden.orden_id','=',$id)->select('productos.*')->get();
    return view('administracion.orden.quitarDetalles',compact('productos','orden'));

    }

    public function quitarDetalleStore(Request $request){

       if(!is_null($request->productos)){

         foreach($request->productos as $prod){
          $detalle=DetalleOrden::where('orden_id','=',$request->idOrden)
          ->where('producto_id','=',$prod)->get();
          $producto=Producto::findOrFail($prod);

          foreach ($detalle as $key => $detalleFor) {
              $idDetalle = $detalleFor->id;
          }//foreach para id
          $detalle = DetalleOrden::findOrFail($idDetalle);
          $sobre=$detalle->cantidad_producto - $request[$prod];

          if($sobre<0){
            return redirect()->action('OrdenController@quitarDetalle',['id'=>$request->idOrden])->with('msj','Hubo un error al quitar detalles a la orden');
          }
          if($sobre>0){
            $detalle->cantidad_producto=$sobre;
            $detalle->total_parcial=$sobre * $producto->precio;
            $producto->stock+=$request[$prod];
            $detalle->update();
            $producto->update();
          }
          if($sobre==0){
            $detalle->delete();
            $producto->stock+=$request[$prod];
            $producto->update();
            }
        } //fpreach
return redirect()->action('OrdenController@index')->with('msj','Detalles removido con exito');
}else{
  return back()->with('msj','Hubo un error al quitar detalles a la orden');
}

     }

}
