$(document).ready(function () {

  

    function algoritmoPublicaciones(){
     $.ajax({
            data: '',
            url: 'publicaciones_est',
            type: 'get',
            beforeSend: function () {
                select = 'Procesando....';
                $("#panelEst").html(select);
            },

            success: function (jsonData) {
                select = '';
                for(var i in jsonData){

                    select += ' <div class="col-md-12 panel-info"><label id="fecha_publicacion" style="margin-top:1em; margin-bottom:2em; color:#C4C4C4; font-family:"Estrangelo Edessa"; font-size:1em; text-align:center;"   class=" control-label"> ';
                    select += "Publicado: "+ jsonData[i].fecha_publicacion;
                    select += '</label> </div>';

                    select += '<div class="panel panel-warning "><img id="foto_est_publicacion" class=" panel col-md-4  col-md-offset-4 img-responsive img-circle" style="border-color:#E2FF41; margin-top:1.5em; margin-bottom:1em;" src=" ';
                    select += jsonData[i].foto;
                    select += '" > ';

                    

                    

                    select += '<div class="col-md-12" style="font-size:1em; color:#C4C4C4; margin:1em;" id="likes"><label>';
                    select += "Likes  "+jsonData[i].likes;
                    select += '</label></div>';

                    select += '<div id="titulo_publicacion" class="panel-heading  col-md-12" style="font-family:"Estrangelo Edessa"; font-size:1.5em; text-align:center; margin-top:.5em;" >';
                    select += jsonData[i].nombre_publicacion;
                    select += '</div></div>';
                    
                    select += '<div class="panel-body"> ';
                    

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

   

    algoritmoPublicaciones();

   


  
});