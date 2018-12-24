@extends('layouts.base')

@section('titulo')
Historial de Ordenes Local
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-1">
                	</div>
                	<div class="col-md-9">
                	    Lista de Ordenes
                	</div>
                	<div class="col-md-2">
                		<a class="btn btn-primary" href="{{route('ordenes.create')}}">
                			<i class="fa fa-book"><i class="fa fa-plus" style="font-size: 5px"></i></i> Crear Orden
                		</a>
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	@include('administracion.orden.tablaOrdenHLo')
            </div>
        </div>
@endsection
