
<div class="row">
	<div class="col-md-3">
		{{ Form::label('primerNombre','Primer Nombre') }}
		{{ Form::text('primerNombre',null,['class'=> 'form-control','required', 'autofocus']) }}
		{!! $errors->first('primerNombre', '<p class="alert alert-danger" role="alert">:message</p>') !!}
    </div>
   	<div class="col-md-3">
		{{ Form::label('segundoNombre','Segundo Nombre') }}
		{{ Form::text('segundoNombre',null,['class'=> 'form-control']) }}
		{!! $errors->first('segundoNombre', '<p class="alert alert-danger" role="alert">:message</p>') !!}
    </div>
	<div class="col-md-3">
		{{ Form::label('primerApellido','Primer Apellido') }}
		{{ Form::text('primerApellido',null,['class'=> 'form-control','required']) }}
		{!! $errors->first('primerApellido', '<p class="alert alert-danger" role="alert">:message</p>') !!}
    </div>
	<div class="col-md-3">
		{{ Form::label('segundoApellido','Segundo Apellido') }}
		{{ Form::text('segundoApellido',null,['class'=> 'form-control']) }}
		{!! $errors->first('segundoApellido', '<p class="alert alert-danger" role="alert">:message</p>') !!}
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-3">
		{{ Form::label('email','E-Mail') }}
		{{ Form::text('email',null,['class'=> 'form-control']) }}
		{!! $errors->first('email', '<p class="alert alert-danger" role="alert">:message</p>') !!}
    </div>
		<div class="col-md-3">
		{!! Form::label('tarjeta_credito','Numero de Tarjeta:') !!}
		{{ Form::text('tarjeta_credito',null,['class'=> 'form-control','placeholder' => 'XXXX-XXXX-XXXX-XXXX']) }}
			{!! $errors->first('tarjeta_credito', '<p class="alert alert-danger" role="alert">:message</p>') !!}
			</div>


</div>
<br/>
<div class="row">
	<div class="col-md-12">
		{{ Form::label('direccion','Direccion') }}
		{{ Form::textarea('direccion',null,['class'=> 'form-control','required', 'style' => 'resize:none']) }}
		{!! $errors->first('direccion', '<p class="alert alert-danger" role="alert">:message</p>') !!}
    </div>
</div>
<br/>
<div class="row">

</div>
<div class="row pt-3">
	<div class="col-md-4">
		*Campos obligatorios
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::submit('Guardar', ['class' => 'btn btn-block btn-lg btn-success']) }}
		</div>
	</div>
</div>
