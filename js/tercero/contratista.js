$(document).ready(function () {
    
    $('#txtDV').hide();
    isNumber(['#txtId','#txtTel','#txtCel','#txtCanInteg']);
    alfNum(['#txtNombre', '#txtApellido1', '#txtApellido2']);
    maxChar(['#txtCanInteg'], 2);
     
    $('#cmbTDocument').change(function (){
        
        if($('#cmbTDocument').val()==1){ 
            $("#spNom").text('RAZON SOCIAL:');
            $("#txtDV").show();    
        }else{
            $("#spNom").text('NOMBRE:');
            $("#txtDV").hide();
        }    
    });

    $('#txtCanInteg').keyup(function (){
        
        var nuInteg = $("#txtCanInteg").val();
        
        if(nuInteg>10){
            msjModal('No puede haber mas de 10 integrantes','AT');
            $("#divInteg").html("");
            $("#txtCanInteg").val("");
            $("#txtCanInteg").focus();
        }else{
            setIntegrants(nuInteg);  
        }
    });
    
     //validar formulario 
    $("#btnIngresar").click(function () {
        
        var blValidoInteg = true;
        var nuTDocument = $("#cmbTDocument").val();
        var nuIdentificacion = $("#txtId").val();
        var nuDv= $("#txtDV").val();
        var sbNombre = $("#txtNombre").val();
        var nuContratista = $("#cmbTContratista").val();
        var nuClasific = $("#cmbTClasific").val();
        var nuCantInteg = $("#txtCanInteg").val();
        var nuEstado = $("#cmbEstado").val();
        
        var arrayInfo = {0: nuIdentificacion + "|#txtId",
            1: nuTDocument + "|#cmbTDocument",
            2: sbNombre + "|#txtNombre",
            3: nuContratista + "|#cmbTContratista",
            4: nuClasific + "|#cmbTClasific",
            5: nuCantInteg + "|#txtCanInteg",
            6: nuEstado + "|#cmbEstado"}

        var blValido = isEmptyFields(arrayInfo);
        
        if(nuDv!=''){
            $('#txtIdFinal').val(nuIdentificacion+"-"+nuDv);
        }else{
            $('#txtIdFinal').val(nuIdentificacion);
        }
        if(nuCantInteg>0){
            for(var i=1; i<=nuCantInteg; i++){
                if($("#cmbInteg"+i).val()==''){
                    blValidoInteg = false;
                }
            }
        }
        //Validar Campos Vacios
        if (blValidoInteg){
            if (blValido){
                insert();
            }
        }else{msjModal('Se Debe Ingresar Toda La Informacion','AT');}

    });
    
    
 });    
 
 function setIntegrants(nuInteg){
     
    var formData = {txtProcess:2,txtNuInteg:nuInteg};
    var sbAction = $("#frmContratista").attr("action");
     
    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
          
          $("#divInteg").html("");
          $("#divInteg").append(data);
          
          if(nuInteg>0){
                for(var i=1; i<=nuInteg; i++){
                    $("#cmbInteg"+i).chosen({
                             max_selected_options: 30,
                             max_shown_results: 30
                    });    
//    alert("#cmbInteg"+i);
                  //  setTimeout(function(){},400);
                }
          }
        }
    });
 }
 
 function insert() {

    var formData = $("#frmContratista").serialize();
    var sbAction = $("#frmContratista").attr("action");

    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                msjModal('Se Creo Correctamente El Contratista','OK');
                $("#frmContratista")[0].reset();
                $("#txtDV").hide();
                $("#divInteg").html("");
            } else {
                msjModal("Error Al Crear El Contratista",'ER');
            }
        }
    });
}

