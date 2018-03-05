$(document).ready(function () {

    var sqlEstado = "select id, nombre from  estado";

    var id = returnIdUrl(window.location.href);
    $("#lblId").text(id[0]);
    $("#txtIdT").val(id[0]);

    var array = {txtIdT: id[0]};

    $.ajax({
        url: "controller/mSelecc_c.php",
        type: 'POST',
        data: array,
        success: function (data) {
            
            var result = JSON.parse(data);

            $("#txtIdT").attr("id", "txtId");
            $("#txtId").attr("name", "txtId");

            $("#txtCod").val(result['cod']);
            $("#txtNombre").val(result['nombre']);

            comboBox(sqlEstado, "cmbEstado", result['estado_id'], '#divEstado');

        }
    });

    $("#btnIngresar").click(function () {

        var sbCod = $("#txtCod").val();
        var sbNombre = $("#txtNombre").val();
        var nuEstado = $("#cmbEstado").val();

        var arrayInfo = {0: sbCod + "|#txtCod",
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

    var formData = $("#frmMSelecc").serialize();
    var sbAction = $("#frmMSelecc").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                location.href = "mSeleccList";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}

