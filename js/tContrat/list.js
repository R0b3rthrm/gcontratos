$(document).ready(function () {

    var formData = $("#frmTContrat").serialize();
    var sbAction = $("#frmTContrat").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                $("#resultado").html("");
                $("#resultado").append(data);
                setTableFrm(['#tableList']);
            } else {
                msjModal("Error Generar Tabla","ER");
            }
        }
    });

});