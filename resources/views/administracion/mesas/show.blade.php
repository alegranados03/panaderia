@extends('layouts.base')

@section('titulo')
Detalle Categoría
@endsection

@section('content')
{{ Form::model($mesa,['route' => ['mesas.update',$mesa->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off' ])}}
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('codigo_mesa','Nombre de la Mesa') }}
			{{ Form::text('codigo_mesa',null,['class'=> 'form-control', 'disabled']) }}
	    </div>
	</div>

	<br/>

	<div class="row">
		<div class="col-md-3">
			{{ Form::label('capacidad_personas','capacidad de personas') }}
			{{ Form::number('capacidad_personas',null,['class'=> 'form-control', 'disabled']) }}
	    </div>
	</div>
	<br/>
{{ Form::close() }}

@include('administracion.orden.tablaOrden')
@endsection
