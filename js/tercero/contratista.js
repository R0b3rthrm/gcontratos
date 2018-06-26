$(document).ready(function () {
    
    $('#txtDV').hide();
    isNumber(['#txtId','#txtTel','#txtCel','#txtCanInteg']);
    alfNum(['#txtNombre', '#txtApellido1', '#txtApellido2', '#txtSeccion']);
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

    $('#txtCanInteg').keypress(function (){
        
        var nuInteg = ("#txtCanInteg").val();
        
        if(nuInteg>10){
            msjModal('No puede haber mas de 10 integrantes','AT');
        }else{
            setIntegrants(nuInteg);  
        }
        
    
    
 });    
 
 function setIntegrants (nuInteg){
     
    var formData = {txtProcess:5,txtNuInteg:nuInteg};
    var sbAction = $("#frmTerceros").attr("action");
     
    $.ajax({
        url: sbAction,
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                alert("SE REGISTRO CORRECTAMENTE");
                location.href = "usuario";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
 }
/*
    var sqlEstado = "select id, nombre from  estado  ";
    var sqlTDoc = "select id, cod, nombre from t_document where estado_id = 1";
    var sqlClasific = "select id, cod, nombre from t_clasific where estado_id = 1";
    var sqlNaturaleza = "select id, cod, nombre from t_contratist where estado_id = 1";

    //llenar combox
    $('#txtDV').hide();
    comboBox(sqlNaturaleza, "cmbNaturaleza", '', '#divNaturaleza');
    comboBox(sqlClasific, "cmbClasific", '', '#divClasific');
    comboBox(sqlTDoc, "cmbTDoc", '', '#divTDoc');
   // comboBox(sqlEstado, "cmbEstado", '', '#divEstado');

    $('#cmbTTercero').change(function (){
        
        if($('#cmbTTercero').val()==1){ 
            $("#spDiv1").text('TIPO CONTRATISTA:');
        }else{
            $("#spDiv1").text('NATURALEZA:');
        }
        
        
       
        
    });

    
    
    isNumber('#txtId');
    isNumber('#txtTel');
    isNumber('#txtCel');

   
    

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

    var formData = $("#frmUsuario").serialize();
    var sbAction = $("#frmUsuario").attr("action");

    $.ajax({
        url: "controller/usuario_c.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data) {
                alert("SE REGISTRO CORRECTAMENTE");
                location.href = "usuario";
            } else {
                alert("ERROR AL REGISTRAR ");
            }
        }
    });
}
;
*/