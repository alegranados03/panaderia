{{ Form::hidden('idOrden',$orden,['class'=>'form-control'])}}
<div class="row">
	<div class="col-md-6">
		{{ Form::label('tipo_pago','Tipo de Pago:') }}
		<br/>
		<label for="tipo_pago">Efectivo</label>
		{{ Form::checkbox('cosa', '1', false, ['id'=> 'cosa'] )}}
		<label for="tipo_pago">Tarjeta de Credito</label>
		{{ Form::checkbox('cosa2', '2', false, ['id'=> 'cosa2'] )}}
	</div>
</div>
<br/>
<div class="row">
	<div class="col-md-3">
		{{ Form::label('recibido','Cantidad Recibida:',['id' => 'cantidadRecibida']) }}
		{{ Form::number('recibido2',null,['class' => 'form-control','min' =>'0.01','step' => '0.01','id'=>'cantidadRecibida2'])}}
		{!! $errors->first('recibido2', '<p class="alert alert-danger" role="alert">:message</p>') !!}
	</div>
</div>
<br/>
<div class="row">
	<div class="col-md-3">
		{{ Form::label('cambio','Cambio:',['id' => 'cantidadCambio']) }}
		{{ Form::number('cambio',null,['class' => 'form-control','min' =>'0.01','step' => '0.01','readonly','id' => 'cantidadCambio2'])}}
	</div>
</div>
<br/>
<div class="row">
	<div class="col-md-3">
		{{ Form::label('tarjeta_credito','No de Tarjeta:',['id' => 'campoTarjeta','style' =>'display:none']) }}
		{{ Form::text('tarjeta_credito2',null,['class'=>'form-control','id' => 'campoTarjeta2','placeholder' => 'XXXX-XXXX-XXXX-XXXX','style' =>'display:none']) }}
		{!! $errors->first('tarjeta_credito2', '<p class="alert alert-danger" role="alert">:message</p>') !!}
	</div>
</div>
<br/>
<div class="row">
	<div class="col-md-3">
		{{ Form::label('total_cancelar','Total a Cancelar:') }}
		{{ Form::number('total_cancelar',$total,['class' => 'form-control','min' =>'0.01','step' => '0.01','readonly','id' => 'total_cancelar'])}}
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
