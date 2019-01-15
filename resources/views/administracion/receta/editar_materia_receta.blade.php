@extends('layouts.base')
@section('titulo')
    Editar Recetas
@endsection
@section('content')
    <center><h2>{{$producto->nombre_producto}}</h2></center>
    {{ Form::model($detalle,['route' => ['recetas.update',$detalle->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}
        <div class="row">
            <div class="form-group">
                <input class="form-control" value="{{$materia->nombre_materia}}" disabled>
            </div>
            <div class="form-group">
                <input value="{{$detalle->cantidad_individual}}" name="cantidad" step="any">
            </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    {{Form::close()}}
@endsection