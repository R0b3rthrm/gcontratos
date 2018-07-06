<?php
require_once("../model/tContrat_m.php");
$resultInfo;
$sbmsj = "";
$objTContrat = new tContrat();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $objTContrat->setNuId($_POST['txtIdT']);
    $resultInfo = $objTContrat->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objTContrat->setSbCod(trim($_POST['txtCod']));
            $objTContrat->setSbNombre(trim($_POST['txtNombre']));
            $objTContrat->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTContrat->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objTContrat->getList("t.id,t.cod,t.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="tContratUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objTContrat->setNuId(trim($_POST['txtId']));
            $objTContrat->setSbCod(trim($_POST['txtCod']));
            $objTContrat->setSbNombre(trim($_POST['txtNombre']));
            $objTContrat->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objTContrat->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepcion capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>