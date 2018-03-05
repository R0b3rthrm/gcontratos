<?php
require_once("../model/tAvance_m.php");
$resultInfo;
$sbmsj = "";
$objTAvance = new tAvance();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTAvance->setNuId($_POST['txtIdT']);
    $resultInfo = $objTAvance->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTAvance->setSbCod(trim($_POST['txtCod']));
            $objTAvance->setSbNombre(trim($_POST['txtNombre']));
            $objTAvance->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTAvance->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTAvance->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tAvanceUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTAvance->setNuId(trim($_POST['txtId']));
            $objTAvance->setSbCod(trim($_POST['txtCod']));
            $objTAvance->setSbNombre(trim($_POST['txtNombre']));
            $objTAvance->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTAvance->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>