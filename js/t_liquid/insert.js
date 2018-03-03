$(document).ready(function () {

    var sqlEstado = "select id, nombre from  estado  ";

    //llenar combox
    comboBox(sqlEstado, "cmbEstado", '', '#divEstado');

    //validar formulario 
    $("#btnIngresar").click(function () {

        var sbNombre = $("#txtNombre").val();
        var nuEstado = $("#cmbEstado").val();

        var arrayInfo = {0: sbNombre + "|#txtNombre",
            1: nuEstado + "|#cmbEstado"}

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            insert();
        }

    });

});


function insert() {

    var formData = $("#frmTLiquid").serialize();
    var sbAction = $("#frmTLiquid").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                alert("SE REGISTRO CORRECTAMENTE");
                location.href = "t_liquid";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}
;
