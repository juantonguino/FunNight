<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fun Night</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <style type="text/css">
        .btn-circleR {
            width: 12   0px;
            height: 50px;
            margin-top: 30px;
            padding-top: 15px;
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
            margin-top: 30px;
            padding-top: 15px;
            border-radius: 30px;
            text-align: center;
            font-size: 15px;
            font-weight:bold;
            color:#000000;
            font-family:"Estrangelo Edessa";
            line-height: 1.42857;
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
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        
        <section>
            
                <div class="row" style="background-color:#000000 ; margin-top:5em; opacity:0.95;">
                <div class="col-md-1"></div>
                <!-- LOGO -->
                <div class="col-md-5 "><img class="img-responsive" style="margin:40px;" class="img-circle" src="{{asset('img/logov2.png')}}" ></div>
                <!-- BOTON REGISTRATE -->
                <div class="col-md-2 col-md-offset-2 " >
                <li  class="dropdwon">
                    <a class="btn btn-info dropdown-toggle btn-circleR"   data-toggle="dropdown" href="{{ route('register') }}" role="button" aria-haspopup="true" aria-expanded="false" > 
                    REGISTRATE <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu "  style="background-color:#35E7ED; opacity:0.80; color:#000000;font-family:'Estrangelo Edessa';">
                    <li><a href="{{ url('/registerEstablecimiento') }}">Establecimiento Nocturno</a></li>
                    <li><a href="{{ url('/registrar') }}">Usuario</a></li>
                    </ul>
                </li>
                </div>
                <!-- BOTON LOGIN -->
                <div class="col-md-1 "><a  class="btn btn-success btn-circle  btn-responsive" style="background-color:#AEFC6C; "  href="{{ route('login') }}">LOGIN</a></div>
                
                <section>
                    
                    <div class="row">
                        <div class="col-md-5"  >
                           
                            <p style="padding:1em; font-family:'Estrangelo Edessa'; color:#A0A4A5; font-size: 2em; margin-top:90px; text-align: center;">
                                Fun Night te ayuda a encontrar tu sitio nocturno favorito, registrate como usuario para encuentres tu sitio ideal 
                                o resgistra tu establecimiento nocturno, haz parte de esta comunidad y comienza a crecer tu negocio.</p>
                        </div>
                    
                    </div>
                </section>
                
                </div>
        </section>
        

        <!-- ......................................................................... -->

    </body>
</html>
