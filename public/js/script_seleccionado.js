/*$(document).ready(function () {
    console.log("hola")
    

//RECONOCE CUANDO SE HA SELECCIONADO EL PERFIL DE ESTABLECIMIENTO PARA AMPLIARLO.
    $("#likes").change(function () {

        var establecimiento = $("#perfi").val()

        console.log("hi")

        $.ajax({
            data: { cod_est: establecimiento },
            url: 'perfil_seleccionado',
            type: 'get'
        });
        
    }); 

//RECONOCE CUANDO SE HA SELECCIONADO EL PERFIL DE ESTABLECIMIENTO PARA AMPLIARLO.
    $( "#panelEst" ).on( "click" , "a.likes",function () {

        console.log("like")
        /*var id_like = $("#likes").val()
       $.ajax({
            data: {cod_id: id_like},
            url: 'suma_like',
            type: 'get',
             success: function (jsonData) {
                for(var i in jsonData){
                    select += '<button  class="btn-xs btn-default col-md-1 " style=" font-size:1em; color:#C4C4C4; margin:1em; margin-left: 23em;" id="likes"><span class="glyphicon glyphicon-heart" >';
                    select += jsonData[i];
                    select += '</span></button>';
                };
                select += '</select>';
                $("#likes").html(select);
                
            }
             }); 
        
    }); 




  
});*/