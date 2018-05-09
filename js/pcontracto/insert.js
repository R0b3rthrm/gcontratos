$(document).ready(function () {

    //Restricciones
    /*noCopyPaste([ '#txtSegment', '#txtObserv']);
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
    */
    var sqlContract = "select id,id, depend_nom from v_contracto where estado_id !=0";
    //llenar combox
    comboBox(sqlContract, "cmbContract", '', '#divContract', 'onchange','setContracto()','select-wrapper');
    
    $("#divContract").click(function(){  $("#cmbContract").chosen({
            max_selected_options:30,
            max_shown_results:30	
    });});   
    
   $("#cmbContract").chosen();
    
      
    //$('#dtLiquid').datepicker({format: 'yyyy-mm-dd', autoclose: true});

});


function setContracto(){
    
    var formData = {txtProcess:4, cmbContract:$("#cmbContract").val()};
    var sbAction = "controller/contracto_c.php";
    
    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                alert(data);
                $("#infoContract").html('');
                $("#infoContract").append(data);

            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
    
}

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