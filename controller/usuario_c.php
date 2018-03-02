<?php

require_once("../model/usuario_m.php");
$resultInfo;
$sbmsj = "";
$objUsuario = new usuario;

if (isset($_POST['txtIdUsuario'])) {
    $resultInfo=array();
    $id=$_POST['txtIdUsuario'];
    $resultInfo = $objUsuario->getUsersId($id);
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

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

            $arrListUser = $objUsuario->getUserList("id,nombre,apellido1,apellido2,login,perfil_nom,estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrListUser as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['apellido1'] . ' ' . $value['apellido2'] . '</td>'
                        . '<td>' . $value['login'] . '</td>'
                        . '<td>' . $value['perfil_nom'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a  class="button special small" href="javascript:resetPass('. $value['id'] .')">RESET</a></td>'
                        . '<td><a href="usuarioUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
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
            $resultInfo = $objUsuario->updateUsuario();
            
        }elseif($nuProcess == 4){
             $objUsuario->setNuId(trim($_POST['txtId']));
            $resultInfo = $objUsuario->resetPass();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>