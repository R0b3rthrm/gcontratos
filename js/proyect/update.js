$(document).ready(function () {

    var sqlEstado = "select id, nombre from  estado";

    var id = returnIdUrl(window.location.href);
    $("#lblId").text(id[0]);
    $("#txtIdP").val(id[0]);

    var array = {txtIdP: id[0]};

    $.ajax({
        url: "controller/proyect_c.php",
        type: 'POST',
        data: array,
        success: function (data) {
            var result = JSON.parse(data);

            $("#txtIdP").attr("id", "txtId");
            $("#txtId").attr("name", "txtId");
            
            $("#txtCod").val(result['codigo']);
            comboBox(sqlEstado, "cmbEstado", result['estado_id'], '#divEstado');

        }
    });

    $("#btnIngresar").click(function () {

        var nuId = $("#txtId").val();
        var sbCodigo = $("#txtCod").val();
        var nuEstado = $("#cmbEstado").val();

        var arrayInfo = {0: nuId + "|#txtId",
            1: sbCodigo + "|#txtCod",
            2: nuEstado + "|#cmbEstado"}

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            update();
        }


    });

});


function update() {

    var formData = $("#frmProyect").serialize();
    var sbAction = $("#frmProyect").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                location.href = "proyectList";
            } else {
                msjModal("ERROR AL REGISTRAR","ER");
            }
        }
    });
}

