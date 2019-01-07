<div class="row">
	<div class="col-md-6">
		{{ Form::label('nombre_categoria','Nombre de la Categoria') }}
		{{ Form::text('nombre_categoria',null,['class'=> 'form-control','required', 'autofocus']) }}
		{!! $errors->first('nombre_categoria', '<p class="alert alert-danger" role="alert">:message</p>') !!}
    </div>
</div>

<br/>
<div class="row">
<div class="col-md-6">
	{{ Form::label('imagen','Imagen del Producto') }}
	{{ Form::file('imagen') }}
	{!! $errors->first('imagen', '<p class="alert alert-danger" role="alert">:message</p>') !!}
	</div>
	</div>
<br/>
<div class="row">
	<div class="col-md-12">
		{{ Form::label('descripcion','Descripción') }}
		{{ Form::textarea('descripcion',null,['class'=> 'form-control','required', 'style' => 'resize:none']) }}
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
