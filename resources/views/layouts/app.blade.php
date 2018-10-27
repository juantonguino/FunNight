<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Fun Night</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



        <!-- Styles -->
        <style type="text/css">
        .btn-circleR {
            width: 12   0px;
            height: 50px;
            margin-top: 3em;
            padding-top: 15px;
            margin-bottom: 1em;
            border-radius: 40px;
            text-align: center;
            font-size: 15px;
            font-weight:bold;
            color:#000000;
            font-family: "Estrangelo Edessa";
            line-height: 1.42857;
            background-color: #35E7ED;
            border-color: #28BFD1;
        }
        .btn-circle {
            width: 70px;
            height: 50px;
            margin-top: 3em;
            padding-top: 15px;
            border-radius: 30px;
            text-align: center;
            font-size: 15px;
            margin-bottom: 1em;
            font-weight:bold;
            color:#000000;
            font-family:"Estrangelo Edessa";
            line-height: 1.42857;
            border-color:#54C128;
        }
        .btn-contenedorNombre{
            width: 10em;
            height: 3em;
            margin-top: 3em;
            padding-top: 15px;
            border-radius: 2em;
            text-align: center;
            font-size: 15px;
            margin-bottom: 1em;
            font-weight:bold;
            background-color:#D1F5BB;
            color:#000000;
            font-family:"Estrangelo Edessa";
            line-height: 1.42857;
            border-color:#E2FF41;
        }
        </style>

        <!-- fondo -->
        <style>
          body {  background-image: url('img/fondo1.jpg');  
          }
                        }
        </style>
</head>
<body>
    <div id="app" class="row"  >
        <nav class="navbar navbar-default navbar-static-top " style="opacity:0.85; background-color:#000000; margin-bottom:3em;">
            <div class="container" style="background-color:#000000;">
                <div class="navbar-header" style="background-color:#000000; margin-bottom:1em;">

                   
                    @guest
                        <!-- Branding Image -->
                         <div class="col-md-2 "><a href="{{ url('/') }}"><img class="img-responsive" style="margin-top:2em; " src="{{asset('img/logov6.png')}}" ></a></div>
                         <div class="col-md-3 "><a class="navbar-brand" href="{{ url('/') }}" style="margin-top: 1em; font-family:'Freestyle Script'; font-size: 4em;  color:#B6B6B6;">
                            Fun Night
                        </a>
                    </div>

                    @else
                    <div class="col-md-2 "><a href="{{ url('/home') }}"><img class="img-responsive" style="margin-top:2em; " src="{{asset('img/logov6.png')}}" ></a></div>
                         <div class="col-md-3 "><a class="navbar-brand" href="{{ url('/home') }}" style="margin-top: 1em; font-family:'Freestyle Script'; font-size: 4em;  color:#B6B6B6;">
                            Fun Night
                        </a>
                    </div>
                    @endguest
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right " >
                        <!-- Autenticacion usuario -->
                        @guest
                            <section>
                                <div class="row">
                                <!-- BOTON REGISTRATE -->
                                <div class="col-md-2 col-md-offset-3  " >
                                <li  class="dropdwon">
                                    <a class="btn btn-info dropdown-toggle btn-circleR"   data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    REGISTRATE <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu "  style="background-color:#35E7ED; color:#000000;font-family:'Estrangelo Edessa';">
                                    <li><a href="{{ url('/registerEstablecimiento') }}">Establecimiento Nocturno</a></li>
                                    <li><a href="{{ url('/registrar') }}">Usuario</a></li>
                                    </ul>
                                </li>
                                </div>
                                <!-- BOTON LOGIN -->
                                <div class="col-md-1 col-md-offset-5 "><a  class="btn btn-success btn-circle  btn-responsive" style="background-color:#AEFC6C; "  href="{{ route('login') }}">LOGIN</a></div>
                                </div>
                                
                        @else
                        <div class="row">
                            <div class="col-md-1 col-md-offset-1"><li> <a href="#" class="btn btn-info dropdown-toggle btn-contenedorNombre" style="width: 12em; background-color:#AF7AC5; border-color:#BB8FCE;">
                                NOTIFICACIONES<span class="badge" style="line-height: 1.42857; margin-left: .5em; background-color:#1A5276; color:#000000; border-color:#EBDEF0;">1</span></a></li></div>
                            
                            <div class=" col-md-offset-5 col-md-4 "><li class="dropdown" >
                                <a   style="text-transform:uppercase; background-color:#AF7AC5; border-color:#BB8FCE; " class="btn btn-success dropdown-toggle btn-contenedorNombre" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color:#AF7AC5; color:#000000; font-family:'Estrangelo Edessa';" >
                                    <li><a href="{{ url('/ModificoPerfilRuta') }}">Modificar Perfil</a></li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                            Cerrar sesion
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li></div>
                        </div>
                     @endguest
                 </ul>
                </div>
            </div>
        </nav>


        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jQuery3.2.1.js') }}"></script>
    @yield('script')
</body>
</html>
