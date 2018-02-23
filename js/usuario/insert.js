$(document).ready(function () {
	
	alert("entre");

    var sqlPerfil = "select id, nombre from  perfil where estado_id = 1";
    var sqlEstado = "select id, nombre from  estado  ";
  
    //llenar combox
    comboBox(sqlPerfil, "cmbPerfil", '', '#divPerfil');
    comboBox(sqlEstado, "cmbEstado", '', '#divEstado');
  
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
    
   	    var arrayInfo = {0:nuIdentificacion+"|#txtId",
           1:sbNombre+"|#txtNombre",
           2:sbApellido1+"|#txtApellido1",
           3:sbUsuario+"|#txtLogin",
           4:nuPerfil+"|#cmbPerfil",
           5:nuEstado+"|#cmbEstado"}
    
       var blValido = isEmptyFields(arrayInfo);   

		alert("entre botton");

        //Validar Campos Vacios
        if (blValido)
        {
            insert(); 
        }
       /* else {

            var sbAction = $("#frmUsuario").attr("action");

                alert("antes del data");
            $.post(sbAction, $("#frmUsuario").serialize(), function (data) {
                
                alert(data);
                if(data){
                    
                    alert("SE REGISTRO CORRECTAMENTE");
                    location.href = "lista.php";

                }else {
                    alert("Error al Registrar la Informacion");
                }
            }, "json");

            return false;
        }
        
        */

    });

});


function insert(){  
    
    var formData = $("#frmUsuario").serialize();
    var sbAction = $("#frmUsuario").attr("action");
    
    $.ajax({
	   url: "controller/usuario_c.php",  
	   type: 'POST',
	   data: formData,
	   success: function(data){
            alert(data);
            if(data){	
                alert ("USUARIO REGISTRADO CORRECTAMENTE");
                location.href = "usuario";
            }else{
                alert ("ERROR AL REGISTRAR ");
            }     					
   	    }
    });
};
