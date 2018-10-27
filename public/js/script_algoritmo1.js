//id_establecimientovar server='http://localhost:8000';
var select = '';
$(document).ready(function () {
    function algoritmoHoy(){
     $.ajax({
            data: '',
            url: 'algoritmo1',
            type: 'get',
            beforeSend: function () {
                select = 'Procesando....';
                $("#panelEst").html(select);
            },
            success: function (jsonData) {
                select=''
                for(var i in jsonData){
                    var object=jsonData[i]

                    select+=`<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <div class="col-md-12 panel-info">
                        <label id="fecha_publicacion" style="margin-top:1em; margin-bottom:2em; color:#C4C4C4; font-family:'Estrangelo Edessa'; font-size:1em; text-align:center;"
                            class=" control-label">
                            Publicado: `+object.fecha_publicacion+`
                        </label>
                    </div>
                    <a href="http://localhost:8000/perfilSeleccionado/`+object.id+`" value="`+object.id+`" id="perfil" src="`+object.foto+`">
                        <img src="`+object.foto+`" alt="Perfil" height="500" width="500">
                        <div value="`+object.id+`" id="nombre_est_publicacion" value="`+object.id+`" class="panel-heading  col-md-12" style="font-family:'Estrangelo Edessa'; font-size:1.5em; text-align:center; margin-top:.5em;">
                            `+object.nombre+`
                        </div>
                        </div>
                    </a>
                    <button value="`+object.id+`" class="btn-xs btn-default col-md-1 " style=" font-size:1em; color:#C4C4C4; margin:1em; margin-left: 23em;"
                        id="likes">
                        <span class="glyphicon glyphicon-heart">`+object.likes+`</span>
                    </button>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <label id="titulo_publicacion" style="font-family:'Estrangelo Edessa'; font-size:3em; text-transform:uppercase;">
                                Evento: `+object.nombre_publicacion+`
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label id="contenido_publicacion" style="margin-top:1em; margin-bottom:1em;  font-family:'Estrangelo Edessa'; font-size:1.5em; text-align:center;"
                                for="name" class="  control-label">
                                `+object.descripcion+`
                            </label>
                        </div>
                        <div class="  col-md-12">
                            <label id="fecha_ini" style=" margin-top:1em; margin-bottom:2em; font-family:'Estrangelo Edessa'; font-size:1em; text-align:left;"
                                for="fecha" class="col-md-6 control-label">
                                Fecha Inicial: `+object.fecha_ini+`
                            </label>
                            <label id="fecha_fin" style="margin-top:1em; margin-bottom:1em; font-family:'Estrangelo Edessa'; font-size:1em; text-align:right;"
                                for="fecha" class="col-md-6 control-label">
                                Fecha Final: `+object.fecha_fin+`
                            </label>
                        </div>
                        <div class="col-md-6">
                            <button href="#" id="bnt_comentarios" type="button" class="btn btn-info"> Ver Comentarios</button>
                        </div>
                        <div class="col-md-12" style="margin-bottom:3em;">
                        </div>
                    </div>`
                };
                $("#panelEst").html(select);
            }
        });

      };

   

    $("#btn_porHoy").on('click', function () {
    algoritmoHoy();

        });




  




    

   

});