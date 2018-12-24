<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panaderia Lila-Registrarse</title>

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

    <div class="container">
        <div class="row" >
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="background-color:rgba(120,63,7, 0.32);" align="center">
                        <a href="{{ url('/') }}" style="color: white;">
                            <label style="font-size: 20px">Panaderia Lila </label>
                        </a>
                    </div>
                    <div class="panel-body" style="background-color:rgba(120,63,7, 0.32);">
                        <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="primerNombre" type="text" placeholder="Primer Nombre" class="form-control{{ $errors->has('primerNombre') ? ' is-invalid' : '' }}" name="primerNombre" value="{{ old('primerNombre') }}" required autofocus>

                                @if ($errors->has('primerNombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('primerNombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="segundoNombre" type="text" placeholder="Segundo Nombre" class="form-control{{ $errors->has('segundoNombre') ? ' is-invalid' : '' }}" name="segundoNombre" value="{{ old('segundoNombre') }}" required autofocus>

                                @if ($errors->has('segundoNombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('segundoNombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="primerApellido" type="text" placeholder="Primer Apellido" class="form-control{{ $errors->has('primerApellido') ? ' is-invalid' : '' }}" name="primerApellido" value="{{ old('primerApellido') }}" required autofocus>

                                @if ($errors->has('primerApellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('primerApellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="segundoApellido" type="text" placeholder="Segundo Apellido" class="form-control{{ $errors->has('segundoApellido') ? ' is-invalid' : '' }}" name="segundoApellido" value="{{ old('segundoApellido') }}" required autofocus>

                                @if ($errors->has('segundoApellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('segundoApellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="username" type="text" placeholder="Usuario" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="direccion" type="text" placeholder="Direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" rows="2" style="resize: none;" required autofocus></textarea>

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <select id="sexo" type="text" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" value="{{ old('sexo') }}" rows="2" style="resize: none;" required autofocus>
                                    <option selected>Seleccione su genero...</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>

                                @if ($errors->has('sexo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                              <a href="{{url('/')}}" class="btn btn-primary bg-dark btn-block">Cancelar</a>
                          </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-block">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
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
