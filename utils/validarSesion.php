<?php 

   //saca variable perfil de la sesion
   $sessionLogin = getSession("ID");
  
    
if ($sessionLogin == ""){
	$sbCadena="<script language='javascript'>";
	$sbCadena.="msjModal('Usuario No Autenticado','ER')";
	$sbCadena.="</script>";
	echo $sbCadena;

	$sbCadena="<script language='javascript'>";
	$sbCadena.="setTimeout(function () {
                        location.href ='".SERVERURL."'
                    }, 1000)";
	$sbCadena.="</script>";
	echo $sbCadena;  	
	}
	
	 	
?>