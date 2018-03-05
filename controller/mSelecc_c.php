<?php
require_once("../model/mSelecc_m.php");
$resultInfo;
$sbmsj = "";
$ObjMSelecc = new mSelecc();

if (isset($_POST['txtIdT'])) {
    $resultInfo=array();
    $ObjMSelecc->setNuId($_POST['txtIdT']);
    $resultInfo = $ObjMSelecc->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $ObjMSelecc->setSbCod(trim($_POST['txtCod']));
            $ObjMSelecc->setSbNombre(trim($_POST['txtNombre']));
            $ObjMSelecc->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $ObjMSelecc->save();
        } elseif ($nuProcess == 2) {

            $arrList = $ObjMSelecc->getList("m.id,m.cod,m.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['cod'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . '</td>'
                        . '<td><a href="mSeleccUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $ObjMSelecc->setNuId(trim($_POST['txtId']));
            $ObjMSelecc->setSbCod(trim($_POST['txtCod']));
            $ObjMSelecc->setSbNombre(trim($_POST['txtNombre']));
            $ObjMSelecc->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $ObjMSelecc->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>