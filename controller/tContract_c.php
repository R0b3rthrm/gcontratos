<?php
require_once("../model/tContract_m.php");
$resultInfo;
$sbmsj = "";
$objTContract = new tContract();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTContract->setNuId($_POST['txtIdT']);
    $resultInfo = $objTContract->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTContract->setSbCod(trim($_POST['txtCod']));
            $objTContract->setSbNombre(trim($_POST['txtNombre']));
            $objTContract->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTContract->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTContract->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tContractUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTContract->setNuId(trim($_POST['txtId']));
            $objTContract->setSbCod(trim($_POST['txtCod']));
            $objTContract->setSbNombre(trim($_POST['txtNombre']));
            $objTContract->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTContract->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>