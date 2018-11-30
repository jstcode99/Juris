
  $(".datepicker" ).datepicker({
      minDate: new Date(2007, 1 - 1, 1),
      dateFormat: 'yy-mm-dd'
  });

  $(function() {
    $('#rol').bootstrapToggle({
    
    });
  })

  $("#TipoPersona" ).change(function(){
    $(".tipo" ).toggle();
  });
  
  $("#etapas" ).change(function(){
    $(".estapa" ).toggle();
  });

  $('#especialidad').change(function(){    
    $('#producto').html("");
    $('#producto').append("<option value=''>Seleccione un producto</option>")
       url = "http://localhost:8000/Administrador/Productos/Productos-Especialidad";
       _token = $("input[name='_token']").val();
       id = $('#especialidad').val();

       var parametros = {
        "id": id,
        "_token" : _token
        };

      $.ajax({
        data:  parametros,
        url:   url,
        type:  'post',
        beforeSend: function () {                
        },
        success:  function(response) {
            if(response != null)
            {
              for(i=0; i<response.length; i++){
                      //console.log("response:" + response[i].id)
                      $('#producto').append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
                    }
            }
        }              
        }); 
  });
  $('#producto').change(function(){  
        $('#proceso1').hide();
        $('#proceso2').hide();
        $('#proceso3').hide();
        $('#proceso4').hide();
      url = "http://localhost:8000/Administrador/Productos/Productos-Cobro";
       _token = $("input[name='_token']").val();
       id = $('#producto').val();

       var parametros = {
        "id": id,
        "_token" : _token
        };

      $.ajax({
        data:  parametros,
        url:   url,
        type:  'post',
        beforeSend: function () {                
        },
        success:  function(response) {          
            if(response != null)
            {                            
              switch(response.tipo_tarifa){                
                case 'CUOTA FIJA SALARIAL':                
                  // Procesos1                
                  $('#proceso1').show();
                break;

                case 'CUOTA FIJA PORCENTUAL':
                    // Procesos2
                    $('#proceso2').show();
                break;

                case 'CUOTA LITIS SALARIAL':
                    // Procesos1
                    $('#proceso1').show();
                break;
                
                case 'CUOTA LITIS PORCENTUAL':
                    // Procesos2
                    $('#proceso2').show();
                break;

                case 'CUOTA MIXTA SALARIAL MAS PORCENTUAL':
                    // Procesos3
                    $('#proceso1').show();
                    $('#proceso2').show();
                    $('#proceso3').show();
                break;
                
                case 'CUOTA MIXTA SALARIAL POR RANGO':                
                    $('#proceso1').show();
                    $('#proceso5').show();
                    $('#proceso4').show();                
                break;

                case 'CUOTA MINIMA SALARIAL':
                    // Procesos1
                    $('#proceso1').show();
                break;

                case 'CUOTA PLENA SALARIAL':
                    // Procesos1
                    $('#proceso1').show();
                break;                           
              }                        
            }
        }              
        }); 
  });
