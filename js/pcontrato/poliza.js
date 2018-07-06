$(document).ready(function () {

    isNumber(['#txtValorPol']);
    alfNum(['#txtNumPoliza', '#txtResolucPol']);
    setCalendarFrm(['#dtFecExpPol', '#txtFecAproPol', '#dtFecIniPol', '#dtFecFinPol']);

    $("#btnIngresarPol").click(function () {

        var nuTercero = $("#cmbTerceroPol").val();
        var sbNumPoliza = $("#txtNumPoliza").val();
        var dtFecExp = $("#dtFecExpPol").val();
        var sbResolu = $("#txtResolucPol").val();
        var dtFecApro = $("#txtFecAproPol").val();
        var nuTPoliza = $("#cmbTPolizaPol").val();
        var nuValor = $("#txtValorPol").val();
        var dtFecIni = $("#dtFecIniPol").val();
        var dtFecFin = $("#dtFecFinPol").val();

        var arrayInfo = {0: nuTercero + "|#cmbTerceroPol",
            1: sbNumPoliza + "|#txtNumPoliza",
            2: dtFecExp + "|#dtFecExpPol",
            3: sbResolu + "|#txtResolucPol",
            4: dtFecApro + "|#txtFecAproPol",
            5: nuTPoliza + "|#cmbTPolizaPol",
            6: nuValor + "|#txtValorPol",
            7: dtFecIni + "|#dtFecIniPol",
            8: dtFecFin + "|#dtFecFinPol"
        }

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            insertPoliza();
        }
    });

});


function insertPoliza() {

    var formData = $("#frmPoliza").serialize();
    var sbAction = $("#frmPoliza").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {

            alert(data);
            if (data) {

                msjModal('Se Registro Correctamente la Poliza', 'OK');
                $("#btnIngresarPol").attr("value", "REGISTRAR")
                $("#frmPoliza")[0].reset();
                $("#txtIdPoliza").val('');
                $("#tablePoliza").html('');
                $("#tablePoliza").append(data);

            } else {
                msjModal("Error Al Registrar La Poliza", "ER");
            }
        }
    });
}

function updatePoliza(id) {

    var formData = {txtProcess: 52, txtIdPoliza: id}
    var sbAction = $("#frmPoliza").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            var result = JSON.parse(data);
            $("#txtIdPoliza").val(id);
            $("#cmbTerceroPol").val(result['tercero_id']);
            $("#txtNumPoliza").val(result['num_poliza']);
            $("#dtFecExpPol").val(result['fec_exp']);
            $("#txtResolucPol").val(result['resolucion']);
            $("#txtFecAproPol").val(result['fec_apro']);
            $("#cmbTPolizaPol").val(result['t_poliza_id']);
            $("#txtValorPol").val(result['valor']);
            $("#dtFecIniPol").val(result['fec_ini']);
            $("#dtFecFinPol").val(result['fec_fin']);

        }
    });

}

function deletePoliza(id, contrato) {


    $.confirm({
        title: '¡CONFIRMACION!',
        content: 'Desea Eliminar La Poliza?',
        type: 'orange',
        buttons: {
            SI: function () {

                var formData = {txtProcess: 53, txtIdPoliza: id, txtContrato: contrato}
                var sbAction = $("#frmPoliza").attr("action");

                $.ajax({
                    url: sbAction,
                    type: 'POST',
                    data: formData,
                    success: function (data) {

                        alert(data);

                        if (data) {
                            msjModal('Se Elminino Correctamente La Poliza', 'OK');
                            $("#tablePoliza").html('');
                            $("#tablePoliza").append(data);

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