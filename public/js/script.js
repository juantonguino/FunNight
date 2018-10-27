$(document).ready(function () {
    console.log("hola")
    

    $("#paisId").change(function () {

        var pais = $("#paisId").val()

        $.ajax({
            data: { cod_pais: pais },
            url: 'ajaxGetCiudad',
            type: 'get',
            beforeSend: function () {
                select = '<option value="0">Procesando....</option>';
                $("#ciudad").html(select);
            },
            success: function (jsonData) {
                select = '<select name="position" class="form-control input-sm " required id="position" >';
                for(var i in jsonData){
                    select += '<option value="' + jsonData[i].id + '">' + jsonData[i].nombre + '</option>';
                };
                select += '</select>';
                $("#ciudad").html(select);
                
            }
        });
        
    });

  
});