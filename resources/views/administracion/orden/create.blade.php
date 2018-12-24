@extends('layouts.base')
@section('titulo')
Crear Orden
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-12">
                	    Registrar Nueva Orden
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	{{ Form::open(['route' => 'ordenes.store', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}

            	@include('administracion.orden.partials.formRegistro')

            	{{Form::close()}}
            </div>
@endsection