<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Costeo;
use App\Producto;
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
            $costeo = Costeo::where('producto','LIKE','%'.$query.'%')
            ->orWhere('codigoLote')
            ->orderBy('id','producto')
            ->paginate(7);
          return view('costeo.lista',["costeo"=>$costeo]);
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
        return view('costeo.Crear_Editar',["productos"=>$productos]);
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
    {   
        $valor2=Producto::findOrFail($id);
        $query = DB::select('select * from receta where producto_id=?',[$id]);
        $fecha = Carbon::now();
        $fecha =$fecha->format('d-m-y');

        return view('costeo.hojaCosteo',['receta'=>$query,'valor2'=>$valor2,'fecha'=>$fecha]);
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

    
}
