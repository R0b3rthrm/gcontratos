$(document).ready(function () {

    var sqlEstado = "select id, nombre from  estado  ";

    //llenar combox
    comboBox(sqlEstado, "cmbEstado", '', '#divEstado');

    //validar formulario 
    $("#btnIngresar").click(function () {

        var sbCod = $("#txtCod").val();
        var sbNombre = $("#txtNombre").val();
        var nuEstado = $("#cmbEstado").val();

        var arrayInfo = {0:sbCod+ "|#txtCod",
            1: sbNombre + "|#txtNombre",
            2: nuEstado + "|#cmbEstado"}

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            insert();
        }

    });

});


function insert() {

    var formData = $("#frmTClasific").serialize();
    var sbAction = $("#frmTClasific").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                alert("SE REGISTRO CORRECTAMENTE");
                location.href = "tClasific";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}
;
