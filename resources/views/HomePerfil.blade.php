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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
                <div class="panel-heading">EDITAR PERFIL</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                    @endif

                    <div class="panel-body" style="text-align:center; align:center;">
                    <label style="font-family:'Estrangelo Edessa'; font-size:2em;"  for="image" class=" control-label">
                                Foto de Perfil:</label>
                    <!-- SE CARGA FOTO DE USUARIO -->
                    <img src="{{url(Auth::user()->foto)}}"  class='img-responsive img-circle center-block' style='max-width: 20em;' />

                    <p style=" padding-top:1em; font-family:'Estrangelo Edessa'; font-size:2em;" > Nombre de usuario: </p>
                    <label style="font-family:'Estrangelo Edessa'; font-size:2em;"  for="name" class=" control-label" id="name" name="name">
                        {{ Auth::user()->name }} </label>

                     

                    <!-- CARGAR NUEVA FOTO DE PERFIL DE USUARIO -->                    
                    <form method='post' action='{{ url("/ModificoPerfil") }}' enctype='multipart/form-data'>

                            {{csrf_field()}}
                            <div class='form-group '>
                                <input type="file" name="image" class="center-block" style="padding:2em;"/>
                                <div class='text-danger '>{{$errors->first('image')}}</div>
                            </div>
                            <button style="font-family:'Estrangelo Edessa'; font-weight:bold; margin-top:4em;" type='submit' class='btn btn-warning'>Actualizar </button>
                        </form>
                  
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
