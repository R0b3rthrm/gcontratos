<?php
require_once("../model/depend_c.php");
$resultInfo;
$sbmsj = "";
$objDepend = new depend();

if (isset($_POST['txtIdDepend'])) {
    $resultInfo=array();
    $objDepend->setNuId($_POST['txtIdDepend']);
    $resultInfo = $objDepend->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objDepend->setSbNombre(trim($_POST['txtNombre']));
            $objDepend->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objDepend->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objDepend->getUserList("d.id,d.nombre,e.nombre as estado_nom");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['nombre'] . '</td>'
                        . '<td>' . $value['estado_nom'] . ' ' . $value['apellido2'] . '</td>'
                        . '<td><a href="dependUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objDepend->setNuId(trim($_POST['txtId']));
            $objDepend->setSbNombre(trim($_POST['txtNombre']));
            $objDepend->setNuEstado(trim($_POST['cmbEstado']));
            $resultInfo = $objDepend->update();
            
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>