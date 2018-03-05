<?php
require_once("../model/tRecurs_m.php");
$resultInfo;
$sbmsj = "";
$objTRecurs = new tRecurs();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTRecurs->setNuId($_POST['txtIdT']);
    $resultInfo = $objTRecurs->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTRecurs->setSbCod(trim($_POST['txtCod']));
            $objTRecurs->setSbNombre(trim($_POST['txtNombre']));
            $objTRecurs->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTRecurs->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTRecurs->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tRecursUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTRecurs->setNuId(trim($_POST['txtId']));
            $objTRecurs->setSbCod(trim($_POST['txtCod']));
            $objTRecurs->setSbNombre(trim($_POST['txtNombre']));
            $objTRecurs->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTRecurs->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>