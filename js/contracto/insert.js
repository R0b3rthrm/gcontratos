$(document).ready(function () {

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
    comboBox(sqlMSelecc, "divMSelecc", '', '#divMSelecc');
    comboBox(sqlCausal, "cmbCausal", '', '#divCausal');
    comboBox(sqlTContract, "cmbTContract", '', '#divTContract');
    comboBox(sqlTGasto, "cmbTGasto", '', '#divGasto');
    comboBox(sqlTRecurs, "cmbTRecurs", '', '#divTRecurs');
    comboBox(sqlTLiquid, "cmbTLiquid", '', '#divTLiquid');
    comboBox(sqlFuncion, "cmbFuncion", '', '#divFuncion');

    $('#dtSuscripcion').datepicker({format:'yyyy-mm-dd',autoclose:true});
    $('#dtInicio').datepicker({format:'yyyy-mm-dd',autoclose:true});
    $('#dtTerminacion').datepicker({format:'yyyy-mm-dd',autoclose:true});
    $('#dtAdjudicacion').datepicker({format:'yyyy-mm-dd',autoclose:true});
    $('#dtActSecop').datepicker({format:'yyyy-mm-dd',autoclose:true});
    $('#dtPublicSecop').datepicker({format:'yyyy-mm-dd',autoclose:true});
    $('#dtLiquid').datepicker({format:'yyyy-mm-dd',autoclose:true});
   


    //validar formulario 
    $("#btnIngresar").click(function () {

        var nuIdentificacion = $("#txtId").val();
        var sbNombre = $("#txtNombre").val();
        var sbApellido1 = $("#txtApellido1").val();
        var sbUsuario = $("#txtLogin").val();
        var nuPerfil = $("#cmbPerfil").val();
        var nuEstado = $("#cmbEstado").val();

        var arrayInfo = {0: nuIdentificacion + "|#txtId",
            1: sbNombre + "|#txtNombre",
            2: sbApellido1 + "|#txtApellido1",
            3: sbUsuario + "|#txtLogin",
            4: nuPerfil + "|#cmbPerfil",
            5: nuEstado + "|#cmbEstado"}

        var blValido = isEmptyFields(arrayInfo);

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
