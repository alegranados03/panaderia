@extends('layouts.base')

@section('titulo')
Productos
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-1">
                	</div>
                	<div class="col-md-9">
                	    Lista de Mesas
                	</div>
                	<div class="col-md-2">
                		<a class="btn btn-primary" href="{{route('mesas.create')}}">
                			<i class="fa fa-list"> <i class="fa fa-plus" style="font-size: 10px"></i></i> Crear Mesa
                		</a>
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	@include('administracion.mesas.tablaMesas')
            </div>
@endsection
