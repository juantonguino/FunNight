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


        <!---------------- PERFIL DEL USUARIO ------------------>

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

                        <!-- SE CARGA FOTO DE USUARIO -->
                        <img src="{{url(Auth::user()->foto)}}"  class='img-responsive img-circle center-block' style='max-width: 15em;' />
                        
                        <div class="container">
                            <div class="row">

                                <!---------------- PERFIL DEL USUARIO ------------------>

                                <div class="col-md-3 ">
                                    <div class="panel panel-warning">

                                            

                                            @foreach($datos as $usuario)
                                            <label style=" font-size:1.8em ;"  for="name" class="lead control-label col-md-12" id="name" name="name">
                                                {{ Auth::user()->name }} </label>

                                                <div class="row">
                                                     <label style="font-family:'Estrangelo Edessa';  color:#E59866; font-size:1.3em;"  for="fecha" class=" control-label lead" id="fecha" name="fecha">
                                                        Genero</label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead" id="fechavalor" name="fechavalor">
                                                        {{$usuario->genero}}</label>
                                                </div>
                                                <div class="row">
                                                     <label style="font-family:'Estrangelo Edessa'; color:#D35400; font-size:1.3em;"  for="fecha" class=" control-label lead" id="fecha" name="fecha">
                                                        Nací el</label>
                                                     <label style="font-family:'Estrangelo Edessa'; font-size:1.3em;"  for="fechavalor" class=" control-label lead" id="fechavalor" name="fechavalor">
                                                        {{$usuario->fechaNacimiento}}</label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#E59866;  font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Vivo en el</label>
                                                </div>
                                                <div class="row">
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      ( {{$usuario->zona}} )  -  ( {{$usuario->ciudadActual}} )   -  ( {{$usuario->paisActual}} )</label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#D35400; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Mi contacto </label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$usuario->celular}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa';  color:#E59866; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Mi Email</label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$usuario->email}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#D35400; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Mi lugar favorito </label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$usuario->tipo_establecimiento}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#E59866; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Me encanta la</label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$usuario->tipo_comida}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#D35400; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Prefiero el</label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$usuario->tipo_ambiente}}  </label>
                                                </div>
                                                <div class="row">
                                                    <label style="font-family:'Estrangelo Edessa'; color:#E59866; font-size:1.3em;"  for="fecha" class=" control-label lead " id="fecha" name="fecha">
                                                        Amo la </label>
                                                     <label style="font-family:'Estrangelo Edessa';  font-size:1.3em;"  for="fechavalor" class=" control-label lead  " id="fechavalor" name="fechavalor">
                                                      {{$usuario->tipo_musica}}  </label>
                                                </div>

                                             @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                  
                    </div>

                </div>
            </div>
        </div>

            <!-- ---------------- SISTEMA DE RECOMENDACION ----------- -->
<div class="container" >
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-warning">
                <div class="panel-heading" style="font-family:'Estrangelo Edessa'; font-size:1.5em;">QUE ONDA?</div>
                <div class="col-md-offset-1 col-md-4"> <button href="#"  id="btn_porAmigos" type="button" class="btn btn-default">
                    SEGUIDOS POR TUS AMIGOS!</button>
                </div>

                <div class="col-md-3"> <button href="#" id="btn_porHoy" type="button"  class="btn btn-default">
                    QUE HAY PARA HOY?</button>
                </div>

                <div class="col-md-3"> <button href="#" id="btn_porCualidad" type="button" class="btn btn-default">
                    QUIZÁS TE GUSTEN!</button>
                </div>

                <!-- PUBLICACION ESTABLECIMIENTO -->
                <div class="panel-body" style="text-align:center;  " id="panelEst">
                        <div class="panel panel-warning " style="margin:2em;" >
                        <form class="form-horizontal" method="POST" action="" >
                            {{ csrf_token() }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"  id="token"  >
                                <div id="publicaciones">

                                <label id="fecha_publicacion" >
                                </label>  

                                <div id="">
                                    <input id="foto_est_publicacion" >
                                 </div>  
                                
                                <div id="nombre_est_publicacion"  ></div>

                                <button class="likes" class="col-md-1 col-md-offset-5"></button>
                            
                            
                            <!-- PUBLICACION -->
                            

                                <label id="titulo_publicacion" >
                                
                                 </label>

                                <label id="contenido_publicacion" >
                                </label>

                                <label id="fecha_ini" >
                                </label>

                                <label id="fecha_fin">
                                </label>

                                 <button href="#" id="bnt_comentarios" type="button" class="btn btn-default"></button>

                                 <div class="panel panel-warning " id="comentarios_desc" style="margin:2em;" >
                                 <label id="coment"> </label> </div>

                             </div>
                           
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




        </div>
    </div>





@endsection

@section('script')

<script src="{{asset('js/script_algoritmo1.js')}}"></script>
<script src="{{asset('js/script_algoritmo2.js')}}"></script>
<script src="{{asset('js/script_cargaPerfil.js')}}"></script>
<script src="{{asset('js/script_seleccionado.js')}}"></script>
@endsection
