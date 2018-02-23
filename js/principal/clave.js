$(document).on("submit",function(){

	alert("entre");
	
	if($("#txtClaveAntigua").val() ==""){
		alert("Clave Antigua Es Un Campo Obligatorio");
		$("#txtClaveAntigua").focus();
		return false
	}

	if($("#txtClaveNueva").val() ==""){
		alert("Clave Nueva Es Un Campo Obligatorio");
		$("#txtClaveNueva").focus();
		return false
	}
	if($("#txtConfirmarClave").val() ==""){
		alert("Confirar Clave Es Un Campo Obligatorio");
		$("#txtConfirmarClave").focus();
		return false
	}




	//traigo info de las variables

	var sbClave = $("#txtClaveAntigua").val();

	var sbNewClave = $("#txtClaveNueva").val();

	var sbNewClave2 = $("#txtConfirmarClave").val();

	var sbAction = $("#frmCambiarClave").attr("action");

	
	//validar ambas claves
	if (sbNewClave == sbNewClave2){


		//validar las cantidades de caracteres


		if(sbNewClave.length > 7){


			$.post(sbAction,$("#frmCambiarClave").serialize(), function(data){
	
	
	

			if(data){

			alert ("Se actulizo la clave correctamente");
			resetForm();
			
			}else{

			alert ("Error, Las Clave Actual No considen con el Usuario");	
			resetForm();

			}},"json");	

		}else{

		alert ("La clave debe tener minimo 8 caracteres");
		resetForm();

		}
			

	}//fin del if

	else{

		alert ("La clave nueva no coinciden con la confirmacion");

	}

	return false;

});

function resetForm(){
	
	$("#txtClaveAntigua").val('');
	$("#txtClaveNueva").val('');
	$("#txtConfirmarClave").val('');
}