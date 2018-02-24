<?php

   require_once("../model/usuario_m.php");
	$blValido = "";
	$sbmsj = "";
    try{
        
    	$objUsuario = new usuario;	
    	$objUsuario->setNuId(trim($_POST['txtId']));
    	$objUsuario->setSbNombre(trim($_POST['txtNombre']));
    	$objUsuario->setSbApellido1(trim($_POST['txtApellido1']));
    	$objUsuario->setSbApellido2(trim($_POST['txtApellido2']));
    	$objUsuario->setSbTelefono(trim($_POST['txtTel']));
    	$objUsuario->setSbCelular(trim($_POST['txtCel']));
    	$objUsuario->setSbEmail(trim($_POST['txtEmail']));
    	$objUsuario->setSbLogin(trim($_POST['txtLogin']));
    	$objUsuario->setNuPerfil(trim($_POST['cmbPerfil']));
    	$objUsuario->setNuEstado(trim($_POST['cmbEstado']));
        $blValido = $objUsuario->saveUsuario();
        	
    }catch (Exception $e) {
					
		$sbmsj='Excepci�n capturada: '.$e->getMessage(). "\n";
					
	}
    echo $blValido;
   
	
?>