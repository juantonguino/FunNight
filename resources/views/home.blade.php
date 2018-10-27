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

                        

                        <div class="container">
                            <div class="row">

                                <!---------------- PERFIL DEL ESTABLECIMIENTO ------------------>

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
                                                      {{$estable->direccion}}  </label>
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
                        </div>


                  
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="panel panel-warning">
                 <div class="panel-heading" style="font-family:'Estrangelo Edessa'; font-size:1.5em;">QUÉ ESTÁ SUCEDIENDO EN TU NEGOCIO?</div>
                
                <form class="form-horizontal" enctype='multipart/form-data' method="post" style="padding-top:1em;" action='{{ url("/publicacionNueva") }}'>
                        {{ csrf_field() }}

                        

                        <div class=" col-md-10">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.2em; color:#A2A19F; padding-bottom:1em; padding-left:1em;"  for="" class="control-label">
                                    Ingresa la fecha de vigencia de tu publicación o evento:</label>
                        </div>
                        <!-- FECHA PUBLICACION QUE HACE EL ESTABLECIMIENTO -->
                        <div class="form-group{{ $errors->has('fecha_ini') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;  background:#F4D03F; opacity:0.7; color:#000000; border-radius: 20%; " for="fecha_ini" class="col-md-3 control-label">
                                Fecha inicial</label>

                            <div class="col-md-3">
                                <input id="fecha_ini" type="date" class="form-control" name="fecha_ini" required>

                                @if ($errors->has('fecha_ini'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha_ini') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('fecha_fin') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;  background:#EB984E; opacity:0.7; color:#000000; border-radius: 20%;" for="fecha_fin" class="col-md-3 control-label">
                                Fecha final</label>

                            <div class="col-md-3">
                                <input id="fecha_fin" type="date" class="form-control" name="fecha_fin" required>

                                @if ($errors->has('fecha_fin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha_fin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- TIPO DE PUBLICACION -->
                        <div class="form-group{{ $errors->has('tipo_publicacion') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;  background:#F5B041; opacity:0.7; color:#000000; border-radius: 20%;"  for="tipo_publicacion" class="col-md-4 control-label">
                                Que estas publicando?</label>

                            <div class="col-md-2  has-info">
                                <div class="checkbox">
                                  <label for="promo"><input type="checkbox" name="tipo_publicacion" value="PROMO" id="promo">PROMOCIÓN</label>
                                </div>
                                </div>
                            <div class="col-md-2  has-info">

                                <div class="checkbox" id="event">
                                  <label for="event"><input type="checkbox" name="tipo_publicacion"  value="EVENT" id="event">EVENTO</label>
                                </div>
                            </div>

                                    <!-- SI ES UN EVENTO, LA FECHA DEL EVENTO -->
                                    <div class="col-md-3">
                                        <label for="event_fecha"  id="fechaEvento"  style="display: block; border-radius: 20%; padding:1em; font-family:'Estrangelo Edessa'; font-size:1.3em;  background:#F9E79F; opacity:0.7; color:#000000;"> 
                                            FECHA EVENTO<input id="fecha_evento" type="date" class="form-control" name="fecha_evento" ></label>
                                    </div>

                            
                                @if ($errors->has('tipo_publicacion'))
                                    <span class="help-block">
                                        <strong>Debe seleccionar un valor</strong>
                                    </span>
                                @endif
                            
                        </div>

                         <!--NOMBRE DE LA PUBLICACION QUE HACE EL ESTABLECIMIENTO-->
                        <div class="form-group{{ $errors->has('nombreP') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em; "  for="nombreP" class="col-md-5 control-label">
                                Dale un nombre a tu publicación</label>

                            <div class="col-md-6 has-info" style="padding:1em;">
                                <input id="nombreP" type="text" class="form-control" name="nombreP" cols="40" value="{{ old('nombreP') }}" required autofocus >
                                 </input>



                                @if ($errors->has('nombreP'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombreP') }}</strong>
                                    </span>
                                @endif


                            </div>
                        </div>

                        <!-- PUBLICACION QUE HACE EL ESTABLECIMIENTO-->
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em; "  for="descripcion" class="col-md-5 control-label">
                                Describela</label>

                            <div class="col-md-6 has-info" style="padding:1.5em;">
                                <textarea id="descripcion" type="text" class="form-control" name="descripcion" cols="40" value="{{ old('descripcion') }}" required autofocus >
                                 </textarea>



                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif


                            </div>


                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em; padding-top:1em; "  for="image" class="col-md-4 col-md-offset-1 control-label">
                                Quieres cargar un archivo?</label>
                            <!-- CARGAR NUEVA FOTO DE PERFIL DE USUARIO --> 
                            <div class="col-md-4">
                            <div class='form-group '>
                                <input type="file" name="image" class="center-block" style="padding:2em;"/>
                                <div class='text-danger '>{{$errors->first('image')}}</div>
                            </div>
                            
                            </div>


                            <div class="col-md-offset-9 col-md-3"> <button href='{{ url("/publicacionNueva") }} '  type="submit" class="btn btn-warning">
                                PUBLICAR</button>
                            </div>
                        </div>

                        


                    </form>

            </div>
            </div>

        </div>
    </div>
</div>



<!-- ---------------- SISTEMA DE RECOMENDACION ----------- -->
<div class="container" >
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-warning">
                <div class="panel-heading" style="font-family:'Estrangelo Edessa'; font-size:1.5em;">QUE ONDA?</div>
                

                <!-- PUBLICACION ESTABLECIMIENTO -->
                <div class="panel-body" style="text-align:center;  " id="panelEst">
                        <div class="panel panel-warning " style="margin:2em;" >
                        <form class="form-horizontal" method="POST" action="{{ url('/publicacionRecomendacion') }}" >
                            
                            
                                    <img id="foto_est_publicacion"  >
                            
                                <label id="fecha_publicacion" >
                                </label>    
                                
                                

                                <div id="likes"></div>
                            
                            
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




@endsection

@section('script')



<script src="{{asset('js/script_publicaciones.js')}}"></script>
@endsection
