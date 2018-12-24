@extends('layouts.base')

@section('titulo')
Usuarios
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-1">
                	</div>
                	<div class="col-md-9">
                	    Lista de Usuarios                		
                	</div>                	
                	<div class="col-md-2">
                		<a class="btn btn-primary" href="{{route('usuarios.create')}}">
                			<i class="fa fa-user-plus"></i> Crear Usuario
                		</a>
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	@include('administracion.usuarios.tablaUsuarios')
            </div>
@endsection