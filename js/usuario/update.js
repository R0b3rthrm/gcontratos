$(document).ready(function () {
	
	var sqlPerfil = "select id, nombre from  perfil where estado_id = 1";
    var sqlEstado = "select id, nombre from  estado  ";
    var sqlEmpresa = "select id, nombre from  empresa  where estado_id = 1";
	
	var usuario_id = returnIdUrl(window.location.href);
	var array = {id: usuario_id[0]};
	$("#txtId").val(usuario_id[0]);

     $.post("../../src/usuario/edit.php",array,function(data){

		//llenar combox
		comboBox(sqlEmpresa,"cmbEmpresa", data[6],'#divEmpresa');
		comboBox(sqlPerfil,"cmbPerfil", data[8],'#divPerfil');
		comboBox(sqlEstado,"cmbEstado", data[9],'#divEstado');
			 
		
		$("#txtNombre").val(data[0]);
		$("#txtApellido1").val(data[1]);
		$("#txtApellido2").val(data[2]);
		$("#txtTel").val(data[3]);
		$("#txtCel").val(data[4]);
		$("#txtEmail").val(data[5]);
		$("#txtUsuario").val(data[7]);
		
				
     },"json");
	
	
    //validar formulario 
    $("#btnIngresar").click(function () {
		
		
		if($("#txtId").val() == ""){
			alert("ID Campo Vacio ");
			$("#txtId").focus();
			return false;
		}
	
		if($("#txtNombre").val() == ""){
			alert("Nombre Campo Vacio ");
			$("#txtNombre").focus();
			return false;
		}
		if($("#txtApellido1").val() == ""){
			alert("Apellido Campo Vacio ");
			$("#txtApellido1").focus();
			return false;
		}
	
		if(validateNoChar($("#txtTel").val(),7) == false){
			alert("Cantidad de Numeros del Telefono no es correcta");
			$("#txtTel").focus();
			return false;
		}
	
		if (validateNoChar($("#txtCel").val(),10) == false){
			alert("Cantidad de Numeros del Celular no es correcta");
			$("#txtCel").focus();
			return false;
		}
	
		if (validateEmail($("#txtEmail").val()) == false){
			alert("Ingrese un correo válido");
			$("#txtEmail").focus();
			return false;
		}
	

        var nuPerfil = $("#cmbPerfil").val();
        var nuEstado = $("#cmbEstado").val();
        var nuEmpresa = $("#cmbEmpresa").val();

        var nuIdentificacion = $("#txtId").val();
        var sbNombre = $("#txtNombre").val();
        var sbApellido1 = $("#txtApellido1").val();
        var sbEmail = $("#txtEmail").val()
        var sbTel = $("#txtTel").val()
        var sbCel = $("#txtCel").val()
        var sbUsuario = $("#txtUsuario").val();
        var sbClave = $("#txtClave").val();

       
		alert("entre botton");

        //Validar Campos Vacios
        if (sbTel == "" || sbCel == "" || nuPerfil == "" || nuEstado == "" || nuIdentificacion == "" || 
                sbNombre == "" || sbApellido1 == "" || sbEmail == "" || sbUsuario == "" || nuEmpresa == "")
        {
           alert("SE DEBE INGRESAR TODA LA INFORMACION");
        }//fin del if

        else {

            var sbAction = $("#frmUsuario").attr("action");
			
            $.post(sbAction, $("#frmUsuario").serialize(), function (data) {
				             
                if(data){
                    
                    alert("SE ACTUALIZO CORRECTAMENTE");
                    location.href = "lista.php";

                }else {
                    alert("Error al Registrar la Informacion");
                }
            }, "json");

            return false;
        }

    });

});

