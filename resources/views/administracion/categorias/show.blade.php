@extends('layouts.base')

@section('titulo')
Detalle Categoría
@endsection

@section('content')
{{ Form::model($categoria,['route' => ['categorias.update',$categoria->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off' ])}}
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('nombre_categoria','Nombre de la Categoria') }}
			{{ Form::text('nombre_categoria',null,['class'=> 'form-control', 'disabled']) }}
	    </div>
	</div>

	<br/>
	<div class="col-md-12">
		{{ Form::label('imagen','Imagen de Categoria') }}
		<br/>
		<img src="{{$categoria->imagen}}" height="300px" width="300px">
		</div>
	<br/>

	<div class="row">
		<div class="col-md-12">
			{{ Form::label('descripcion','Descripción') }}
			{{ Form::textarea('descripcion',null,['class'=> 'form-control','style' => 'resize:none', 'disabled']) }}
	    </div>
	</div>
	<br/>
{{ Form::close() }}
@endsection
