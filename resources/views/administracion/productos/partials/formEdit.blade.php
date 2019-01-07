<div class="row">
	<div class="col-md-6">
		{{ Form::label('nombre_producto','Nombre del Producto') }}
		{{ Form::text('nombre_producto',null,['class'=> 'form-control','required', 'autofocus']) }}
		{!! $errors->first('nombre_producto', '<p class="alert alert-danger" role="alert">:message</p>') !!}
    </div>
</div>
<div class="row">
<div class="col-md-6">
	{{ Form::label('precio','Precio') }}
	{{ Form::number('precio',null,['class'=> 'form-control','required', 'autofocus','step' => '0.01']) }}
	{!! $errors->first('precio', '<p class="alert alert-danger" role="alert">:message</p>') !!}
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
		{{ Form::label('categoria_id','Tipo de Producto') }}
		{{ Form::select('categoria_id',$categorias,null,['class'=> 'form-control','required']) }}
		</div>
		</div>
	<div class="row">
	<div class="col-md-6">
		{{ Form::label('imagen','Imagen del Producto') }}
		{{ Form::file('imagen') }}
		{!! $errors->first('imagen', '<p class="alert alert-danger" role="alert"">:message</p>') !!}
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
