@extends('layouts.app')
@section('content')
<!-- Styles -->
        <style type="text/css">
            .img-circle {
                border-radius: 50%;
            }
            </style>

<div class="container">
    <div class="row">

    <div class="col-md-12">

            <!-- SE CARGA FOTO DEL ESTABLECIMIENTO -->
            <img src="{{url(Auth::user()->foto)}}"  class='img-responsive img-circle center-block' style='max-width: 15em; background-color:#F8F9F9; padding:1em; margin-bottom:1em;' />
    </div>

        <!---------------- PERFIL DEL ESTABLECIMIENTO ------------------>

        <div class="col-md-4 ">
            <div class="panel panel-warning">
                <div class="panel-heading" style="font-family:'Estrangelo Edessa'; font-size:1.5em;">PERFIL</div>


                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                    @endif

                    <div class="panel-body" style="text-align:center; align:center;">

                        

                        <!-- 
                        <div class="container">
                            <div class="row">


                                <div class="col-md-3 ">
                                    <div class="panel panel-warning">

                                            

                                            @foreach($datos as $estable)
                                            <label style=" font-size:1.5em ;"  for="name" class="lead control-label col-md-12" id="name" name="name">
                                                {{ Auth::user()->name }} </label>

                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#D35400; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Estamos ubicados en el</label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                       ( {{$estable->zona}} )  - ( {{$estable->ciudadActual}} ) - ( {{$estable->paisActual}} ) </label>
                                               </div>
                                               <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#E59866; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Dirección </label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$estable->direccion_residencia}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#D35400; font-size:1.3em;"  for="fecha" class="col-md-10 col-md-offset-1 control-label lead " id="fecha" name="fecha">
                                                        Somos un establecimiento nocturno de tipo </label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$estable->tipo_establecimiento}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#E59866; font-size:1.3em;"  for="fecha" class="col-md-10 col-md-offset-1 control-label lead " id="fecha" name="fecha">
                                                        Manejamos productos como </label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$estable->tipo_comida}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#D35400; font-size:1.3em;"  for="fecha" class="col-md-10 col-md-offset-1 control-label lead " id="fecha" name="fecha">
                                                        Siempre encontrarás un </label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$estable->tipo_ambiente}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#E59866; font-size:1.3em;"  for="fecha" class="control-label lead " id="fecha" name="fecha">
                                                        y musica ambiente </label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$estable->tipo_musica}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#D35400; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Contáctanos y reserva </label>
                                                </div>
                                                <div class="row">
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      (32) ( {{$estable->telefono}} )  -  ( {{$estable->celular}} )  {{$estable->email}}</label>
                                                </div>


                                             @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> -->


                  
                    </div>

                </div>
            </div>
        </div>


        
    </div>
</div>



<!-- ---------------- SISTEMA DE RECOMENDACION ----------- -->
<!--
<div class="container" >
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-warning">
                <div class="panel-heading" style="font-family:'Estrangelo Edessa'; font-size:1.5em;">QUE ONDA?</div>
                

                <!-- PUBLICACION ESTABLECIMIENTO 
                <div class="panel-body" style="text-align:center;  " id="panelEst">
                        <div class="panel panel-warning " style="margin:2em;" >
                        <form class="form-horizontal" method="POST" action="{{ url('/publicacionRecomendacion') }}" >
                            

                            @foreach($resultado as $publicacion)
                                <div class="col-md-12 panel-info"><label id="fecha_publicacion" style="margin-top:1em; margin-bottom:2em; color:#C4C4C4; font-family:"Estrangelo Edessa"; font-size:1em; text-align:center;"   class=" control-label"> ';
                                Publicado: {{$publicacion->fecha_publicacion}} 
                                </label> </div>

                                <div class="panel panel-warning "><a href="#"><img id="foto_est_publicacion" class=" panel col-md-4  col-md-offset-4 img-responsive img-circle" style="border-color:#E2FF41; margin-top:1.5em; margin-bottom:1em;"
                                 src="{{$publicacion->foto}}"></a> 

                                 <div class="col-md-12" style="font-size:1em; color:#C4C4C4; margin:1em;" id="likes"><label>';
                                {{$publicacion->likes}} </label></div>

                                <div id="titulo_publicacion" class="panel-heading  col-md-12" style="font-family:"Estrangelo Edessa"; font-size:1.5em; text-align:center; margin-top:.5em;" >';
                                {{$publicacion->nombre_publicacion}} </div></div>

                                <div class="panel-body">

                                    <div class="col-md-12"><label id="contenido_publicacion" style="margin-top:1em; margin-bottom:1em;  font-family:"Estrangelo Edessa"; font-size:1.5em; text-align:center;"  for="name" class="  control-label"> ';
                                    {{$publicacion->descripcion}}  </label> </div>

                                    <div class="  col-md-12"><label id="fecha_ini" style=" margin-top:1em; margin-bottom:2em; font-family:"Estrangelo Edessa"; font-size:1em; text-align:left;"  for="fecha" class="col-md-6 control-label"> ';
                                    {{$publicacion->fecha_ini}} </label> 

                                    <label id="fecha_fin" style="margin-top:1em; margin-bottom:1em; font-family:"Estrangelo Edessa"; font-size:1em; text-align:right;"  for="fecha" class="col-md-6 control-label"> ';
                                    {{$publicacion->fecha_fin}} </label> 

                                    </div>

                                    <div class="col-md-6"><button href="#" id="bnt_comentarios" type="button" class="btn btn-info"> Ver Comentarios</button>';
                                    </div>

                                    <div class="col-md-12" style="margin-bottom:3em;"> </div> </div>
   
                           
                        @endforeach
                        </form>
                        </div>


                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                    @endif

        

                </div>
            </div>
        </div>
    </div>
</div>
-->



@endsection

@section('script')



<!--<script src="{{asset('js/script_publicaciones.js')}}"></script>-->
@endsection
