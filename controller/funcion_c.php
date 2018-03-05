<?php
require_once("../model/funcion_m.php");
$resultInfo;
$sbmsj = "";
$objFuncion = new funcion();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objFuncion->setNuId($_POST['txtIdT']);
    $resultInfo = $objFuncion->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objFuncion->setSbCod(trim($_POST['txtCod']));
            $objFuncion->setSbNombre(trim($_POST['txtNombre']));
            $objFuncion->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objFuncion->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objFuncion->getList("f.id,f.cod,f.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="funcionUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objFuncion->setNuId(trim($_POST['txtId']));
            $objFuncion->setSbCod(trim($_POST['txtCod']));
            $objFuncion->setSbNombre(trim($_POST['txtNombre']));
            $objFuncion->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objFuncion->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>