@extends('layouts.base')
@section('titulo')
    Lista de productos
@endsection
@section('content')
    <div class="container">
        <center> <h2>Producto por asignarle receta</h2></center>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre de Producto</th>
            </tr>
            </thead>
            <tbody>
            @if($productos)
                @foreach($productos as $pro)
            <tr>
                <td>{{$pro->id}}</td>
                <td>
                   <a href="{{route('materiales_mostrar',['id'=>$pro->id])}}"> {{$pro->nombre_producto}}</a></td>
            </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection