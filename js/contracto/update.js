$(document).ready(function () {

    var sqlPerfil = "select id, nombre from  perfil where estado_id = 1";
    var sqlEstado = "select id, nombre from  estado  ";

    var usuario_id = returnIdUrl(window.location.href);
    $("#lblId").text(usuario_id[0]);
    $("#txtIdUsuario").val(usuario_id[0]);

    var array = {txtIdUsuario: usuario_id[0]};

    $.ajax({
        url: "controller/usuario_c.php",
        type: 'POST',
        data: array,
        success: function (data) {

            var result = JSON.parse(data);

            $("#txtIdUsuario").attr("id", "txtId");
            $("#txtId").attr("name", "txtId");

            $("#txtNombre").val(result['nombre']);
            $("#txtApellido1").val(result['apellido1']);
            $("#txtApellido2").val(result['apellido2']);
            $("#txtTel").val(result['telefono']);
            $("#txtCel").val(result['celular']);
            $("#txtEmail").val(result['email']);
            $("#txtLogin").val(result['login']);

            comboBox(sqlPerfil, "cmbPerfil", result['perfil_id'], '#divPerfil');
            comboBox(sqlEstado, "cmbEstado", result['estado_id'], '#divEstado');

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


