<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panaderia Lila-Bienvenid@</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('js/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/agency.min.css')}}" rel="stylesheet">


  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <img class="img-fluid" src="img/logo.png" width="70px" height="70px">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
          <label style="font-size: 60px">Pan</label><label style="font-size: 60px">aderia</label> <label style="font-size: 60px"> Lila</label>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services" style="color: #FFFFFF;font-size: 20px;font-weight: bold;">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio" style="color: #FFFFFF;font-size: 20px;font-weight: bold;">Nuestros Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/tienda') }}" style="color: #FFFFFF;font-size: 20px;font-weight: bold;">Tienda</a>
            </li>
                @auth
                    @role('administrador')
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}" style="color: #FFFFFF;font-size: 20px;font-weight: bold;">Panel de Administracion</a>
                    </li>
                    @else
                    <li class="nav-item">
                      <a href="{{route('miperfil')}}" class="nav-link js-scroll-trigger" style="color: #FFFFFF;font-size: 20px;font-weight: bold;">{{Auth::user()->primerNombre." ".Auth::user()->primerApellido}}</a>
                    </li>

                    @endrole
                    @guest
                    @else
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" style="color: #FFFFFF;font-size: 20px;font-weight: bold;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                          </form>
                      </li>
                    @endguest
                @else
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('login') }}" style="color: #FFFFFF;font-size: 20px;font-weight: bold;">Iniciar Sesion</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('register') }}" style="color: #FFFFFF;font-size: 20px;font-weight: bold;">Registrarse</a>
                    </li>
                    @endif
                @endauth
          </ul>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Bienvenidos a Panaderia Lila</div>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="img-fluid" src="img/portfolio/sales.jpg" alt="First Slide">
              </div>
              <div class="carousel-item">
                <img class="img-fluid" src="img/portfolio/sales.jpg" alt="First Slide">
              </div>
              <div class="carousel-item">
                <img class="img-fluid" src="img/portfolio/sales.jpg" alt="First Slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <br/>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger bg-primary" href="#services">Ver Mas</a>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Servicios</h2>
            <h3 class="section-subheading text-muted">Somos una panaderia dedicada y te ofrecemos lo siguiente:</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse" style="background-image: radial-gradient(circle, #051937, #004d7a, #008793, #00bf72, #a8eb12); border-radius: 200px 200px 200px 200px;-moz-border-radius: 200px 200px 200px 200px;-webkit-border-radius: 200px 200px 200px 200px;border: 0px solid #000000; "></i>
            </span>
            <h4 class="service-heading">Producto</h4>
            <p>Ofrecemos diferentes tipos de productos en la panaderia en los cuales destacan los siguientes:<br/>1.Pan Dulce. 2.Reposteria.<br/> 3.Pan Fraces.  4.Bebidas. <br/> 5.etc.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-clock fa-stack-1x fa-inverse" style="background-image: radial-gradient(circle, #051937, #004d7a, #008793, #00bf72, #a8eb12); border-radius: 200px 200px 200px 200px;-moz-border-radius: 200px 200px 200px 200px;-webkit-border-radius: 200px 200px 200px 200px;border: 0px solid #000000; "></i>
            </span>
            <h4 class="service-heading">Horarios de Trabajo</h4>
            <p>Atendemos durante toda la semana a partir de las 8:00 A.M hasta las 5:00 P.M en sucursales.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-users fa-stack-1x fa-inverse" style="background-image: radial-gradient(circle, #051937, #004d7a, #008793, #00bf72, #a8eb12); border-radius: 200px 200px 200px 200px;-moz-border-radius: 200px 200px 200px 200px;-webkit-border-radius: 200px 200px 200px 200px;border: 0px solid #000000; "></i>
            </span>
            <h4 class="service-heading">Atencion al Cliente</h4>
            <p>Brindamos un servicio altamente capacitado para atender a nuestros clientes que deseen ser parte de nosotros para asi proveerles nuestro producto de calidad.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Nuestros Productos</h2>
            <h3 class="section-subheading text-muted">Muestras de nuestros productos</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/salpores.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Pan Dulce</h4>
              <p class="text-muted">Salpores</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/marialuisa.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Pan Dulce</h4>
              <p class="text-muted">Maria Luisa</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/milhoja.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Pan Dulce</h4>
              <p class="text-muted">Milhoja</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/panfrances.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Pan Frances</h4>
              <p class="text-muted">Pan de Horno</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/reposteria.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Reposteria</h4>
              <p class="text-muted">Cupcakes</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/peperacha.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Pan Dulce</h4>
              <p class="text-muted">Peperecha</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="sticky-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Salpores</h2>
                  <p class="item-intro text-muted">Pan Dulce.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/salpores.jpg" alt="">
                  <p>Los salpores de arroz son muy populares en El Salvador, especialmente para disfrutarlos en el desayunito con café o leche. O a media tarde con un rico café negro. Y para que los pueda disfrutar recien hechos en la comodidad de su casa</p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Maria Luisa</h2>
                  <p class="item-intro text-muted">Pan Dulce.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/marialuisa.jpg" alt="">
                  <p>La Maria Luisa no es mas que un pan dulce tipo repostería que se hace en nuestro querido El Salvador. Es bastante popular debido a su textura suave y su relleno tan tradicional, la leche poleada.</p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Milhoja</h2>
                  <p class="item-intro text-muted">Pan Dulce.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/milhoja.jpg" alt="">
                  <p>El milhojas es un dulce tradicional atribuido a la repostería francesa, aunque su origen sea incierto. Es un pastel de forma rectangular, que contiene merengue o crema pastelera entre dos capas de hojaldre espolvoreado con azúcar glas. Tradicionalmente, el milhojas consiste en capas de hojaldre horneadas e intercaladas con crema pastelera o nata montada.</p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Pan Frances</h2>
                  <p class="item-intro text-muted">Pan de Horno.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/panfrances.jpg" alt="">
                  <p>Este es uno de los panes más conocidos y apreciados, no sólo en Francia. Elaborados la mayoría de las veces en forma de largas barras de pan crujiente, con una corteza dorada y apetecible. El pan francés fue elaborado por primera vez en Viena, Austria, a mediados del siglo XIX. Surgió como consecuencia de la utilización de nuevos hornos de vapor para la cocción.</p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Cupcakes</h2>
                  <p class="item-intro text-muted">Reposteria.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/reposteria.jpg" alt="">
                  <p>Los cupcakes son la combinación perfecta entre un delicioso postre y dotes de creatividad; son pastelillos fáciles de digerir y de pocas calorías.Un cupcake que significa pastel de o en taza, fairy cake, patty cake, es una pequeña tarta generalmente del tamaño de una taza de café hecha para una sola persona. Su aspecto es muy parecido al de un muffin o una magdalena y al igual que los pasteles convencionales, los cupcakes son decorados ya sea con betún, azúcar glass, fondant y chispas de chocolate u otras figuras.</p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Peperecha</h2>
                  <p class="item-intro text-muted">Pan Dulce.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/peperacha.jpg" alt="">
                  <p>Las peperechas es un pan dulce muy famoso en El Salvador debido a su coloración rojo profundo que invita a degustarles cuanto antes. Este pan es bastante dulce por lo que si se degusta debe ser con una bebida que sea un poco simple o por ejemplo con café con poca azúcar. Este pan es elaborado con harina y en la parte del centro tiene una miel que es elaborada con dulce de panela derretido y en la parte de arriba colorante de color rojo con un poquito de azúcar; está compuesto de dos tapas.</p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('js/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('js/contact_me.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('js/agency.min.js')}}"></script>

  </body>

</html>
