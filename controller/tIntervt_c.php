<?php
require_once("../model/tIntervt_m.php");
$resultInfo;
$sbmsj = "";
$objTIntervt = new tIntervt();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTIntervt->setNuId($_POST['txtIdT']);
    $resultInfo = $objTIntervt->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTIntervt->setSbCod(trim($_POST['txtCod']));
            $objTIntervt->setSbNombre(trim($_POST['txtNombre']));
            $objTIntervt->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTIntervt->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTIntervt->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tIntervtUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTIntervt->setNuId(trim($_POST['txtId']));
            $objTIntervt->setSbCod(trim($_POST['txtCod']));
            $objTIntervt->setSbNombre(trim($_POST['txtNombre']));
            $objTIntervt->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTIntervt->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>