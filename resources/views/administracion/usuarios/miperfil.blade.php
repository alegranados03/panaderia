@extends('layouts.base')

@section('titulo')
Detalle Usuario
@endsection

@section('content')
{{ Form::model(Auth::user(),['route' => ['usuarios.update',Auth::user()->id], 'method' => 'PUT','class' => 'form-group', 'autocomplete' => 'off' ])}}
	<div class="row">
		<div class="col-md-3">
			{!! Form::label('primerNombre','Primer Nombre') !!}
			{!! Form::text('primerNombre',null,['class'=> 'form-control','readonly']) !!}
	    </div>
	   	<div class="col-md-3">
			{!! Form::label('segundoNombre','Segundo Nombre') !!}
			{!! Form::text('segundoNombre',null,['class'=> 'form-control','readonly']) !!}
	    </div>
		<div class="col-md-3">
			{!! Form::label('primerApellido','Primer Apellido') !!}
			{!! Form::text('primerApellido',null,['class'=> 'form-control','readonly']) !!}
	    </div>
		<div class="col-md-3">
			{!! Form::label('segundoApellido','Segundo Apellido') !!}
			{!! Form::text('segundoApellido',null,['class'=> 'form-control','readonly']) !!}
	    </div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-3">
			{!! Form::label('sexo','Sexo') !!}
			{!! Form::select('sexo',['M' => 'Masculino', 'F' => 'Femenino'],null,['class'=> 'form-control','readonly']) !!}
	    </div>
	    <div class="col-md-3">
			{!! Form::label('email','E-Mail') !!}
			{!! Form::text('email',null,['class'=> 'form-control','readonly']) !!}
	    </div>
		<div class="col-md-3">
			{!! Form::label('username','Usuario') !!}
			{!! Form::text('username',null,['class'=> 'form-control','readonly']) !!}
	    </div>
	    <div class="col-md-3">
			{!! Form::label('direccion','Direccion') !!}
			{!! Form::text('direccion',null,['class'=> 'form-control','readonly', 'style' => 'resize:none']) !!}
	    </div>

			<div class="col-md-3">
			{!! Form::label('tarjeta_credito','Numero de Tarjeta:') !!}
			{{ Form::text('tarjeta_credito',null,['class'=> 'form-control','placeholder' => 'XXXX-XXXX-XXXX-XXXX','readonly']) }}
				</div>

	</div>
	<br/>
{{Form::close()}}
@endsection
