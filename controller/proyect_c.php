<?php
require_once("../model/proyect_m.php");
$resultInfo;
$sbmsj = "";
$objProyect = new proyect();

if (isset($_POST['txtIdP'])) {
    $resultInfo=array();
    $objProyect->setNuId($_POST['txtIdP']);
    $resultInfo = $objProyect->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objProyect->setSbCod(trim($_POST['txtCod']));
            $objProyect->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objProyect->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objProyect->getList("p.id,p.codigo,e.nombre as estado_nom","p.estado_id != 2");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['codigo'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="proyectUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objProyect->setNuId(trim($_POST['txtId']));
            $objProyect->setSbCod(trim($_POST['txtCod']));
            $objProyect->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objProyect->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>