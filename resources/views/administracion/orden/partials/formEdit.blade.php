
<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		{{ Form::label('mesa_id','Mesa') }}
		{{ Form::select('mesa_id',$mesas,null,['class'=> 'form-control','placeholder' => 'Seleccione...','required']) }}
		{{ Form::label('estado_servicio','Mesa') }}
		{{ Form::select('estado_servicio',['PENDIENTE'=>'PENDIENTE','ENTREGADA'=>'ENTREGADA'],null,['class'=> 'form-control','placeholder' => 'Seleccione...','required']) }}
	</div>
</div>
<br/>
<div class="row pt-3">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::submit('Guardar', ['class' => 'btn btn-block btn-lg btn-success']) }}
		</div>
	</div>
</div>
