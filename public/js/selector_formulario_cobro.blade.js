$('#tipo_tarifa').change(function(event)
{
    $('#proceso1').hide();
    $('#proceso2').hide();
    $('#proceso3').hide();
    $('#proceso4').hide();
    $('#proceso5').hide();
    id = event.target.value;
    cargar_cobro(id);
});

function cargar_cobro(id)
{     
    url = "http://localhost:8000/Administrador/Cobros/Mostrar-Cobro";    
    var parametros = {
        "id":id,
        };
    $.ajax({
        data:  parametros,
        url:   url,
        type:  'get',
        beforeSend: function () {                
        },
        success:  function (response) {     
            if(response == null)
            {

            }else
            {
                $('#id_cobro').html(""); 
                if(response.length==0){
                    $('#id_cobro').html("<option value=0 >No hay cobros para esta tarifa</option>"); 
                }else{
                    for(i=0; i<response.length; i++)
                    {
                       
                        switch(response[i].tipo_tarifa)
                        {                
                                    case 'CUOTA FIJA SALARIAL':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"SMLMV "+response[i].n_smlmv+"</option> "); 
                                        break; 

                                    case 'CUOTA FIJA PORCENTUAL':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"%"+response[i].porcentaje1+"</option> "); 
                                        break;

                                    case 'CUOTA LITIS SALARIAL':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"SMLMV "+response[i].n_smlmv+"</option> "); 
                                        break;

                                    case 'CUOTA LITIS PORCENTUAL':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"%"+response[i].porcentaje1+"</option> "); 
                                        break;

                                    case 'CUOTA MIXTA SALARIAL MAS PORCENTUAL':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"%"+response[i].porcentaje1+" SMLMV "+response[i].n_smlmv+"</option> ");
                                        break;

                                    case 'CUOTA MIXTA SALARIAL POR RANGO':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"%"+response[i].porcentaje1+" SMLMV "+response[i].n_smlmv+"</option> ");
                                        break;

                                    case 'CUOTA MINIMA SALARIAL':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"SMLMV "+response[i].n_smlmv+"</option> "); 
                                        break;

                                    case 'CUOTA PLENA SALARIAL':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"SMLMV "+response[i].n_smlmv+"</option> "); 
                                        break;

                                    case 'CUOTA PLENA PORCENTUAL':
                                                $('#id_cobro').append("<option value='"+response[i].id+"'>"+"%"+response[i].porcentaje1+"</option> "); 
                                        break;                            
                        }
                    }
                }
               
            }
        
            
        }
    });
}

function agregar_cobro(){
    var proceso = $('#tipo_tarifa').val();         
        $('#proceso1').hide();
        $('#proceso2').hide();
        $('#proceso3').hide();
        $('#proceso4').hide();
        $('#proceso5').hide();
        
        switch(proceso)
        {
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
                $('#btn1').hide();
                $('#btn2').hide();
            break;
            
            case 'CUOTA MIXTA SALARIAL POR RANGO':                
                $('#proceso1').show();
                $('#proceso5').show();
                $('#proceso4').show();                
                $('#btn1').hide();
                $('#btn2').hide();
            break;

            case 'CUOTA MINIMA SALARIAL':
                // Procesos1
                $('#proceso1').show();
            break;

            case 'CUOTA PLENA SALARIAL':
                // Procesos1
                $('#proceso1').show();
            break;

            case 'CUOTA PLENA PORCENTUAL':
                // Procesos2
                $('#proceso2').show();
            break;
            default:

            break;
        }
    }
    function guardar_cobro_proceso(numero_proceso)
    {        
        if(numero_proceso==1)
        {
            n_smlmv = $('#n_smlmv').val();
            tipo_tarifa = $('#tipo_tarifa').val();
            _token = $("input[name='_token']").val();
            var parametros = {

                "tipo_tarifa":tipo_tarifa,
                "n_smlmv" : n_smlmv,
                "_token" : _token
                };
        }
        if(numero_proceso==2)
        {
            porcentaje = $('#porcentaje').val();
            tipo_tarifa = $('#tipo_tarifa').val();
            _token = $("input[name='_token']").val();
            var parametros = {
                "tipo_tarifa":tipo_tarifa,
                "porcentaje" : porcentaje,
                "_token" : _token
                };
        }
        if(numero_proceso==3)
        {
            porcentaje = $('#porcentaje').val();
            n_smlmv = $('#n_smlmv').val();
            tipo_tarifa = $('#tipo_tarifa').val();
            _token = $("input[name='_token']").val();
            var parametros = {
                "tipo_tarifa":tipo_tarifa,
                "porcentaje" : porcentaje,
                "n_smlmv" : n_smlmv,
                "_token" : _token
                };
        }
        if(numero_proceso==4)
        {
            porcentaje1 = $('#porcentaje1').val();
            porcentaje2 = $('#porcentaje2').val();
            porcentaje3 = $('#porcentaje3').val();
            porcentaje4 = $('#porcentaje4').val();
            porcentaje5 = $('#porcentaje5').val();

            rango1 = $('#rango1').val();
            rango2 = $('#rango2').val();
            rango3 = $('#rango3').val();
            rango4 = $('#rango4').val();
            rango5 = $('#rango5').val();

            n_smlmv = $('#n_smlmv').val();
            tipo_tarifa = $('#tipo_tarifa').val();
            _token = $("input[name='_token']").val();
            var parametros = {
                "porcentaje1" : porcentaje1,
                "porcentaje2" : porcentaje2,
                "porcentaje3" : porcentaje3,
                "porcentaje4" : porcentaje4,
                "porcentaje5" : porcentaje5,

                "rango1" : rango1,
                "rango2" : rango2,
                "rango3" : rango3,
                "rango4" : rango4,
                "rango5" : rango5,

                "tipo_tarifa":tipo_tarifa,                                
                "n_smlmv" : n_smlmv,
                "_token" : _token
                };
        }

        $.ajax({
            data:  parametros,
            url:   '../Cobros/Guardar-Cobro',
            type:  'post',
            beforeSend: function () {                
            },
            success:  function (response) {     
                if(response==true || response=='true')
                {
                    $('#proceso1').hide();
                    $('#proceso2').hide();
                    $('#proceso3').hide();
                    $('#proceso4').hide();
                    $('#proceso5').hide();
                    id = $('#tipo_tarifa').val()              
                    cargar_cobro(id);
                }  
                
            }
        });  
    }    

function text_print(input)
{
    var descripción = $('#'+input).val();
    var hoja = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Juris</title></head><body><h2>Descripcion del caso</h2><div style="padding: 10px;"><p style="text-align: justify;">'+descripción+'</p></div></body></html>';
    newWin= window.open("");
    newWin.document.write(hoja);
    newWin.print();
    newWin.close();
}
