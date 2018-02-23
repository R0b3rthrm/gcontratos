<?php 
	require_once("../model/usuario_m.php");
	$sbValido = "";
	$sbmsj = "";
    try{
        
    	$usuario = new usuario;	
    	$sbValido=$usuario->validarLogin();	
        	
    }catch (Exception $e) {
					
		$sbmsj='Excepción capturada: '.$e->getMessage(). "\n";
					
	}
    echo $sbValido;

?>