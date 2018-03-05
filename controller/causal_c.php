<?php
require_once("../model/causal_m.php");
$resultInfo;
$sbmsj = "";
$objCausal = new causal();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objCausal->setNuId($_POST['txtIdT']);
    $resultInfo = $objCausal->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objCausal->setSbCod(trim($_POST['txtCod']));
            $objCausal->setSbNombre(trim($_POST['txtNombre']));
            $objCausal->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objCausal->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objCausal->getList("c.id,c.cod,c.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="causalUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objCausal->setNuId(trim($_POST['txtId']));
            $objCausal->setSbCod(trim($_POST['txtCod']));
            $objCausal->setSbNombre(trim($_POST['txtNombre']));
            $objCausal->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objCausal->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>