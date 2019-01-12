@extends('layouts.baseCliente')

@section('titulo')
Tienda
@endsection

@section('links')
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('OneTech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('OneTech/styles/responsive.css')}}">

@endsection
@section('content')

  <div class="banner">
    <div class="banner_background" style="background-image:url({{asset('OneTech/images/banner_background.jpg')}})"></div>
    <div class="container fill_height">
      <div class="row fill_height">
        <div class="banner_product_image"><img src="{{asset('OneTech/imagesPanaderia/banner5.png')}}" alt=""></div>
        <div class="col-lg-5 offset-lg-4 fill_height">
          <div class="banner_content">
            <h1 class="banner_text">Pan de calidad ARTESANAL</h1>
            <div class="banner_price"><span></span>Conoce nuestros precios</div>
            <div class="banner_product_name"></div>
          <!--  <div class="button banner_button"><a href="#"></a></div>-->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Characteristics -->

  <div class="characteristics">
    <div class="container">
      <div class="row">


        <div class="col-lg-3 col-md-6 char_col">

          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{asset('OneTech/images/char_1.png')}}" alt=""></div>
            <div class="char_content">
              <div class="char_title">Pedidos desde la comodidad de tu casa</div>
              <div class="char_subtitle"></div>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 char_col">

          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{asset('OneTech/images/char_2.png')}}" alt=""></div>
            <div class="char_content">
              <div class="char_title">Actualizamos nuestras recetas</div>
              <div class="char_subtitle"></div>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 char_col">

          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{asset('OneTech/images/char_3.png')}}" alt=""></div>
            <div class="char_content">
              <div class="char_title">Pago facil y rapido</div>
              <div class="char_subtitle"></div>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 char_col">

          <div class="char_item d-flex flex-row align-items-center justify-content-start">
            <div class="char_icon"><img src="{{asset('OneTech/images/char_4.png')}}" alt=""></div>
            <div class="char_content">
              <div class="char_title">Producto 100% original</div>
              <div class="char_subtitle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Deals of the week -->

  <div class="deals_featured">
      <div class="row">
        <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-center">
          <!-- Deals -->

          <!-- Featured -->
          <div class="featured">
            <div class="tabbed_container">
              <div class="tabs">
                <ul class="clearfix">
                  <li class="active">Pastelería</li>
                  <li>Pan Dulce</li>
                  <li>Bebidas</li>
                </ul>
                <div class="tabs_line"><span></span></div>
              </div>

              <!-- Product Panel -->
              <div class="product_panel panel active">
                <div class="featured_slider slider">
                  @foreach($pasteleria as $producto)
                  <!-- Slider Item -->
                  <div class="featured_slider_item">
                    <div class="border_active"></div>

                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                      <div class="product_image d-flex flex-column align-items-center justify-content-center">
                        <img src="{{$producto->imagen}}" alt="">
                      </div>
                      <div class="product_content">
                        <div class="product_price discount">{{'$'." ".$producto->precio}}</div>
                        <div class="product_name"><div><a href="product.html">{{$producto->nombre_producto}}</a></div></div>
                        <div class="product_extras">
                          <a id='add' href="{{route('agregar',['id'=>$producto->id])}}"><button class="product_cart_button">Agregar al carrito</button></a>
                        </div>
                      </div>

                    </div>
                  </div>
                  @endforeach

                </div>
                <div class="featured_slider_dots_cover"></div>
              </div>

              <!-- Product Panel -->

              <div class="product_panel panel">
                <div class="featured_slider slider">
                  @foreach($pan as $producto)
                  <!-- Slider Item -->
                  <div class="featured_slider_item">
                    <div class="border_active"></div>

                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                      <div class="product_image d-flex flex-column align-items-center justify-content-center">
                        <img src="{{$producto->imagen}}" alt="">
                      </div>
                      <div class="product_content">
                        <div class="product_price discount">{{'$'." ".$producto->precio}}</div>
                        <div class="product_name"><div><a href="product.html">{{$producto->nombre_producto}}</a></div></div>
                        <div class="product_extras">
                      <a id='add' href="{{route('agregar',['id'=>$producto->id])}}"><button class="product_cart_button">Agregar al carrito</button></a>
                        </div>
                      </div>

                    </div>
                  </div>
                  @endforeach

                </div>
                <div class="featured_slider_dots_cover"></div>
              </div>

              <!-- Product Panel -->

              <div class="product_panel panel">
                <div class="featured_slider slider">
                  @foreach($bebidas as $producto)
                  <!-- Slider Item -->
                  <div class="featured_slider_item">
                    <div class="border_active"></div>

                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                      <div class="product_image d-flex flex-column align-items-center justify-content-center">
                        <img src="{{$producto->imagen}}" alt="">
                      </div>
                      <div class="product_content">
                        <div class="product_price discount">{{'$'." ".$producto->precio}}</div>
                        <div class="product_name"><div><a href="product.html">{{$producto->nombre_producto}}</a></div></div>
                        <div class="product_extras">
                          <a id='add' href="{{route('agregar',['id'=>$producto->id])}}"><button class="product_cart_button">Agregar al carrito</button></a>
                        </div>
                      </div>

                    </div>
                  </div>
                  @endforeach


                </div>
                <div class="featured_slider_dots_cover"></div>
              </div>

            </div>
          </div>
        </div>
      </div>
  </div>



  <!-- Banner -->

  <div class="banner_2">
    <div class="banner_2_background" style="background-image:url({{asset('OneTech/images/banner_2_background.jpg')}})"></div>
    <div class="banner_2_container">
      <div class="banner_2_dots"></div>
      <!-- Banner 2 Slider -->

      <div class="owl-carousel owl-theme banner_2_slider">

        <!-- Banner 2 Slider Item -->
        <div class="owl-item">
          <div class="banner_2_item">
            <div class="container fill_height">
              <div class="row fill_height">
                <div class="col-lg-4 col-md-6 fill_height">
                  <div class="banner_2_content">
                    <div class="banner_2_category">Pan</div>
                    <div class="banner_2_title">Varidades de Pan Frances</div>

                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="button banner_2_button"><a href="#" class="btn btn-warning">Explore</a></div>
                  </div>

                </div>
                <div class="col-lg-8 col-md-6 fill_height">
                  <div class="banner_2_image_container">
                    <div class="banner_2_image"><img src="{{asset('OneTech/imagesPanaderia/pan.jpg')}}" alt=""></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Banner 2 Slider Item -->
        <div class="owl-item">
          <div class="banner_2_item">
            <div class="container fill_height">
              <div class="row fill_height">
                <div class="col-lg-4 col-md-6 fill_height">
                  <div class="banner_2_content">
                    <div class="banner_2_category">Cafe</div>
                    <div class="banner_2_title">Variedades de Cafe</div>

                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="button banner_2_button"><a href="#" class="btn btn-warning">Explore</a></div>
                  </div>

                </div>
                <div class="col-lg-8 col-md-6 fill_height">
                  <div class="banner_2_image_container">
                    <div class="banner_2_image"><img src="{{asset('OneTech/imagesPanaderia/cafe2.jpg')}}" alt=""></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Banner 2 Slider Item -->
        <div class="owl-item">
          <div class="banner_2_item">
            <div class="container fill_height">
              <div class="row fill_height">
                <div class="col-lg-4 col-md-6 fill_height">
                  <div class="banner_2_content">
                    <div class="banner_2_category">Dulce</div>
                    <div class="banner_2_title">Variedades de Pan Dulce</div>

                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="button banner_2_button"><a href="#" class="btn btn-warning">Explore</a></div>
                  </div>

                </div>
                <div class="col-lg-8 col-md-6 fill_height">
                  <div class="banner_2_image_container">
                    <div class="banner_2_image"><img src="{{asset('OneTech/imagesPanaderia/banner2.png')}}" alt=""></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Adverts -->

  <div class="adverts">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 advert_col">

          <!-- Advert Item -->

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_title"><a href="#">Trends 2018</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
            </div>
            <div class="ml-auto"><div class="advert_image"><img src="{{asset('OneTech/images/adv_1.png')}}" alt=""></div></div>
          </div>
        </div>

        <div class="col-lg-4 advert_col">

          <!-- Advert Item -->

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_subtitle">Trends 2018</div>
              <div class="advert_title_2"><a href="#">Sale -45%</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
            <div class="ml-auto"><div class="advert_image"><img src="{{asset('OneTech/images/adv_2.png')}}" alt=""></div></div>
          </div>
        </div>

        <div class="col-lg-4 advert_col">

          <!-- Advert Item -->

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_title"><a href="#">Trends 2018</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
            <div class="ml-auto"><div class="advert_image"><img src="{{asset('OneTech/images/adv_3.png')}}" alt=""></div></div>
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
<script src="{{asset('OneTech/js/custom.js')}}"></script>

@endsection
