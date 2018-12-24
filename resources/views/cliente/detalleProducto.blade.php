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


	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{$producto->imagen}}"><img src="{{$producto->imagen}}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{$producto->imagen}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<input type="hidden" name="idProd" id="idProd" value="{{$producto->id}}">
						<div class="product_category">{{$categoriaP->nombre_categoria}}</div>
						<div class="product_name">{{$producto->nombre_producto}}</div>
						<div class="product_text"><p>{{$producto->descripcion}}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Cantidad: </span>
										<input id="quantity_input" name="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->


								</div>

								<div class="product_price">{{$producto->precio}}</div>
								<div class="button_container">
					<a id="agregarV" name="agregarV" href=""><button type="button" class="button cart_button"> <i class="fa fa-shopping-cart"></i> Agregar al Carrito</button></a>
								</div>

							</form>
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

<script type="text/javascript">
$(document).ready(function(){
    $("#agregarV").click(function(){
       var x = document.getElementById('quantity_input').value;
       var y = document.getElementById('idProd').value;
       this.setAttribute("href","/agregar-varios/"+y+"/"+x);
    });
});
</script>
@endsection

