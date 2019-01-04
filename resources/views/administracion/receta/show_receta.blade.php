@extends('layouts.base')
@section('titulo')
    Lista de productos
@endsection
@section('content')
    <div class="container">
        <center> <h2>Numero de Receta:<strong>{{$receta}}</strong></h2></center>
       <center> <h4>Receta de producto:<strong>{{$producto->nombre_producto}}</strong></h4></center>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>Material</th>
                <th>Cantidad individual</th>

            </tr>
            </thead>
            <tbody>
            @foreach($detalleRec as $detalle)
            <tr>
                <td>{{$detalle->nombre_materia}}</td>
                <td>{{$detalle->cantidad_individual}}</td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection