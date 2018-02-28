<?php

require_once("../model/usuario_m.php");
$resultInfo = "";
$sbmsj = "";
$nuProcess = trim($_POST['txtProcess']);
$objUsuario = new usuario;

try {

    if ($nuProcess == 1) {
       
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
        $resultInfo = $objUsuario->saveUsuario();
    } elseif ($nuProcess == 2) {
        
        $arrListUser=$objUsuario->getUserList("id,nombre,apellido1,apellido2,login,perfil_nom,estado_nom") ;
        
        $i=1;
        foreach ($arrListUser as $value){
           $resultInfo.='<tr><td>' . $i . '</td>'
                   . '<td>' . $value['id'] . '</td>'
                   . '<td>' . $value['nombre'] . '</td>'
                   . '<td>' . $value['apellido1'] .' '.$value['apellido2']. '</td>'
                   . '<td>' . $value['login'] . '</td>'
                   . '<td>' . $value['perfil_nom'] . '</td>'
                   . '<td>' . $value['estado_nom'] . '</td>'
                   . '<td>reset</td>'
                   . '<td><a href="#"> <IMG id="imgList" src="img/editar.png"/></a></td></tr>';			
		$i++; 
            
        }
        
        
    }
    
    
} catch (Exception $e) {

    $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
}
echo $resultInfo;
?>