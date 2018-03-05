<?php
require_once("../model/tGasto_m.php");
$resultInfo;
$sbmsj = "";
$objTGasto = new tGasto();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTGasto->setNuId($_POST['txtIdT']);
    $resultInfo = $objTGasto->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTGasto->setSbCod(trim($_POST['txtCod']));
            $objTGasto->setSbNombre(trim($_POST['txtNombre']));
            $objTGasto->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTGasto->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTGasto->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tGastoUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTGasto->setNuId(trim($_POST['txtId']));
            $objTGasto->setSbCod(trim($_POST['txtCod']));
            $objTGasto->setSbNombre(trim($_POST['txtNombre']));
            $objTGasto->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTGasto->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>