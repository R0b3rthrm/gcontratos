<?php
require_once("../model/tContratist_m.php");
$resultInfo;
$sbmsj = "";
$objTContratist = new tContratist();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTContratist->setNuId($_POST['txtIdT']);
    $resultInfo = $objTContratist->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTContratist->setSbCod(trim($_POST['txtCod']));
            $objTContratist->setSbNombre(trim($_POST['txtNombre']));
            $objTContratist->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTContratist->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTContratist->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom","t.id <> 0");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tContratistUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTContratist->setNuId(trim($_POST['txtId']));
            $objTContratist->setSbCod(trim($_POST['txtCod']));
            $objTContratist->setSbNombre(trim($_POST['txtNombre']));
            $objTContratist->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTContratist->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>