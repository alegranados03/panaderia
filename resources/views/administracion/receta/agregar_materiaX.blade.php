@extends('layouts.base')
@section('titulo')
    Editar Recetas
@endsection
@section('content')
    <div class="container">
        <center><h2>{{$producto->nombre_producto}}</h2></center>
        {{ Form::open(['route' => 'insertarmxStore', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}
        <div class="form-group">
            <label>Numero de receta:<input type="number" value="{{$receta->id}}" name="idReceta"></label>
        </div>
        <div class="form-group">
            <label>
                Seleccione material:
                <select name="material" class="">
                    <option value="">-------</option>
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
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-danger" href="">Cancelar</a>
        {{Form::close()}}
    </div>
@endsection