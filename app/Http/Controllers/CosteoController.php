<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Costeo;
use App\Producto;
use App\DetalleLote;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;
class CosteoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('busqueda'));
            $costeo = Costeo::where('producto','LIKE','%'.$query.'%')->where('estado','=',1)
            ->orWhere('codigoLote')
            ->orderBy('id','producto')
            ->paginate(7);
          return view('administracion.costeo.listaCostes',["costeo"=>$costeo]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('administracion.costeo.crear',["productos"=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$lote = Costeo::create(['producto'=>$request->get('producto'),'codigoLote'=>$request->get('codigoLote'),'total'=>$request->get('total')]);
        $lote = new Costeo;
        $lote->producto = $request->get('producto');
        $lote->codigoLote = $request->get('codigoLote');
        $lote->total = $request->get('total');
        $lote->save();
        $lote2 = DB::select('select LAST_INSERT_ID() from lote');
        $detalleLote = new DetalleLote;
        $detalleLote->id_lote = $lote->id;
        $detalleLote->numero_obreros =$request->get('obreros');
        $detalleLote->numero_horas = $request->get('horas');
        $detalleLote->precio_hora = $request->get('phora');
        $detalleLote->sub_total_MO = $request->get('subtotal');
        $detalleLote->suma_materiales = $request->get('suma_materiales');
        $detalleLote->tasa_cif = $request->get('tasa');
        $detalleLote->importe = $request->get('importe');
        $detalleLote->cantidad_unidades = $request->get('cantidad');
        $detalleLote->save();

        return redirect()->action('CosteoController@index')->with('msj','Costeo agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valor2=Producto::findOrFail($id);
        $receta = DB::select('select receta.*,productos.*,materia_prima.* from productos inner join receta on productos.id = receta.producto_id inner join materia_prima on receta.materiaPrima_id= materia_prima.id where producto_id=?',[$id]);
        $fecha = Carbon::now();
        $fecha =$fecha->format('d-m-y');

        try{
            $lote = DB::select('select LAST_INSERT_ID() from lote');
            $obtener = DB::select('select * from lote where id=?',[$lote]);
            $dato = $obtener->codigoLote;
            $dato = $dato + 1;
        }catch (\Exception $e){
            $dato = 1;
        }

        $materiales = 0;
        foreach ($receta as $recetas){
            $materiales += $recetas->cantidad_individual*number_format((($recetas->costo_adquisicion / $recetas->cantidad)),2,'.',',');
        }
        return view('administracion.costeo.hojaCosteo',compact('receta'),['fecha'=>$fecha,'valor2'=>$valor2,'orden'=>$dato,'materiales'=>$materiales]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lote = Costeo::findOrFail($id);
        $detalleLote = DetalleLote::where('id_lote','=',$lote->id)->first();
        return view('administracion.costeo.editar_hojaCosteo',['lote'=>$lote,'detalle'=>$detalleLote]);
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
        $lote = Costeo::findOrFail($id);
        $detalleLote = DetalleLote::where('id_lote','=',$lote->id)->first();

        $lote->total = $request->get('total');
        $lote->update();

        $detalleLote->numero_obreros =$request->get('obreros');
        $detalleLote->numero_horas = $request->get('horas');
        $detalleLote->precio_hora = $request->get('phora');
        $detalleLote->sub_total_MO = $request->get('subtotal');
        $detalleLote->tasa_cif = $request->get('tasa');
        $detalleLote->importe = $request->get('importe');
        $detalleLote->cantidad_unidades = $request->get('cantidad');
        $detalleLote->update();

        return redirect()->action('CosteoController@index')->with('msj','Costeo editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$lote = DB::select('select lote.*,detalle_lote.* from lote inner join detalle_lote on detalle_lote.id_lote = lote.id where lote.id=?',[$id]);
        $lote = Costeo::findOrFail($id);
        $detalleLote = DB::table('detalle_lote')->where('id_lote','=',$lote->id)->get();
        return view('administracion.costeo.ver_costo',['lote2'=>$lote,'detalle'=>$detalleLote]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id){
        $lote = Costeo::findOrFail($id);
        $lote->estado = 0;
        $lote->save();

        return redirect()->action('CosteoController@index')->with('msj','Costeo eliminado con éxito');
    }

    
}
