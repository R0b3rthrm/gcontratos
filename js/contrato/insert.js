$(document).ready(function () {


    //Restricciones
    noCopyPaste(['#txtSegment', '#txtObserv']);
    alfNumPG(['#txtId, #txtResAdjudicacion']);
    alfNum(['#txtObject', '#txtSegment', '#txtObserv', '#txtSeccion']);
    alfNumPE(['#txtEje', '#txtEst', '#txtProg']);
    noChar(['#txtPlazoEj']);
    maxChar(['#txtObject', '#txtSegment', '#txtObserv'], 256);
    maxChar(['#txtId', '#txtResAdjudicacion', '#txtSeccion', '#txtEje', '#txtEst', '#txtProg'], 50);
    isNumber(['#txtValorIni', '#txtValorAnticp']);
    setCalendarFrm(['#dtSuscripcion', '#dtInicio', '#dtTerminacion', '#dtAdjudicacion', '#dtActSecop', '#dtPublicSecop', '#dtLiquid'])

    $('#txtPlazoEj').click(function () {

        var dtIni = $('#dtInicio').val();
        var dtFin = $('#dtTerminacion').val();

        if (dtIni != '' && dtFin != '') {
            if (dtIni > dtFin) {
                msjModal('Fecha De Terminacion Debe Ser Mayor o Igual a La Fecha Inicial', 'AT');
                $('#dtTerminacion').focus();
            } else {
                $('#txtPlazoEj').val(difDate(dtIni, dtFin));
            }
        } else {
            msjModal('Se Debe Escribir Fecha Inicial Y De Terminacion', 'AT');
            if (dtIni != '') {
                $('#dtInicio').focus();
            } else {
                $('#dtTerminacion').focus();
            }
        }


    });





    //validar formulario 
    $("#btnIngresar").click(function () {

        //var 
        var sbId = $("#txtId").val();
        var nuDepend = $("#cmbDepend").val();
        var sbSeccion = $("#txtSeccion").val();
        var nuMSelecc = $("#cmbMSelecc").val();
        var nuCausal = $("#cmbCausal").val();
        var nuTContrat = $("#cmbTContrat").val();
        var nuTGasto = $("#cmbTGasto").val();
        var dtSuscripcion = $("#dtSuscripcion").val();
        var dtInicio = $("#dtInicio").val();
        var dtTerminacion = $("#dtTerminacion").val();
        var sbPlazo = $("#txtPlazoEj").val();
        var sbObject = $("#txtObject").val();
        var nuValor = $("#txtValorIni").val();
        var nuPublicSecop = $("#cmbPublicSecop").val();
        var dtPublicSecop = $("#dtPublicSecop").val();
        var nuActSecop = $("#cmbActSecop").val();
        var sbLinkSecop = $("#txtLinkSecop").val();
        var nuFiducia = $("#cmbFiducia").val();
        var nuAfecPresupt = $("#cmbAfecTaPresupt").val();
        var nuFuncion = $("#cmbFuncion").val();
        var nuContratista = $("#cmbTercero").val();

        var arrayInfo = {0: sbId + "|#txtId",
            1: nuDepend + "|#cmbDepend",
            2: sbSeccion + "|#txtSeccion",
            3: nuMSelecc + "|#cmbMSelecc",
            4: nuCausal + "|#cmbCausal",
            5: nuTContrat + "|#cmbTContract",
            6: nuTGasto + "|#cmbTGasto",
            7: dtSuscripcion + "|#dtSuscripcion",
            8: dtInicio + "|#dtInicio",
            9: dtTerminacion + "|#dtTerminacion",
            10: sbPlazo + "|#txtPlazoEj",
            11: nuContratista + "|#cmbTercero",
            12: nuValor + "|#txtValorIni",
            13: sbObject + "|#txtObject"
        }

        var blValido = isEmptyFields(arrayInfo);

        // if(blValido){
        //    blValido = minChar(['#txtId'], 5);
        // }


        //Validar Campos Vacios
        if (blValido)
        {
            insert();
        }

    });

});


function insert() {

    var formData = $("#frmContrato").serialize();
    var sbAction = $("#frmContrato").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {

            if ($("#txtUpdate").length) {

                msjModal('Se Actualizo Correctamente El Contracto ', 'OK');
                setTimeout(function () {
                    location.href = "contratoList";
                }, 1700);


            } else {
                if (data) {
                    $("#frmContrato")[0].reset();
                    $("#txtId")[0].focus();
                    msjModal("Se Registro Correctamente El Contrato", "OK");
                } else {
                    msjModal("Error Al Registrar El Contrato", "ER");
                }
            }

        }
    });
}
;
