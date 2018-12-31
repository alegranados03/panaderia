@extends('layouts.base')
@section('titulo')
    Ver Costeo
@endsection
@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Producto</th>
            <th>Codigo Lote</th>
            <th>Total</th>
            <th>Fecha creacion</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$lote2->producto}}</td>
            <td>{{$lote2->codigoLote}}</td>
            <td>{{$lote2->total}}</td>
            <td>{{$lote2->created_at}}</td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>Mano de obra</th>
            <th>Suma de materiales</th>
            <th>Tasa CIF</th>
            <th>Importe</th>
            <th>Cantidad de unidades</th>
        </tr>
        </thead>
        <tbody>
        @foreach($detalle as $det)
        <tr>
            <td>{{$det->sub_total_MO}}</td>
            <td>{{$det->suma_materiales}}</td>
            <td>{{number_format($det->tasa_cif,2,'.',',')}}</td>
            <td>{{$det->importe}}</td>
            <td>{{$det->cantidad_unidades}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection