$(document).ready(function () {

   
    function algoritmoAmigos(){
     $.ajax({
            data: '',
            url: 'algoritmo2',
            type: 'get',
            beforeSend: function () {
                select = 'Procesando....';
                $("#panelEst").html(select);
            },

            success: function (jsonData) {
                select = '';
                for(var i in jsonData){
                    select += '<input type="hidden" name="_token" value="{{ csrf_token() }}"  id="token"  >';
                    select += ' <div class="col-md-12 panel-info"><label id="fecha_publicacion" style="margin-top:1em; margin-bottom:2em; color:#C4C4C4; font-family:"Estrangelo Edessa"; font-size:1em; text-align:center;"   class=" control-label"> ';
                    select += "Publicado: "+jsonData[i].fecha_publicacion;
                    select += '</label> </div>';

                    select += '<a href="#" value="' + jsonData[i].id + '"  id="perfil"><div  class="panel panel-warning "><input value="' + jsonData[i].id + '" id="foto_est_publicacion"  class="with-caption image-link panel col-md-6  col-md-offset-3 img-responsive img-circle" type="image" style="border-color:#E2FF41; margin-top:1.5em; margin-bottom:1em;" src=" ';
                    select += jsonData[i].foto;
                    select += '" > ';

                    

                    select += '<div value="' + jsonData[i].id + '" id="nombre_est_publicacion" value="' + jsonData[i].id + '" class="panel-heading  col-md-12" style="font-family:"Estrangelo Edessa"; font-size:1.5em; text-align:center; margin-top:.5em;" >';
                    select += jsonData[i].nombre;
                    select += '</div></div></a>';

                    select += '<button value="' + jsonData[i].id + '" class="btn-xs btn-default col-md-1" style="font-size:1em; color:#C4C4C4; margin:1em; margin-left: 23em; " class="likes"><span class="glyphicon glyphicon-heart" >';
                    select += jsonData[i].likes;
                    select += '</span></button>';

                    select += '<div class="panel-body"> ';
                    select += '<div class="col-md-12"><label id="titulo_publicacion" style="font-family:"Estrangelo Edessa"; font-size:3em; text-transform:uppercase;"  >';
                    select += "Evento: "+jsonData[i].nombre_publicacion;
                    select += '</label></div>';

                    select += ' <div class="col-md-12"><label id="contenido_publicacion" style="margin-top:1em; margin-bottom:1em;  font-family:"Estrangelo Edessa"; font-size:1.5em; text-align:center;"  for="name" class="  control-label"> ';
                    select += jsonData[i].descripcion;
                    select += '</label> </div>';

                    select += ' <div class="  col-md-12"><label id="fecha_ini" style=" margin-top:1em; margin-bottom:2em; font-family:"Estrangelo Edessa"; font-size:1em; text-align:left;"  for="fecha" class="col-md-6 control-label"> ';
                    select += "Fecha Inicial: "+jsonData[i].fecha_ini;
                    select += '</label> ';

                    select += '<label id="fecha_fin" style="margin-top:1em; margin-bottom:1em; font-family:"Estrangelo Edessa"; font-size:1em; text-align:right;"  for="fecha" class="col-md-6 control-label"> ';
                    select += "Fecha Final: "+jsonData[i].fecha_fin;
                    select += '</label> ';

                    select += '</div>';

                    

                    select += '<div class="col-md-6"><button href="#" id="bnt_comentarios" type="button" class="btn btn-info"> Ver Comentarios</button>';
                    select += '</div>';

                    select += '<div class="col-md-12" style="margin-bottom:3em;"> </div>';

                    select += '</div>';
                           
                };
                
                $("#panelEst").html(select);
                
            }
        });

      };

    $("#btn_porAmigos").on('click', function () {
    algoritmoAmigos();

});

    

     $("#bnt_comentarios").click(function(){
       $.ajax({
            data: '',
            url: 'algoritmo2',
            type: 'get',
            beforeSend: function () {
                select = 'Procesando....';
                $("#coment").html(select);
            },
            success: function (jsonData) {
                select = '';
                for(var i in jsonData){
                    select += '<div class="panel panel-warning " id="comentarios_desc" style="margin:2em;" ><label id="coment">';
                    select += jsonData[i].comentario_desc;
                    select += '</label> </div>';

                     };
                
                $("#coment").html(select);

    }  });
   });


  
});