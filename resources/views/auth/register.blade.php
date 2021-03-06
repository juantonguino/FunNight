@extends('layouts.app')

@section('content')

<div class="container" style=" ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-info"  >
                <div class="panel-heading" style="font-family:'Estrangelo Edessa'; font-size:2em;" >Registro  Usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <!-- NOMBRE COMPLETO -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;"  for="name" class="col-md-5 control-label">
                                Nombre Completo</label>

                            <div class="col-md-6 has-info">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="email" class="col-md-5 control-label">
                                E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- CONTRASEÑA -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="password" class="col-md-5 control-label">
                                Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- CONFIRMACION DE CONTRASEÑA -->
                        <div class="form-group">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="password-confirm" class="col-md-5 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- FECHA DE NACIMIENTO -->
                        <div class="form-group{{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="fechaNecimiento" class="col-md-5 control-label">
                                Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="fechaNacimiento" type="date" class="form-control" name="fechaNacimiento" required>

                                @if ($errors->has('fechaNacimiento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechaNacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- GENERO -->
                        <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;"  for="genero" class="col-md-5 control-label">
                                Genero</label>

                            <div class="col-md-6  has-info">
                                <div class="checkbox">
                                  <label for="femenino"><input type="checkbox" name="genero" value="FEM" id="femenino">Femenino</label>
                                </div>
                                <div class="checkbox">
                                  <label for="masculino"><input type="checkbox" name="genero"  value="MAS" id="masculino">Masculino</label>
                                </div>

                            
                                @if ($errors->has('genero'))
                                    <span class="help-block">
                                        <strong>Debe seleccionar un valor</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('paisId') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="paisId" class="col-md-5 control-label">
                                Pais Actual</label>
                            <div class="col-md-6">                                    
                                <select name="paisId" id="paisId" class="form-control"  style="width:12em;">
                                    <option value ='0'>Seleccionar pais</option>
                                    @foreach($paiseslist as $pais)
                                        <option value ='{{$pais->id}}'>{{$pais->nombre}}</option>
                                    @endforeach
                                </select>
                                   <!-- <input id="paisActual" type="text" class="form-control" name="paisActual" required> -->
                                @if ($errors->has('paisId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paisId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">

                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="ciudad" class="col-md-5 control-label">
                                Ciudad Actual</label>
                            <div class="col-md-4" style="width:15em;">
                                   <div class="form-group">
                                      <select class="form-control" name="ciudad" id="ciudad" >
                                        
                                        

                                      </select>
                                    </div>
                                

                                @if ($errors->has('ciudad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zona') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="zona" class="col-md-5 control-label">
                                Zona (Ubicación)</label>
                            <div class="col-md-6">                                    
                                <select name="zona" id="zona" class="form-control"  style="width:12em;">
                                    <option value ='0'>Seleccionar Zona</option>
                                        <option value ='NOR'>Norte</option>
                                        <option value ='SUR'>Sur</option>
                                        <option value ='EST'>Este</option>
                                        <option value ='OES'>Oeste</option>
                                </select>
                                   <!-- <input id="paisActual" type="text" class="form-control" name="paisActual" required> -->
                                @if ($errors->has('zona'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zona') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="direccion" class="col-md-5 control-label">
                                Dirección de residencia</label>
                            <div class="col-md-6">                                    
                                <input id="direccion" type="text" class="form-control" name="direccion" required> 
                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="telefono" class="col-md-5 control-label">
                                Teléfono de residencia</label>
                            <div class="col-md-4">                                    
                                <input id="telefono" type="text" class="form-control" name="telefono" required> 
                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>Debe escribir un número de max 7 dígitos </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="celular" class="col-md-5 control-label">
                                Celular</label>
                            <div class="col-md-4">                                    
                                <input id="celular" type="text" class="form-control" name="celular" required> 
                                @if ($errors->has('celular'))
                                    <span class="help-block">
                                        <strong>Debe escribir un número de max 10 dígitos</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12"> 
                         <label style="font-family:'Estrangelo Edessa'; font-size:1.8em; margin: 1em; color:#41A5C0;" >
                                Háblame de ti ¿Cuales son tus gustos?</label>
                        </div>

                        <!--- -   - - - -->

                        <div class="form-group{{ $errors->has('ceid_tipo_establecimientolular') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="celular" class="col-md-5 control-label">
                                Establecimiento nocturno preferido</label>

                            <div class="col-md-6">                                    
                                    <select name="id_tipo_establecimiento" id="id_tipo_establecimiento" class="form-control"  style="width:15em;">
                                        <option value ='0'>Selecciona un sitio</option>
                                        @foreach($establecimientoTList as $establecimientoT)
                                            <option value ='{{$establecimientoT->id_tipo_establecimiento}}'>{{$establecimientoT->nombre}}</option>
                                        @endforeach
                                    </select>
                                       <!-- <input id="paisActual" type="text" class="form-control" name="paisActual" required> -->
                                    @if ($errors->has('id_tipo_establecimiento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_tipo_establecimiento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>



                         <div class="form-group{{ $errors->has('id_comida') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="id_comida" class="col-md-5 control-label">
                                Tipo de Comida preferida</label>
                            <div class="col-md-6">                                    
                                <select name="id_comida" id="id_comida" class="form-control"  style="width:15em;">
                                    <option value ='0'>Selecciona un tipo</option>
                                    @foreach($comidalist as $comida)
                                        <option value ='{{$comida->id_comida}}'>{{$comida->nombre}}</option>
                                    @endforeach
                                </select>
                                   <!-- <input id="paisActual" type="text" class="form-control" name="paisActual" required> -->
                                @if ($errors->has('id_comida'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_comida') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_ambiente') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="id_ambiente" class="col-md-5 control-label">
                                Tipo de Ambiente que mas prefieres de un establecimiento nocturno</label>
                            <div class="col-md-6">                                    
                                <select name="id_ambiente" id="id_ambiente" class="form-control"  style="width:15em;">
                                    <option value ='0'>Selecciona un tipo</option>
                                    @foreach($ambientelist as $ambiente)
                                        <option value ='{{$ambiente->id_ambiente}}'>{{$ambiente->nombre}}</option>
                                    @endforeach
                                </select>
                                   <!-- <input id="paisActual" type="text" class="form-control" name="paisActual" required> -->
                                @if ($errors->has('id_ambiente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_ambiente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_musica') ? ' has-error' : '' }}">
                            
                            <label style="font-family:'Estrangelo Edessa'; font-size:1.5em;" for="id_musica" class="col-md-5 control-label">
                                Tipo de música que mas prefieres en un establecimiento nocturno</label>
                            <div class="col-md-6">                                    
                                <select name="id_musica" id="id_musica" class="form-control"  style="width:15em;">
                                    <option value ='0'>Selecciona un tipo</option>
                                    @foreach($musicalist as $musica)
                                        <option value ='{{$musica->id_musica}}'>{{$musica->nombre}}</option>
                                    @endforeach
                                </select>
                                   <!-- <input id="paisActual" type="text" class="form-control" name="paisActual" required> -->
                                @if ($errors->has('id_musica'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_musica') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button style="font-family:'Estrangelo Edessa'; font-weight:bold; margin-top:4em;" type="submit" class="btn btn-primary">
                                    LISTO
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="{{asset('js/script.js')}}"></script>
@endsection