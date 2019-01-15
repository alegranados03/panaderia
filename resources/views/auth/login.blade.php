<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panaderia Lila-Iniciar Sesion</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('js/vendor2/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('js/vendor2/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

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

<body background="{{asset('img/backgroundlogin.jpg')}}" style="background-size: cover;">

</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading" style="background-color:rgba(120,63,7, 0.32);" align="center" >
                            <a href="{{ url('/') }}" style="color: white;">
                                <label style="font-size: 20px">Panaderia Lila </label>
                            </a>
                        </div>
                    <div class="panel-body" style="background-color:rgba(120,63,7, 0.32);">
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="username" type="text" placeholder="Nombre de Usuario" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-5">

                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-lg btn-success btn-block">
                                        {{ __('Iniciar Sesion') }}
                                    </button>
                                </div>

                                <div class="col-md-12 offset-md-4">
                                  <br/>
                                </div>
                                <div class="col-md-12 offset-md-4">
                                    <a href="{{url('/')}}" class="btn btn-lg btn-primary btn-block">Cancelar</a>
                                </div>
                            </div>
                            <div align="center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('js/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('dist/js/sb-admin-2.js')}}"></script>


</body>

</html>
