$('#nick').change(function(){
    $.post('ajax_validacion_nick.php',{
        nick:$('#nick').val(),

        beforeSend: function(){
            $('.validacion').html("Espere un momento por favor...");
        }
    }, function(respuesta){
        $('.validacion').html(respuesta);
    }
    )
});

$('#correo').change(function(){
    $.post('ajax_validacion_correo.php',{
        correo:$('#correo').val(),

        beforeSend: function(){
            $('.validacioncorreo').html("Espere un momento por favor...");
        }
    }, function(respuesta){
        $('.validacioncorreo').html(respuesta);
    }
    )
});

$('#btn_guardar').hide();
$('#pass2').change(function(event){
    if($('#pass1').val() == $('#pass2').val()){
        swal('Bien Hecho','Las contraseñas coinciden', 'success');
        $('#btn_guardar').show();
    }else{
        swal('Opsss.....','Las contraseñas NO coinciden', 'error');
        $('#btn_guardar').hide();
    }
});

$('.form').keypress(function(e){
  if(e.which == 13){
    return false;
  }
});

$('#buscar').keyup(function(event){
    var contenido = new RegExp($(this).val(), 'i');
    $('tr').hide();
    $('tr').filter(function(){
        return contenido.test($(this).text());
    }).show();
});