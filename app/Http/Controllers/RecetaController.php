<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DB;
use App\Receta;
use App\Detalle_Receta;
use App\MateriaPrima;
use Illuminate\Support\Facades\Redirect;
class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = DB::select('select receta.id,productos.nombre_producto from receta inner join productos on receta.producto_id = productos.id where receta.estado =?',[1]);
        return view('administracion.receta.lista_receta_producto',["recetas"=>$recetas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $productos = DB::select('select * from productos left join receta on productos.id = receta.productos_id where receta.productos_id is null');
       $productos = DB::select('select productos.id,productos.nombre_producto from productos left join receta on productos.id = receta.producto_id where receta.producto_id is null');
        return view('administracion.receta.lista_producto',["productos"=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = $request->get('producto_id');
        $receta = new Receta;
        $receta->producto_id = $producto;
        $receta->estado = 1;
        $receta->save();

        foreach($request->get('material') as $key => $value){
            $cantidad = $request->get('cantidad')[$key];
            if($cantidad){
                $detalle_receta = new Detalle_Receta;
                $detalle_receta->receta_id = $receta->id;
                $detalle_receta->producto_id = $producto;
                $detalle_receta->materiaPrima_id = $value;
                $detalle_receta->cantidad_individual = $cantidad;
                $detalle_receta->save();
            }
        }

        return redirect()->action('RecetaController@index')->with('msj','Receta Guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valor=Producto::findOrFail($id);
        $receta = DB::table('detalle_receta')->join('materia_prima','detalle_receta.materiaPrima_id','materia_prima.id')
        ->select('detalle_receta.*','materia_prima.*')-where('detalle_receta.productos_id','=',$id)->get();

        return view('administracion.costeo.lista_producto',["receta"=>$receta,"valor"=>$valor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receta = Receta::findOrFail($id);
        $producto = Producto::findOrFail($receta->producto_id);
        $detalle_receta = DB::table('detalle_receta')->join('materia_prima','detalle_receta.materiaPrima_id','=','materia_prima.id')
        ->select('detalle_receta.cantidad_individual','detalle_receta.id','materia_prima.nombre_materia')->where('detalle_receta.receta_id','=',$id)->get();

        return view('administracion.receta.editar',["receta"=>$receta,"detalle_receta"=>$detalle_receta,'producto'=>$producto]);
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
        $detalle_receta = Detalle_Receta::findOrFail($id);
        $idReceta = $detalle_receta->receta_id;
        $detalle_receta->cantidad_individual = $request->get('cantidad');
        $detalle_receta->update();

        return redirect()->route('editar_receta',$idReceta)->with('msj','Receta Editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receta_detalle = Detalle_Receta::findOrFail($id);
        $idReceta = $receta_detalle->receta_id;
        $receta_detalle->delete();

        return redirect()->route('editar_receta',$idReceta)->with('msj','Detalle de receta eliminada con éxito');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function mostrar_materiales($id){

        $materiales = DB::select('select * from materia_prima');
        $producto = Producto::findOrFail($id);
        return view('administracion.receta.create',["materiales"=>$materiales,'producto'=>$producto]);
    }

    public function ver_receta($id){
        $receta = Receta::findOrFail($id);
        $producto = Producto::findOrFail($receta->producto_id);
        $detalle_receta = DB::table('detalle_receta')->join('materia_prima','detalle_receta.materiaPrima_id','=','materia_prima.id')
            ->select('detalle_receta.cantidad_individual','materia_prima.nombre_materia')
            ->where('receta_id',$id)->get();
        return view('administracion.receta.show_receta',["producto"=>$producto,"detalleRec"=>$detalle_receta,'receta'=>$id]);
    }

    public function editar_detalle($id){
        $detalle = Detalle_Receta::findOrFail($id);
        $materia = MateriaPrima::findOrFail($detalle->materiaPrima_id);
        $producto = Producto::findOrFail($detalle->producto_id);
        return view('administracion.receta.editar_materia_receta',["detalle"=>$detalle,"materia"=>$materia,"producto"=>$producto]);
    }

    public function ingresar_materialX($id){
        $receta = Receta::findOrFail($id);
        $producto = Producto::findOrFail($receta->producto_id);
        //$materiales = DB::select('select materia_prima.id,materia_prima.nombre_materia from materia_prima left join detalle_receta on materia_prima.id = detalle_receta.materiaPrima_id where detalle_receta.materiaPrima_id is null and detalle_receta.receta_id=?',[$id]);
        $materiales = MateriaPrima::all();
        return view('administracion.receta.agregar_materiaX',['materiales'=>$materiales,'receta'=>$receta,'producto'=>$producto]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregarDetalleRecetaStore(Request $request){

        $idReceta = $request->get('idReceta');
        $receta = Receta::findOrFail($idReceta);
        $detalle_receta = new Detalle_Receta;
        $detalle_receta->receta_id = $idReceta;
        $detalle_receta->producto_id = $receta->producto_id;
        $detalle_receta->materiaPrima_id = $request->get('material');
        $detalle_receta->cantidad_individual = $request->get('cantidad');
        $detalle_receta->save();

        return redirect()->route('editar_receta',$receta->id)->with('msj','Detalle de receta guardada con éxito');
    }
}
