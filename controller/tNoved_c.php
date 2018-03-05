<?php
require_once("../model/tNoved_m.php");
$resultInfo;
$sbmsj = "";
$objTNoved = new tNoved();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTNoved->setNuId($_POST['txtIdT']);
    $resultInfo = $objTNoved->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTNoved->setSbCod(trim($_POST['txtCod']));
            $objTNoved->setSbNombre(trim($_POST['txtNombre']));
            $objTNoved->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTNoved->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTNoved->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tNovedUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTNoved->setNuId(trim($_POST['txtId']));
            $objTNoved->setSbCod(trim($_POST['txtCod']));
            $objTNoved->setSbNombre(trim($_POST['txtNombre']));
            $objTNoved->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTNoved->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>