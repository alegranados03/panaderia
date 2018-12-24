<div class="row">
	<div class="col-md-6">
		{{ Form::label('codigo_mesa','Nombre de la Mesa') }}
		{{ Form::text('codigo_mesa',null,['class'=> 'form-control']) }}
    </div>
</div>

<br/>

<div class="row">
	<div class="col-md-12">
		{{ Form::label('capacidad_personas','capacidad de personas') }}
		{{ Form::text('capacidad_personas',null,['class'=> 'form-control','style' => 'resize:none']) }}
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
