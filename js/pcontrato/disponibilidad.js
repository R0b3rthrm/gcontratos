$(document).ready(function () {


    $("#cmbCompro").chosen({
        max_selected_options: 30,
        max_shown_results: 30,
        width: "300px"
    });

    $("#cmbDispon").chosen({
        max_selected_options: 30,
        max_shown_results: 30,
        width: "300px"
    });


    $("#btnIngresarDispon").click(function () {

        var nuDispon = $("#cmbDispon").val();
        var nuCodPro = $("#cmbCompro").val();

        var arrayInfo = {0: nuDispon + "|#cmbDispon",
            1: nuCodPro + "|#cmbCompro",
        }

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            $("#cmbComproList").val($("#cmbCompro").val());
            insertDisponibilidad();
        }
    });

});


function insertDisponibilidad() {

    var formData = $("#frmDisponibilidad").serialize();
    var sbAction = $("#frmDisponibilidad").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {

            if (data) {

                alert(data);
                if (data == 2) {
                    msjModal('El valor del Compromiso es Mayor a la Disponibilidad', 'ER');
                } else if (data == 3) {
                    msjModal('La Fecha de la Disponibilidad es Mayor a la Fecha Suscripcion del Contrato', 'ER')
                } else {

                    msjModal('Se Registro Correctamente la Disponibilidad', 'OK');
                    alert($("#txtContratoDisp").val());
                    $.ajax({
                        url: sbAction,
                        type: 'POST',
                        data: {txtProcess: 42, txtContratoDispon: $("#txtContratoDisp").val()},
                        success: function (data2) {

                            $("#divDisponabilidad").html('');
                            $("#divDisponabilidad").append(data2);
                        }
                    });

                }
            } else {
                msjModal("Error Al Registrar El Proyecto", "ER");
            }
        }
    });
}

function deleteDisponibilidad(id, contrato, dispo, compro) {

    $.confirm({
        title: '¡CONFIRMACION!',
        content: 'Desea Eliminar el Proyecto?',
        type: 'orange',
        buttons: {
            SI: function () {

                var formData = {txtProcess: 43, txtIdDisponibilidad: id, txtContrato: contrato, txtDispon: dispo, txtCompro: compro}
                var sbAction = $("#frmDisponibilidad").attr("action");

                $.ajax({
                    url: sbAction,
                    type: 'POST',
                    data: formData,
                    success: function (data) {

                        if (data) {
                            msjModal('Se Elminino Correctamente la Disponibilidad', 'OK');

                            $("#divDisponabilidad").html('');
                            $("#divDisponabilidad").append(data);

                        } else {
                            msjModal('No se pudo Eliminar', 'ER');
                        }
                    }
                });

            },
            NO: function () {

            }

        }
    });

}