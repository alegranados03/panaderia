@extends('layouts.base')
@section('titulo')
    Editar Recetas
@endsection
@section('content')
    <div class="container">
        <center><h2>{{$producto->nombre_producto}}</h2></center>
        {{ Form::model($receta,['route' => ['recetas.insertar_mx',$receta->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}
        <div class="form-group">
            <label>Numero de receta:<input type="number" value="{{$receta->id}}"></label>
        </div>
        <div class="form-group">
            <label>
                Seleccione material:
                <select name="material" class="">
                    @foreach($materiales as $materia)
                        <option value="{{$materia->id}}">{{$materia->nombre_materia}}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>
                Cantidad invividual:
                <input type="number" step="any" name="cantidad">
            </label>
        </div>
        {{Form::close()}}
    </div>
@endsection