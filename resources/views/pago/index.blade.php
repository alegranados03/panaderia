@extends('layouts.baseCliente')

@section('titulo')
Pago
@endsection

@section('links')
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('OneTech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/cart_responsive.css')}}">
@endsection

@section('content')
	<div class="single_product" style="margin-top: 2%">
		<div class="container">
			<div class="row">
				@if(session()->has('msj'))
					<div class="alert alert-success" role="alert">{{session('msj')}}</div>
				@endif
				@if(session()->has('msj2'))
					<div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
				@endif
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
				@if(is_null(Auth::user()->tarjeta_credito))
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
					  Añadir Tarjeta de Credito
					</button>
					{{ Form::open(['route' => ['asignarTarjeta','id'=> Auth::user()->id], 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off' ])}}
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h3 class="modal-title" id="exampleModalLabel">Asociar Tarjeta</h3>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	<div class="row">
					      		<div class="col-md-5">
					      			{!! Form::label('tarjeta_credito','Numero de Tarjeta:',['class'=>'form-control','style'=> 'color:black']) !!}
					      		</div>
					      		<div class="col-md-7">
					      			{{ Form::text('tarjeta_credito',null,['class'=> 'form-control','placeholder' => 'XXXX-XXXX-XXXX-XXXX']) }}
					      		</div>
					      	</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <button class="btn btn-success" type="submit">Guardar Cambios</button>
					      </div>
					    </div>
					  </div>
					</div>
	            	{{Form::close()}}
				@else
				{!! Form::text('tarjeta_credito',Auth::user()->tarjeta_credito,['class'=> 'form-control','readonly', 'style' => 'color:black']) !!}
				@endif
		    </div>
		</div>
	<br/>
<a class="btn btn-md btn-primary" href="{{route('vistapaypal')}}">Pagar con PayPal</a>
		@if(!is_null(Auth::user()->tarjeta_credito))
	    <!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
		  Efectuar Pago
		</button>
		@endif
		{{ Form::open(['route' => ['pagos.store'], 'method' => 'POST','class' => 'form-group', 'autocomplete' => 'off' ])}}
        <!-- Modal -->
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Efectuar Pago</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Esta Seguro?<br/> Al momento de dar click a 'Si' no se podra marcha atras con la operacion
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		        <button type="submit" class="btn btn-success" >Si</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
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
@endsection
