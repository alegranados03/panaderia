@extends('layouts.base')

@section('titulo')
Pagar Orden
@endsection

@section('content')

<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                	<div class="col-md-12">
                	    Ingresar Pago
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	{{ Form::open(['route' => ['pagoLocal',$orden], 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off' ])}}

            	@include('administracion.orden.partials.formAgregarPago')

            	{{Form::close()}}
            </div>
        </div>
</div>
@endsection


@section('javascript')
<script>
$(document).ready(function(){
    $("#cosa").click(function(){
    	document.getElementById('cantidadRecibida').style.display = "block";
    	document.getElementById('cantidadRecibida2').style.display = "block";
    	document.getElementById('cantidadCambio').style.display = "block";
    	document.getElementById('cantidadCambio2').style.display = "block";
    	document.getElementById('campoTarjeta').style.display = "none";
    	document.getElementById('campoTarjeta2').style.display = "none";
    	$("#cantidadRecibida2").attr('required', '');
      $("#campoTarjeta2").removeAttr('required');
        $("#cosa2").prop('checked',false);
        $("#cosa").prop('disabled',true);
        $("#cosa2").prop('disabled',false);

    });
    $("#cosa2").click(function(){
    	document.getElementById('cantidadRecibida').style.display = "none";
    	document.getElementById('cantidadRecibida2').style.display = "none";
    	document.getElementById('cantidadCambio').style.display = "none";
    	document.getElementById('cantidadCambio2').style.display = "none";
    	document.getElementById('campoTarjeta').style.display = "block";
    	document.getElementById('campoTarjeta2').style.display = "block";
      $("#campoTarjeta2").attr('required','');
      $("#cantidadRecibida2").removeAttr('required');

        $("#cosa").prop('checked',false);
        $("#cosa2").prop('disabled',true);
        $("#cosa").prop('disabled',false);

    });
    $("#cosa").prop('checked',true);
    $("#cosa").prop('disabled',true);
    $("#cantidadRecibida2").attr('required', '');
});
</script>
<script>
	$(document).ready(function(){
    $("#cantidadRecibida2").change(function(){
    	var recibido = document.getElementById('cantidadRecibida2').value;
    	var total = document.getElementById('total_cancelar').value;
    	document.getElementById('cantidadCambio2').value = recibido-total;
    });
});
</script>
@endsection
