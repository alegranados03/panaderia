@extends('layouts.base')
@section('titulo')
    Lista de Recetas
@endsection
@section('content')
    <div class="container">
        <center> <h2>LISTADO DE RECETAS POR PRODUCTO</h2></center>
        @if(session()->has('msj'))
            <div class="alert alert-success" role="alert">{{session('msj')}}</div>
        @endif
        @if(session()->has('msj2'))
            <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
        @endif
        <a href="{{route('recetas.create')}}" class="btn btn-success">Crear receta</a>
        <table class="table table-borderless">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @if($recetas)
            @foreach($recetas as $rec)
            <tr>
                <td>{{$rec->id}}</td>
                <td>{{$rec->nombre_producto}}</td>
                <td>
                    <a href="{{route('ver_receta',['id'=>$rec->id])}}" class="btn btn-primary">Ver</a>
                    <a href="{{route('editar_receta',['id'=>$rec->id])}}" class="btn btn-warning">Editar</a>
                </td>
            </tr>
            @endforeach
            @else
            <h2>NO HAY DATOS</h2>
            @endif
            </tbody>
        </table>
    </div>

@endsection