$(document).ready(function () {

    var sqlEstado = "select id, nombre from  estado";

    var id = returnIdUrl(window.location.href);
    $("#lblId").text(id[0]);
    $("#txtIdT").val(id[0]);

    var array = {txtIdDepend: id[0]};

    $.ajax({
        url: "controller/t_liquid_c.php",
        type: 'POST',
        data: array,
        success: function (data) {
            var result = JSON.parse(data);

            $("#txtIdT").attr("id", "txtId");
            $("#txtId").attr("name", "txtId");

            $("#txtNombre").val(result['nombre']);

            comboBox(sqlEstado, "cmbEstado", result['estado_id'], '#divEstado');

        }
    });

    $("#btnIngresar").click(function () {

        var nuId = $("#txtId").val();
        var sbNombre = $("#txtNombre").val();
        var nuEstado = $("#cmbEstado").val();

        var arrayInfo = {0: nuId + "|#txtId",
            1: sbNombre + "|#txtNombre",
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

    var formData = $("#frmTLiquid").serialize();
    var sbAction = $("#frmTLiquid").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                location.href = "t_liquidList";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}

