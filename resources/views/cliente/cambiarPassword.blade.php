@extends('layouts.baseCliente')

@section('titulo')
Cambiar Contraseña
@endsection

@section('links')
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('OneTech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/plugins/slick-1.8.0/slick.css')}}">
@endsection

@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
    	<div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
    	  <div class="row">
    	    <div class="col-md-1">
    	    </div>
    	    <div class="col-md-10" style="margin-bottom:5%" align='center'>
    	      Cambiar Contraseña
    	    </div>

    	  </div>
    	</div>
    	<div class="panel-body" align='center'>

@include('administracion.usuarios.partials.formCambioPass')

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
<script src="{{asset('OneTech/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('OneTech/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('OneTech/plugins/easing/easing.js')}}"></script>
<script src="{{asset('OneTech/js/product_custom.js')}}"></script>
@endsection
