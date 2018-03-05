<?php
require_once("../model/tLiquid_m.php");
$resultInfo;
$sbmsj = "";
$objTLiquid = new tLiquid();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTLiquid->setNuId($_POST['txtIdT']);
    $resultInfo = $objTLiquid->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTLiquid->setSbCod(trim($_POST['txtCod']));
            $objTLiquid->setSbNombre(trim($_POST['txtNombre']));
            $objTLiquid->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTLiquid->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTLiquid->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tLiquidUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTLiquid->setNuId(trim($_POST['txtId']));
            $objTLiquid->setSbCod(trim($_POST['txtCod']));
            $objTLiquid->setSbNombre(trim($_POST['txtNombre']));
            $objTLiquid->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTLiquid->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>