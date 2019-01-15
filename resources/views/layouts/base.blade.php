<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Panaderia Lila-@yield('titulo')</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{asset('js/vendor2/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="{{asset('js/vendor2/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="{{asset('js/vendor2/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{{asset('js/vendor2/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{asset('dist/css/sb-admin-2.css')}}" rel="stylesheet">


  <!-- Custom Fonts -->
  <link href="{{asset('js/vendor2/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

  <div id="wrapper" style="background-image: url({{asset('img/Hersheys.jpg')}});">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-image: url({{asset('img/Hersheys.jpg')}}); background-size: cover;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/" style="color: white; font-family: serif; font-size: 50px">Panaderia Lila</a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class=""></i> <i class="fa fa-caret-down"></i>
          </a>

          <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>

          <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white; font-size: 20px">
            <i class="fa fa-shopping-cart fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>

          <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white; font-size: 20px">
            {{ Auth::user()->primerNombre." ".Auth::user()->primerApellido}}
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
            </li>
            @endif
            @else
            <li>
              <a href="{{route('miperfil')}}" style="color: black;font-size: 20px"><i class="fa fa-user"></i> Mi Perfil</a>
            </li>
            <li>
              <a href="{{route('editarPerfil',['id'=> Auth::user()->id])}}" style="color: black;font-size: 20px"><i class="fa fa-cogs"></i> Editar mi perfil</a>
            </li>
            <li>
              <a href="{{route('cambiarPass',['id'=> Auth::user()->id])}}" style="color: black;font-size: 20px"><i class="fa fa-lock"></i> Cambiar Contraseña</a>
            </li>
            <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" style="color: black;font-size: 20px">
              <i class="fa fa-power-off"></i> {{ __('Cerrar Sesion') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          @endguest
        </ul>
        <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation" style="background-image: url({{asset('img/Hersheys.jpg')}}); margin-top: 3.1%">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <li>
            <a href="/home" style="color: black; font-weight: bold;"><i class="fa fa-home fa-fw" style="font-size: 25px"></i> Inicio</a>
          </li>
          <li>
            <a href="#" style="color: black; font-weight: bold;"><i class="fa fa-cogs" style="font-size: 25px"></i> Gestionar Producto<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              @can('gestionar_categoria')
              <li>
                <a href="{{route('categorias.index')}}" style="color: black; font-weight: bold;"><i class="fa fa-list-alt fa-fw" style="font-size: 25px"></i> Categoria</a>
              </li>
              @endcan
              @can('gestionar_productos')
              <li>
                <a href="{{route('productos.index')}}" style="color: black; font-weight: bold;"><i class="fa fa-list fa-fw" style="font-size: 25px"></i> Productos</a>
              </li>
              @endcan
              @can('gestionar_materia')
              <li>
                <a href="{{route('materiaPrima.index')}}" style="color: black; font-weight: bold;"><i class="fa fa-list fa-fw" style="font-size: 25px"></i> Materia Prima</a>
              </li>
              @endcan
            </ul>
            <!-- /.nav-second-level -->
          </li>
          @can('gestionar_usuarios')
          <li>
            <a href="{{route('usuarios.index')}}" style="color: black; font-weight: bold;"><i class="fa fa-user fa-fw" style="font-size: 25px"></i> Usuarios</a>
          </li>
          @endcan
          @can('gestionar_ordenes')
          <li>
            <a href="#" style="color: black; font-weight: bold;"><i class="fa fa-folder-open-o" style="font-size: 25px"></i> Gestionar Orden<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="{{route('ordenes.index')}}" style="color: black; font-weight: bold;"><i class="fa fa-book" style="font-size: 25px"></i>  Ordenes Pendientes en local</a>
              </li>
              <li>
                <a href="{{route('historialLocal')}}" style="color: black; font-weight: bold;"><i class="fa fa-book" style="font-size: 25px"></i>  Historial de Ordenes en local </a>
              </li>
              <li>
                <a href="{{route('pendienteLinea')}}" style="color: black; font-weight: bold;"><i class="fa fa-book" style="font-size: 25px"></i>  Ordenes pendientes en linea </a>
              </li>
              <li>
                <a href="{{route('historialLinea')}}" style="color: black; font-weight: bold;"><i class="fa fa-book" style="font-size: 25px"></i>  Historial de ordenes en linea </a>
              </li>
            </ul>
            <!-- /.nav-second-level -->
          </li>
          @endcan
          @can('gestionar_mesas')
          <li>
            <a href="{{route('mesas.index')}}" style="color: black; font-weight: bold;"><i class="fa fa-cutlery fa-fw" style="font-size: 25px"></i>Mesas</a>
          </li>
          @endcan
          @can('gestionar_costeo')
          <li>
            <a href="{{route('costes.index')}}" style="color: black; font-weight: bold;"><i class="fa fa-file fa-fw" style="font-size: 25px"></i>Costeo</a>
          </li>
          @endcan
          @can('gestionar_recetas')
          <li>
            <a href="{{route('recetas.index')}}" style="color: black; font-weight: bold;"><i class="fa fa-file fa-fw" style="font-size: 25px"></i>Receta</a>
          </li>
          @endcan
        </ul>
      </div>
      <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
  </nav>

  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" align="center">@yield('inicio')</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>

    @yield('content')
  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="{{asset('js/vendor2/jquery/jquery.min.js')}}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{asset('js/vendor2/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{asset('js/vendor2/metisMenu/metisMenu.min.js')}}"></script>


  <!-- Custom Theme JavaScript -->
  <script src="{{asset('dist/js/sb-admin-2.js')}}"></script>
  <script src="{{asset('js/vendor2/datatables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/vendor2/datatables/js/dataTables.bootstrap.min.js')}}"></script>
  <!-- DataTables JavaScript -->
  <script src="{{asset('js/vendor2/datatables-responsive/dataTables.responsive.js')}}"></script>
  <script src="{{asset('js/vendor2/datatables/js/datatables-demo.js')}}"></script>
  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
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
  @yield('javascript')
</body>

</html>
