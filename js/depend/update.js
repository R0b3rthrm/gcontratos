$(document).ready(function () {

    var sqlEstado = "select id, nombre from  estado  ";

    var id = returnId(window.location.href);
    $("#lblId").text(id[0]);
    $("#txtIdDepend").val(id[0]);

    var array = {txtIdDepend: id[0]};

    $.ajax({
        url: "controller/depend_c.php",
        type: 'POST',
        data: array,
        success: function (data) {

            var result = JSON.parse(data);

            $("#txtIdDepend").attr("id", "txtId");
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

    var formData = $("#frmDepend").serialize();
    var sbAction = $("#frmDepend").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                location.href = "dependList";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}
;


