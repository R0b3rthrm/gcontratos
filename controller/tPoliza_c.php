<?php
require_once("../model/tPoliza_m.php");
$resultInfo;
$sbmsj = "";
$objTPoliza = new tPoliza();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTPoliza->setNuId($_POST['txtIdT']);
    $resultInfo = $objTPoliza->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTPoliza->setSbCod(trim($_POST['txtCod']));
            $objTPoliza->setSbNombre(trim($_POST['txtNombre']));
            $objTPoliza->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTPoliza->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTPoliza->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tPolizaUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTPoliza->setNuId(trim($_POST['txtId']));
            $objTPoliza->setSbCod(trim($_POST['txtCod']));
            $objTPoliza->setSbNombre(trim($_POST['txtNombre']));
            $objTPoliza->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTPoliza->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>