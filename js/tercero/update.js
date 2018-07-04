$(document).ready(function () {

    var sqlPerfil = "select id, nombre from  perfil where estado_id = 1";
    var sqlEstado = "select id, nombre from  estado  ";

    var tercero_id = returnIdUrl(window.location.href);
    var id = tercero_id[0].split("-");
    
    if(id[1]==2){id[1]=20;}
    if(id[1]==3){id[1]=30;}
    
    alert(id[1]);
//$("#lblId").text(usuario_id[0]);
    // $("#txtIdUsuario").val(usuario_id[0]);

    var array = {txtProcess: id[1],txtUpdate:id[0]};

    $.ajax({
        url: "controller/tercero_c.php",
        type: 'POST',
        data: array,
        success: function (data) {
            
            alert(data);
            
            $("#divUpdate").html("");
            $("#divUpdate").append(data);

        }
    });


});
