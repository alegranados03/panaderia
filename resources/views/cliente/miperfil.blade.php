@extends('layouts.baseCliente')

@section('titulo')
Mi Perfil
@endsection

@section('links')
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('OneTech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/cart_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="single_product" style="margin-top: 2%">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				{!! Form::label('primerNombre','Primer Nombre') !!}
				{!! Form::text('primerNombre',Auth::user()->primerNombre,['class'=> 'form-control','readonly','style' => 'color:black;']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('segundoNombre','Segundo Nombre') !!}
				{!! Form::text('segundoNombre',Auth::user()->segundoNombre,['class'=> 'form-control','readonly','style' => 'color:black;']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('primerApellido','Primer Apellido') !!}
				{!! Form::text('primerApellido',Auth::user()->primerApellido,['class'=> 'form-control','readonly','style' => 'color:black;']) !!}
			</div>
			<div class="col-md-3">
			{!! Form::label('segundoApellido','Segundo Apellido') !!}
			{!! Form::text('segundoApellido',Auth::user()->segundoApellido,['class'=> 'form-control','readonly','style' => 'color:black;']) !!}
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3">
				{!! Form::label('email','E-Mail') !!}
				{!! Form::text('email',Auth::user()->email,['class'=> 'form-control','readonly','style' => 'color:black;']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('username','Usuario') !!}
				{!! Form::text('username',Auth::user()->username,['class'=> 'form-control','readonly','style' => 'color:black;']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('direccion','Direccion') !!}
				{!! Form::text('direccion',Auth::user()->direccion,['class'=> 'form-control','readonly', 'style' => 'color:black']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('tarjeta_credito','Numero de Tarjeta') !!}			
				{!! Form::text('tarjeta_credito',Auth::user()->tarjeta_credito,['class'=> 'form-control','readonly', 'style' => 'color:black']) !!}
			</div>
		</div>
		<br/>
		<br/>
		<div class="row">
			<div class="col-md-12" align="center">
				<h3>Mis Ordenes</h3>
			</div>
			<div class="col-md-12">
				@include('cliente.tablaOrden')
			</div>
		</div>
	</div>
	<br/>
</div>
@endsection

@section('javascript')
<script src="{{asset('OneTech/js/jquery-3.3.1.min.js')}}"></script>

<script src="{{asset('OneTech/styles/bootstrap4/popper.js')}}"></script>

<script src="{{asset('OneTech/styles/bootstrap4/bootstrap.min.js')}}"></script>

<script src="{{asset('OneTech/plugins/greensock/TweenMax.min.js')}}"></script>

<script src="{{asset('OneTech/plugins/greensock/TimelineMax.min.js')}}"></script>

<script src="{{asset('OneTech/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>

<script src="{{asset('OneTech/plugins/greensock/animation.gsap.min.js')}}"></script>

<script src="{{asset('OneTech/plugins/greensock/ScrollToPlugin.min.js')}}"></script>

<script src="{{asset('OneTech/plugins/easing/easing.js')}}"></script>

<script src="{{asset('OneTech/js/cart_custom.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true,
        language:{
                url : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
});
</script>
@endsection