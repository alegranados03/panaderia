@extends('layouts.base')
@section('titulo')
    Editar Recetas
@endsection
@section('content')

    <div class="container">
        <center> <h2>Editar Receta de Producto:<strong>{{$producto->nombre_producto}}</strong> </h2></center>
        <a class="btn btn-success" href="{{route('mostrar_materiales_xtras',['id'=>$receta->id])}}">Agregar material</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Material</th>
                <th>Cantidad</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detalle_receta as $rec)
            <tr>
                <td>{{$rec->nombre_materia}}</td>
                <td>{{$rec->cantidad_individual}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('editar_receta_detalle',['id'=>$rec->id])}}">Editar</a>
                    <a href="{{route('eliminar_receta_detalle',['id'=>$rec->id])}}" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
             @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="container">
                <a class="btn btn-default" href="{{route('recetas.index')}}">Terminar</a>
            </div>
        </div>
    </div>
@endsection