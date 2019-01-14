@extends('layouts.baseCliente')

@section('titulo')
Detalle del Producto
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
        <div class="col-md-11" style="margin-bottom:5%">
          Lista de Categorias
        </div>

      </div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
      <div class="panel panel-default">
        <div class="panel-heading" align="center" style="font-size: 30px;font-weight: bold;">
          <div class="row">
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">

            <div class="row">
              @foreach($categorias as $cat)
              <div class="col-md-3">
                <div class="card" style="width: 18rem;margin-bottom:5%">
                  @if($cat->imagen==null)
                  <img class="card-img-top" src="{{asset('img/Hersheys.jpg')}}" alt="Card image cap">
                  @else
                  <img class="card-img-top" src="{{asset('img/Hersheys.jpg')}}" alt="Card image cap">
                  @endif
                  <div class="card-body">
                    <h5 class="card-title">{{$cat->nombre_categoria}}</h5>
                    <p class="card-text" style="text-align: justify;">{{$cat->descripcion}}</p>
                    <a href="{{route('mostrarProductos',['id'=>$cat->id])}}" class="btn btn-primary"><i class="fa fa-list"></i> Ver los productos</a>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
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
<script src="{{asset('OneTech/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('OneTech/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('OneTech/plugins/easing/easing.js')}}"></script>
<script src="{{asset('OneTech/js/product_custom.js')}}"></script>
@endsection
