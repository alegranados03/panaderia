@extends('layouts.base')
@section('titulo')
Crear Producto
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-12">
                	    Registrar Nuevo Producto
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	{{ Form::open(['route' => 'productos.store', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}

            	@include('administracion.productos.partials.formRegistro')

            	{{Form::close()}}
            </div>
@endsection
