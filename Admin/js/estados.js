$('#estados').change(function(){
    $.post('ajax_muni.php',{
        estado:$('#estados').val(),
        beforeSend: function(){
            $('.res_estado').html("Espere un momento por favor..");
        }
    }, function(respuesta){
        $('.res_estado').html(respuesta);
    });
});