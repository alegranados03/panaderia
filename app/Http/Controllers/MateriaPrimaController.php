<?php

namespace App\Http\Controllers;

use App\MateriaPrima;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
//use App\Http\Requests\ProductoFormRequest;
use DB;

class MateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
       $this->middleware('auth');
       $this->middleware('has.permission:gestionar_materia');
     }

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('busqueda'));
            $materiales=MateriaPrima::where('nombre_materia','LIKE','%'.$query.'%')
            ->orderBy('id','DESC')
            ->paginate(7);
            return view('materiaPrima.listarMateria',["materia_prima"=>$materiales]);
    }}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MateriaPrima.registroMaterial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $materia_prima=new MateriaPrima($request->all());
            $materia_prima->save();
            return redirect()->action('MateriaPrimaController@index',["materia_prima"=>$materia_prima->id])->with('msj','Material ingresado con exito');
          }catch(Exception $e)
            {

          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MateriaPrima  $materiaPrima
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $materia_prima=MateriaPrima::findOrFail($id);
        return view('materiaPrima.perfilMaterial',compact('materia_prima'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MateriaPrima  $materiaPrima
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia_prima=MateriaPrima::findOrFail($id);
        return view('materiaPrima.editarMaterial',compact('materia_prima'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MateriaPrima  $materiaPrima
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre_materia'=>'string|max:100',
            'costo_adquisicion'=>'required|numeric|between:0,100000.99',
            'cantidad'=>'required|Integer',

          ]);

            try{
                $materia_prima=MateriaPrima::findOrFail($id);
                $materia_prima->nombre_materia=$request->nombre_materia;
                $materia_prima->costo_adquisicion=$request->costo_adquisicion;
                $materia_prima->cantidad=$request->cantidad;
                $materia_prima->save();
              return redirect()->action('MateriaPrimaController@show',['id' =>$materia_prima->id])->with('msj','Material actualizado con exito');
              }catch(Exception $e){
                return back()->with('msj2','material no editado,revise los datos proporcionados');
              }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MateriaPrima  $materiaPrima
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia_prima=MateriaPrima::find($id);
           $materia_prima->delete();
           return Redirect::to('materiaPrima');
    }
}
