$(document).ready(function () {
    
    $('#txtDV').hide();
    isNumber(['#txtId','#txtTel','#txtCel','#txtCanInteg']);
    alfNum(['#txtNombre', '#txtApellido1', '#txtApellido2']);
     
    $('#cmbTDocument').change(function (){
        
        if($('#cmbTDocument').val()==1){ 
            $("#spNom").text('RAZON SOCIAL:');
            $("#txtDV").show();    
        }else{
            $("#spNom").text('NOMBRE:');
            $("#txtDV").hide();
        }    
    });

     //validar formulario 
    $("#btnIngresar").click(function () {
        
        var blValidoInteg = true;
        var nuTDocument = $("#cmbTDocument").val();
        var nuIdentificacion = $("#txtId").val();
        var nuDv= $("#txtDV").val();
        var sbNombre = $("#txtNombre").val();
        var nuEstado = $("#cmbEstado").val();
        
        var arrayInfo = {0: nuIdentificacion + "|#txtId",
            1: nuTDocument + "|#cmbTDocument",
            2: sbNombre + "|#txtNombre",
            3: nuEstado + "|#cmbEstado"}

        var blValido = isEmptyFields(arrayInfo);
        
        if(nuDv!=''){
            $('#txtIdFinal').val(nuIdentificacion+"-"+nuDv);
        }else{
            $('#txtIdFinal').val(nuIdentificacion);
        }
        
        if (blValido){
            insert();
        }
        
    });
    
    
 });    
 
 
 function insert() {

    var formData = $("#frmInterventor").serialize();
    var sbAction = $("#frmInterventor").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                msjModal('Se Creo Correctamente El Interventor','OK');
                $("#frmInterventor")[0].reset();
                $("#txtDV").hide();
                $("#divInteg").html("");
            } else {
                msjModal("Error Al Crear El Interventor",'ER');
            }
        }
    });
}

