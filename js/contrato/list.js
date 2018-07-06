$(document).ready(function () {

    var formData = $("#frmContrato").serialize();
    var sbAction = $("#frmContrato").attr("action");

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
                alert("ERROR AL REGISTRAR ");
            }
        }
    });

});


