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


    $("#btnIngresar").click(function () {

    var nuIdentificacion = $("#txtId").val();
        var sbNombre = $("#txtNombre").val();
        var sbApellido1 = $("#txtApellido1").val();
        var sbUsuario = $("#txtLogin").val();
        var nuPerfil = $("#cmbPerfil").val();
        var nuEstado = $("#cmbEstado").val();

        var arrayInfo = {0: nuIdentificacion + "|#txtId",
            1: sbNombre + "|#txtNombre",
            2: sbApellido1 + "|#txtApellido1",
            3: sbUsuario + "|#txtLogin",
            4: nuPerfil + "|#cmbPerfil",
            5: nuEstado + "|#cmbEstado"}

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            update();
        }


    });

});


function update() {

    var formData = $("#frmUsuario").serialize();
    var sbAction = $("#frmUsuario").attr("action");

    $.ajax({
        url: "controller/usuario_c.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
              alert("SE ACTUALIZO CORRECTAMENTE")
              location.href = "usuarioList";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}
;


