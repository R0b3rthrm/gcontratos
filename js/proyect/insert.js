$(document).ready(function () {

    var sqlEstado = "select id, nombre from  estado  ";

    //llenar combox
    comboBox(sqlEstado, "cmbEstado", '', '#divEstado');

    //validar formulario 
    $("#btnIngresar").click(function () {

        var sbNombre = $("#txtCod").val();
        var nuEstado = $("#cmbEstado").val();

        var arrayInfo = {0: sbNombre + "|#txtCod",
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

    var formData = $("#frmProyect").serialize();
    var sbAction = $("#frmProyect").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                
                msjModal("SE REGISTRO CORRECTAMENTE","OK");
                setTimeout(function(){location.href = "proyect";},500);
            } else {
                msjModal("ERROR AL REGISTRAR","ER");
            }
        }
    });
}
;
