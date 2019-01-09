@extends('layouts.base')

@section('titulo')
Agregar Producto
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
                <div class="row">
                    @if(session()->has('msj'))
                        <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                    @endif
                    @if(session()->has('msj2'))
                        <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
                    @endif
                	<div class="col-md-12">
                	    Agregar Producto
                	</div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	{{ Form::open(['route' => 'agregarProductoStore', 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off', 'files'=>true])}}

            	@include('administracion.orden.partials.formAgregarProducto')
            	{{ Form::hidden('idOrden',$orden,['class' =>'form-control']) }}
            	{{Form::close()}}
            </div>
@endsection

@section('javascript')
<script>
	function habilitarCantidad(input) {
		var idProducto = input.value;
		if (!document.getElementById(idProducto).checked) {
			document.getElementById("input"+idProducto).disabled = true;
			document.getElementById("input"+idProducto).value = "";
		}else{
			document.getElementById("input"+idProducto).disabled = false;
		}
	}
</script>
@endsection