@extends('layouts.base')

@section('titulo')
    Crear costeo
@endsection

@section('content')
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Nombre producto</th>

            <th>Descripcion</th>
        </tr>
        </thead>
        <tbody>
        @if(count($productos)>0)
            @foreach($productos as $produc)
                <tr>
                    <td><a href="{{route('costes.show',$produc->id)}}">{{$produc->nombre_producto}}</a></td>
                    <td>{{$produc->descripcion}}</td>

                </tr>
            @endforeach
        @else
            <h1>No existe registro</h1>
        @endif
        </tbody>
    </table>


@endsection

