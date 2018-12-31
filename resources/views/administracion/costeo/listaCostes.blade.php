@extends('layouts.base')

@section('titulo')
    Costeos
@endsection

@section('content')

    <div class="container">
        <h1><center>Lista de costes por Lote</center> </h1>
        <div class="row">
            <div class="col-md-2 col-sm-12" style="margin-top:1%;">
                <a href="{{route('costes.create')}}" class="btn btn-success btn-sm">
                    <span class="glyphicon glyphicon-paperclip"></span>Realizar Nuevo Costeo</a>
            </div>
        </div>
        <div class="row" id="busquedaLotes">
            {!! Form::open(['route' => 'listaCosteo', 'method' =>'GET', 'class'=>'form-group']) !!}
            <div class="input-group input-group-sm">
                {!! Form::text('busqueda',null,['class'=>'form-control','placeholder'=>'Buscar Costeos por Producto,Codigo Lote','autocomplete'=>'on']) !!}
                <span class="input-group-btn">
                <button type="submit" class="btn btn-default btn-sm" id="buscar"><span class="glyphicon glyphicon-search"></span>
                    Buscar Costeos Lotes</button>
            </span>
            </div>

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Numero de Lote</th>
                    <th>Producto</th>
                    <th>Costo Total</th>
                    <th>Fecha creacion</th>
                    <th>Accciones</th>
                </tr>
                </thead>
                <tbody>
                @if(count($costeo)>0)
                    @foreach($costeo as $coste)
                        <tr>
                            <td>{{$coste->codigoLote}}</td>
                            <td>{{$coste->producto}}</td>
                            <td>{{$coste->total}}</td>
                            <td>{{$coste->created_at}}</td>
                            <td>
                                <a href="{{route('verCosteo',['id'=>$coste->id])}}" class="btn btn-info">Ver</a>
                                <a href="{{route('editar_costeo',['id'=>$coste->id])}}" class="btn btn-warning">Editar</a>
                                <a href="{{route('eliminar_costeo',['id'=>$coste->id])}}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <h1>No existe registro</h1>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

