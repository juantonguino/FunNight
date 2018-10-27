$(document).ready(function () {

     $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
  


    prueba = function  (perfil){
            
            alert("reconoce el click de la publicacion");

            var establecimiento = perfil;
            //var token = ("#token").val();
            alert(establecimiento)

            $.ajax({    
                url: 'perfilSeleccionado',
                //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                dataType: 'json',
                data: { 
                         "id": establecimiento ,
                         "_token": "{{ csrf_token() }}"
                     },
                beforeSend: function () {
                    alert("Cargando Perfil del establecimiento");
                },
                error: function() {
                    alert('error al cargar la información del perfil del establecimiento');
                }
            });
            console.log("entro al ajax")
        
        };

    });