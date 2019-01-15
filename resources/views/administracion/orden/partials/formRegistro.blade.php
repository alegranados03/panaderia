<div class="row">
	<div class="col-md-6">
		{{ Form::label('mesa_id','Mesa') }}
		{{ Form::select('mesa_id',$mesas,null,['class'=> 'form-control','placeholder' => 'Seleccione...','required']) }}
	</div>
</div>
<br/>
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
