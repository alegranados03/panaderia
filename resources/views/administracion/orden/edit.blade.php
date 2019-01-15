@extends('layouts.base')

@section('titulo')
Editar Orden
@endsection

@section('content')

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-12">
                	    Editar Orden
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	{{ Form::model($orden,['route' => ['ordenes.update',$orden->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off' ])}}

            	@include('administracion.orden.partials.formEdit')

            	{{Form::close()}}
            </div>

@endsection