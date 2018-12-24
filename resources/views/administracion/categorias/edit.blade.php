@extends('layouts.base')
@section('titulo')
Usuarios
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-12">
                	    Editar Categoría
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
        {{ Form::model($categoria,['route' => ['categorias.update',$categoria->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off','files'=>true ])}}

            	@include('administracion.categorias.partials.formRegistro')

            	{{Form::close()}}
            </div>
@endsection
