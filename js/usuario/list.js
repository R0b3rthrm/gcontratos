$(document).ready(function () {

alert("entre");

    $.post("../../src/usuario/list.php", $("#frmUsuario").serialize(), function (data) {
        
		
		$("#resultado").html("");
        $("#resultado").append(data);            
    }, "json");

    $("#txtNombre").keyup(setList);
    $("#txtApellido1").keyup(setList);
    $("#txtApellido2").keyup(setList);
    $("#txtUsuario").keyup(setList);
    $("#txtPerfil").keyup(setList);
	
	
	
});

function setList(evento) {
	
    $.post("../../src/usuario/list.php", $("#frmUsuario").serialize(), function (data) {

        $("#resultado").html("");
        $("#resultado").append(data);

    }, "json");
}

