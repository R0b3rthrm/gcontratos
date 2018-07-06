$(document).ready(function () {

    //Restricciones
    noCopyPaste([ '#txtSegment', '#txtObserv']);
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
    var sqlContratista = "select id, nombre, apellido1 from contratista where estado_id = 1";
    
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
    
    var id = returnIdUrl(window.location.href);
    $("#lblId").text(id[0]);
    $("#txtIdC").val(id[0]);

    var array = {txtIdC: id[0]};

    $.ajax({
        url: "controller/contracto_c.php",
        type: 'POST',
        data: array,
        success: function (data) {
             
            alert(data);
            var result = JSON.parse(data);

            $("#txtIdC").attr("id", "txtId");
            $("#txtId").attr("name", "txtId");
            
            comboBox(sqlDepend, "cmbDepend", result['depend_id'], '#divDepend');
            $("#txtSeccion").val(result['seccion']);
            comboBox(sqlMSelecc, "cmbMSelecc", result['m_selecc_id'], '#divMSelecc');
            comboBox(sqlCausal, "cmbCausal", result['causal_id'], '#divCausal');
            comboBox(sqlTContract, "cmbTContract", result['t_contract_id'], '#divTContract');
            comboBox(sqlTGasto, "cmbTGasto", result['t_gasto_id'], '#divGasto');
            $("#dtSuscripcion").val(result['fec_suscripc']);
            $("#dtInicio").val(result['fec_ini']);
            $("#dtTerminacion").val(result['fec_termn']);
            $("#txtPlazoEj").val(result['plazo_ejecuc']);
            comboBox(sqlContratista, "cmbContratista", result['contratista_id'], '#divContratista');
            $("#txtObject").val(result['objeto']);
            $("#txtResAdjudicacion").val(result['res_adjud']);
            if(result['fec_adjud']<'2000-01-01'){result['fec_adjud']='';}
            $("#dtAdjudicacion").val(result['fec_adjud']);
            $("#txtValorIni").val(result['valor_ini']);
            $("#cmbPactoAnticp").val(result['anticipo']);
            $("#txtValorAnticp").val(result['valor_anticp']);
            $("#cmbPublicSecop").val(result['public_secop']);
            if(result['fpublic_secop']<'2000-01-01'){result['fpublic_secop']='';}
            $("#dtPublicSecop").val(result['fpublic_secop']);
            $("#cmbActSecop").val(result['actulz_secop']);
            if(result['factulz_secop']<'2000-01-01'){result['factulz_secop']='';}
            $("#dtActSecop").val(result['factulz_secop']);
            $("#txtLinkSecop").val(result['link_secop']);
            $("#cmbFiducia").val(result['fiducia']);
            $("#txtObserv").val(result['observ']);
            $("#cmbAfecTaPresupt").val(result['afect_presupt']);
            comboBox(sqlTRecurs, "cmbTRecurs", result['t_recurs_id'], '#divTRecurs');
            comboBox(sqlTLiquid, "cmbTLiquid", result['t_liquid_id'], '#divTLiquid');
            $("#txtDocLiquid").val(result['doc_liquid']);
            if(result['fec_liquid']<'2000-01-01'){result['fec_liquid']='';}
            $("#dtLiquid").val(result['fec_liquid']);
            comboBox(sqlFuncion, "cmbFuncion", result['funcion_id'], '#divFuncion');
            $("#txtSegment").val(result['segmento']);
            $("#txtEje").val(result['eje']);
            $("#txtEst").val(result['est']);
            $("#txtProg").val(result['prog']);

        }
    });


    $("#btnIngresar").click(function () {

    var sbId = $("#txtId").val();
        var nuDepend = $("#cmbDepend").val();
        var sbSeccion = $("#txtSeccion").val();
        var nuMSelecc = $("#cmbMSelecc").val();
        var nuCausal = $("#cmbCausal").val();
        var nuTGasto = $("#cmbTGasto").val();
        var dtSuscripcion = $("#dtSuscripcion").val();
        var dtInicion = $("#dtInicio").val();
        var dtTerminacion = $("#dtTerminacion").val();
        var sbPlazo = $("#txtPlazoEj").val();
        var sbOject = $("#txtObject").val();

        var arrayInfo = {0: sbId + "|#txtId",
            1: nuDepend + "|#cmbDepend",
            2: sbSeccion + "|#txtSeccion",
            3: nuMSelecc + "|#cmbMSelecc",
            4: nuCausal + "|#cmbCausal",
            5: nuTGasto + "|#cmbTGasto",
            6: dtSuscripcion + "|#dtSuscripcion",
            7: dtInicion + "|#dtInicio",
            8: dtTerminacion + "|#dtTerminacion",
            9: sbPlazo + "|#txtPlazoEj",
            10: sbOject + "|#txtObject"}

        var blValido = isEmptyFields(arrayInfo);

        //Validar Campos Vacios
        if (blValido)
        {
            update();
        }


    });

});


function update() {

    var formData = $("#frmContracto").serialize();
    var sbAction = $("#frmContracto").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
              alert("SE ACTUALIZO CORRECTAMENTE")
              location.href = "contractoList";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}
;


