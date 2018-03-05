<?php
require_once("../model/tClasific_m.php");
$resultInfo;
$sbmsj = "";
$objTClasific = new tClasific();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTClasific->setNuId($_POST['txtIdT']);
    $resultInfo = $objTClasific->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTClasific->setSbCod(trim($_POST['txtCod']));
            $objTClasific->setSbNombre(trim($_POST['txtNombre']));
            $objTClasific->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTClasific->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTClasific->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tClasificUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTClasific->setNuId(trim($_POST['txtId']));
            $objTClasific->setSbCod(trim($_POST['txtCod']));
            $objTClasific->setSbNombre(trim($_POST['txtNombre']));
            $objTClasific->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTClasific->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>