<!DOCTYPE html>
<html lang="en">
<head>
<title>Panaderia Lila- @yield('titulo')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('links')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body>

<div class="super_container">

  <!-- Header -->

  <header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
      <div class="container">
        <div class="row">
          <div class="col d-flex flex-row">
            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('OneTech/images/phone.png')}}" alt=""></div>+503 7999-5117</div>
            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('OneTech/images/mail.png')}}" alt=""></div><a href="mailto:panonline503@gmail.com">panonline503@gmail.com</a></div>
            <div class="top_bar_content ml-auto">
              <div class="top_bar_menu">
                @auth
                <ul class="standard_dropdown top_bar_dropdown">
                  <li>
                    <a href="#">Configuracion<i class="fa fa-cogs"></i></a>
                    <ul>
                      <li><a href="{{route('miperfil')}}">Perfil de Usuario</a></li>
                      <li>
                        <a href="{{route('editarPerfil',['id'=> Auth::user()->id])}}">Editar mi perfil</a>
                      </li>
                      <li><a href="{{route('misordenes')}}">Ordenes Pendientes</a></li>
                      <li>
                        <a href="{{route('cambiarPass')}}"> Cambiar Contraseña</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                @endauth
              </div>

              <div class="top_bar_user">
                <div class="user_icon"><img src="{{asset('OneTech/images/user.svg')}}" alt=""></div>
                @auth
                    @role('administrador')
                    <div>
                        <a href="{{ url('/home') }}" style="color: #000000">Panel de Administracion</a>
                    </div>
                    @else
                    <div>
                      <a style="color: #000000">{{Auth::user()->primerNombre." ".Auth::user()->primerApellido}}</a>
                    </div>
                    @endrole
                    @guest
                    @else
                      <div>
                          <a style="color: #000000" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                          </form>
                      </div>
                    @endguest
                @else
                    <div>
                        <a href="{{ route('login') }}" style="color: #000000">Iniciar Sesion</a>
                    </div>
                    @if (Route::has('register'))
                    <div>
                        <a href="{{ route('register') }}" style="color: #000000">Registrarse</a>
                    </div>
                    @endif
                @endauth








              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
      <div class="container">
        <div class="row">

          <!-- Logo -->
          <div class="col-lg-3 col-sm-3 col-3 order-1">
            <div class="logo_container">
              <div class="logo"><a style="color: #000000" href="{{ url('/') }}">Panaderia Lila</a></div>
            </div>
          </div>

          <!-- Search -->
          <div class="col-lg-5 col-12 order-lg-2 order-3 text-lg-left text-right">
            <div class="header_search">
              <div class="header_search_content">
                <div class="header_search_form_container">
                  <form action="#" class="header_search_form clearfix">
                    <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                    <div class="custom_dropdown">
                      <div class="custom_dropdown_list">
                        <span class="custom_dropdown_placeholder clc">Categorias</span>
                        <i class="fas fa-chevron-down"></i>
                        <ul class="custom_list clc">
                          @foreach($categorias as $cat)
                          <li><a class="clc" >{{$cat->nombre_categoria}}</a></li>
                            @endforeach
                              </ul>
                        </ul>
                      </div>
                    </div>
                      <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('OneTech/images/search.png')}}" alt=""></button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Wishlist -->
          <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
              <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                <div class="wishlist_icon"><img src="" alt=""></div>
                <div class="wishlist_content">
                  <div class="wishlist_text"><a href="#"></a></div>
                  <div class="wishlist_count"></div>
                </div>
              </div>

              <!-- Cart -->
              <div class="cart">
                @if(session()->has('msj'))
                  <div class="alert alert-success" role="alert">{{session('msj')}}</div>
                @endif
                @if(session()->has('msj2'))
                  <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
                @endif
                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                  <div class="cart_icon">
                    <a href="{{url('/vercarrito')}}"><img src="{{asset('OneTech/images/cart.png')}}" alt=""></a>
                    <a href="{{url('/vercarrito')}}"><div class="cart_count"><span id='conteo'>{{Session::has('carrito') ? Session::get('carrito')->cantidadTotal : '0'}}</span></div></a>
                  </div>
                  <div class="cart_content">
                    <div class="cart_text"><a href="{{url('/vercarrito')}}">Carro</a></div>
                    <div class="cart_price" id='precio'>{{Session::has('carrito') ? '$'.Session::get('carrito')->precioTotal : '$0'}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="main_nav_content d-flex flex-row">

              <!-- Categories Menu -->

              <div class="cat_menu_container">
                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                  <div class="cat_burger"><span></span><span></span><span></span></div>
                    <div class="cat_menu_text">categorias</div>
                </div>

                <ul class="cat_menu">
                  <li><a href="{{route('mostrarCategorias')}}">Ver Por Categoría <i class="fas fa-chevron-right ml-auto"></i></a></li>
                  <li><a href="{{route('mostrarProductos',['id'=>0])}}">Ver todos los productos <i class="fas fa-chevron-right ml-auto"></i></a></li>
                  @foreach($categorias as $cat)
                  <li><a href="{{route('mostrarProductos',['id'=>$cat->id])}}">{{$cat->nombre_categoria}} <i class="fas fa-chevron-right ml-auto"></i></a></li>
                  @endforeach
                </ul>
              </div>

              <!-- Main Nav Menu -->

              <div class="main_nav_menu ml-auto">
                <ul class="standard_dropdown main_nav_dropdown">
                  <li><a href="{{ url('/tienda') }}">Home<i class="fas fa-chevron-down"></i></a></li>
         <!--         <li class="hassubs">
                    <a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li>
                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                        <ul>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                      </li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                    </ul>
                  </li>
                  <li class="hassubs">
                    <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li>
                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                        <ul>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                      </li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                    </ul>
                  </li>
                  <li class="hassubs">
                    <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                      <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                    </ul>
                  </li>
                  <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>-->
                </ul>
              </div>

              <!-- Menu Trigger

              <div class="menu_trigger_container ml-auto">
                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                  <div class="menu_burger">
                    <div class="menu_trigger_text">menu</div>
                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                  </div>
                </div>
              </div>-->

            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Menu -->

    <div class="page_menu">
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="page_menu_content">

              <div class="page_menu_search">
                <form action="#">
                  <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                </form>
              </div>
               <!--
              <ul class="page_menu_nav">
                <li class="page_menu_item has-children">
                  <a href="#">Language<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li class="page_menu_item has-children">
                  <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li class="page_menu_item">
                  <a href="#">Home<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item has-children">
                  <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item has-children">
                      <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                      <ul class="page_menu_selection">
                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                      </ul>
                    </li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li class="page_menu_item has-children">
                  <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li class="page_menu_item has-children">
                  <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                  </ul>-->

              <div class="menu_contact">
                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('OneTech/images/phone_white.png')}}" alt=""></div>+38 068 005 3570</div>
                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('OneTech/images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>

  <!-- Banner -->
  @yield('content')
  <!-- Footer -->

  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 footer_col">
          <div class="footer_column footer_contact">
            <div class="logo_container">
              <div class="logo"><a href="#"></a></div>
            </div>
            <div class="footer_title"></div>
            <div class="footer_phone">+503 7777 7777</div>
            <div class="footer_contact_text">
              <p>Lourdes, La Libertad</p>
              <p>Lourdes, Colon, La Libertad,sv</p>
            </div>
            <!--<div class="footer_social">
              <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#"><i class="fab fa-google"></i></a></li>
                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
              </ul>
            </div>-->
          </div>
        </div>
        <!--
        <div class="col-lg-2 offset-lg-2">
          <div class="footer_column">
            <div class="footer_title">Find it Fast</div>
            <ul class="footer_list">
              <li><a href="#">Computers & Laptops</a></li>
              <li><a href="#">Cameras & Photos</a></li>
              <li><a href="#">Hardware</a></li>
              <li><a href="#">Smartphones & Tablets</a></li>
              <li><a href="#">TV & Audio</a></li>
            </ul>
            <div class="footer_subtitle">Gadgets</div>
            <ul class="footer_list">
              <li><a href="#">Car Electronics</a></li>
            </ul>
          </div>
        </div>

                  <div class="col-lg-2">
                    <div class="footer_column">
                      <ul class="footer_list footer_list_2">
                        <li><a href="#">Video Games & Consoles</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Computers & Laptops</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="footer_column">
                      <div class="footer_title">Customer Care</div>
                      <ul class="footer_list">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Returns / Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                      </ul>
                    </div>
                  </div>-->

      </div>
    </div>
  </footer>

  <!-- Copyright -->

  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col">

          <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
              <!-- <div class="copyright_content"> Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
</div>
            <div class="logos ml-sm-auto">
              <ul class="logos_list">
                <li><a href="#"><img src="{{asset('OneTech/images/logos_1.png')}}" alt=""></a></li>
                <li><a href="#"><img src="{{asset('OneTech/images/logos_2.png')}}" alt=""></a></li>
                <li><a href="#"><img src="{{asset('OneTech/images/logos_3.png')}}" alt=""></a></li>
                <li><a href="#"><img src="{{asset('OneTech/images/logos_4.png')}}" alt=""></a></li>
              </ul>
            </div>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@yield('javascript')
</body>
</html>
