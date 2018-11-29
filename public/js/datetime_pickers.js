
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
