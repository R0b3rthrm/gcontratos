<?php
require_once("../model/tTermin_m.php");
$resultInfo;
$sbmsj = "";
$objTTermin = new tTermin();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTTermin->setNuId($_POST['txtIdT']);
    $resultInfo = $objTTermin->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTTermin->setSbCod(trim($_POST['txtCod']));
            $objTTermin->setSbNombre(trim($_POST['txtNombre']));
            $objTTermin->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTTermin->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTTermin->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tTerminUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTTermin->setNuId(trim($_POST['txtId']));
            $objTTermin->setSbCod(trim($_POST['txtCod']));
            $objTTermin->setSbNombre(trim($_POST['txtNombre']));
            $objTTermin->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTTermin->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>