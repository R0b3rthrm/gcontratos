$(document).ready(function(){
 /**
 * @author ROBERTH ROJAS
 */

 
 
$("#btnIngresar").click(function(){
    
    //realizo validaciones
	blValido = validadciones();

	if(blValido){
	
		//traigo info de las variables
		var sbLogin = $("#txtLogin").val();/*!< sbLogin me trae la informacino del login*/
		var sbClave = $("#txtPass").val();/*!< sbClave la contraseña del usuario */


		//Valido info de las variables y agrego una clase
		var array = {txtLogin:sbLogin,txtPass: sbClave};

		        
            $.ajax({

					url: "controller/login_c.php",  
					type: 'POST',
					data: array,
					success: function(data){
            	
            			if(data){
            			
            				alert ("BIENVENIDO AL SISTEMA");
            				location.href = "inicio";
            			
            			}else{
            
            				alert ("Usuario No Valido");
            			}
            					

					}

				});	

	}
});


 

 });
 
 //iniciio la funcion para validar campos
 function validadciones (){
	 
	var sbLogin = $("#txtLogin").val();

	var sbClave = $("#txtPass").val();
	 
	 if(sbLogin == ''){
		
		alert("Ingresar Login");
		$("#txtLogin").focus();
		return false;
	}
	
	if(sbClave == ''){
		
		alert("Ingresar Password");
		$("#txtPass").focus();
		return false;
	}
	
	return true;
	 
 };