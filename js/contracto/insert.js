$(document).ready(function () {

    //Restricciones
    noCopyPaste(['#txtObject', '#txtSegment', '#txtObserv']);
    alfNumPG(['#txtId, #txtResAdjudicacion']);
    alfNum(['#txtObject', '#txtSegment', '#txtObserv', '#txtSeccion']);
    alfNumPE(['#txtEje', '#txtEst', '#txtProg']);
    noChar(['#txtPlazoEj']);
    maxChar(['#txtObject', '#txtSegment', '#txtObserv'], 256);
    maxChar(['#txtId', '#txtResAdjudicacion', '#txtSeccion', '#txtEje', '#txtEst', '#txtProg'], 50);
    isNumber(['#txtValorIni', '#txtValorAnticp']);
    var sqlDepend = "select id, nombre from depend where estado_id = 1";
    var sqlMSelecc = "select id, cod, nombre from  m_selecc where estado_id = 1";
    var sqlCausal = "select id, cod, nombre from  causal where estado_id = 1";
    var sqlTContract = "select id, cod, nombre from t_contract where estado_id = 1";
    var sqlTGasto = "select id, cod, nombre from  t_gasto where estado_id = 1";
    var sqlTRecurs = "select id, cod, nombre from  t_recurs where estado_id = 1";
    var sqlTLiquid = "select id, cod, nombre from  t_liquid where estado_id = 1";
    var sqlFuncion = "select id, cod, nombre from  funcion where estado_id = 1";

    //llenar combox
    comboBox(sqlDepend, "cmbDepend", '', '#divDepend');
    comboBox(sqlMSelecc, "cmbMSelecc", '', '#divMSelecc');
    comboBox(sqlCausal, "cmbCausal", '', '#divCausal');
    comboBox(sqlTContract, "cmbTContract", '', '#divTContract');
    comboBox(sqlTGasto, "cmbTGasto", '', '#divGasto');
    comboBox(sqlTRecurs, "cmbTRecurs", '', '#divTRecurs');
    comboBox(sqlTLiquid, "cmbTLiquid", '', '#divTLiquid');
    comboBox(sqlFuncion, "cmbFuncion", '', '#divFuncion');

    $('#dtSuscripcion').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    $('#dtInicio').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    $('#dtTerminacion').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    $('#dtAdjudicacion').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    $('#dtActSecop').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    $('#dtPublicSecop').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    $('#dtLiquid').datepicker({format: 'yyyy-mm-dd', autoclose: true});


    $('#txtPlazoEj').click(function () {

        dtIni = $('#dtInicio').val();
        dtFin = $('#dtTerminacion').val();

        if (dtIni != '' && dtFin != '') {
            if (dtIni > dtFin) {
                alert('ERROR, FECHA DE TERMINACION DEBE SER MAYOR A LA INCIAL');
                 $('#dtTerminacion').focus();
            } else {
                $('#txtPlazoEj').val(difDate(dtIni,dtFin));
            }
        } else {
            alert('ERROR SE DEBE ESCRIBIR FECHA INCIAL Y DE TERMINACION');
            if(dtIni!=''){$('#dtInicio').focus();}else{$('#dtTerminacion').focus();}
        }


    });





    //validar formulario 
    $("#btnIngresar").click(function () {

        var sbId = $("#txtId").val();
        var nuDepend = $("#cmbDepend").val();
        var sbSeccion = $("#txtSeccion").val();
        var nuMSelecc = $("#cmbMSelecc").val();
        var nuCausal = $("#cmbCausal").val();
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
         
        var arrayInfo = {0: sbId + "|#txtId",
            1: nuDepend + "|#cmbDepend",
            2: sbSeccion + "|#txtSeccion",
            3: nuMSelecc + "|#cmbMSelecc",
            4: nuCausal + "|#cmbCausal",
            5: nuTGasto + "|#cmbTGasto",
            6: dtSuscripcion + "|#dtSuscripcion",
            7: dtInicio + "|#dtInicio",
            8: dtTerminacion + "|#dtTerminacion",
            9: sbPlazo + "|#txtPlazoEj",
            10: sbObject + "|#txtObject",
            11: nuValor + "|#txtValorIni",
            12: nuPublicSecop + "|#cmbPublicSecop",
            13: dtPublicSecop + "|#dtPublicSecop",
            14: nuActSecop + "|#cmbActSecop",
            15: sbLinkSecop + "|#txtLinkSecop",
            16: nuFiducia + "|#cmbFiducia",
            17: nuAfecPresupt + "|#cmbAfecTaPresupt",
            18: nuFuncion + "|#cmbFuncion"
        }

        var blValido = isEmptyFields(arrayInfo);
        blValido = minChar(['#txtId, #txtResAdjudicacion'], 5);


        //Validar Campos Vacios
        if (blValido)
        {
            insert();
        }

    });

});


function insert() {

    var formData = $("#frmContracto").serialize();
    var sbAction = $("#frmContracto").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                alert("SE REGISTRO CORRECTAMENTE");
                location.href = "contracto";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}
;
