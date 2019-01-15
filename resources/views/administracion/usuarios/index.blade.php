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
					@if(session()->has('msj'))
						<div class="alert alert-success" role="alert">{{session('msj')}}</div>
					@endif
					@if(session()->has('msj2'))
						<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
					@endif
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