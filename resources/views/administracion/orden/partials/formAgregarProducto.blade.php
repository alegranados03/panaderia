@include('administracion.orden.partials.tablaAgregarDetalles')
<div class="row pt-3">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::submit('Guardar', ['class' => 'btn btn-block btn-lg btn-success']) }}
		</div>
	</div>
</div>
