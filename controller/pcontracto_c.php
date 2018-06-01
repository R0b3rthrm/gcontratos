<?php

require_once("../model/contracto_m.php");
require_once("../utils/utils.php");
$resultInfo;
$sbmsj = "";
$objContract = new contracto;

if (isset($_POST['txtIdC'])) {
    $resultInfo = array();
    $objContract->setSbId($_POST['txtIdC']);
    $resultInfo = $objContract->getListId();
    echo json_encode($resultInfo);
    exit;
} else {

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objContract->setSbId($_POST['cmbContract']);
            $arrList = $objContract->getListId("v_contracto");


            $resultInfo = '<table class="alt">'
                    . '<tr><td>Dependencia: </td><td colspan="3">' . $arrList['depend_nom'] . '</td><td>Seccion: </td><td colspan="3">' . $arrList['seccion'] . '</td></tr>'
                    . '<tr><td>Contratista: </td><td colspan="3">' . $arrList['contratista_id'] . ' - ' . $arrList['contratista_nom'] . ' ' . $arrList['contratista_ape'] . '</td><td>Valor Inicial: </td><td colspan="3">' . $arrList['valor_ini'] . '</td></tr>'
                    . '<tr><td>Modalidad</td><td>' . $arrList['selecc_nom'] . '</td><td>Causal: </td><td>' . $arrList['causal_nom'] . '</td><td>T. Contracto: </td><td>' . $arrList['tcontract_nom'] . '</td><td >Gasto: </td><td>' . $arrList['tgasto_nom'] . '</td></tr>'
                    . '<tr><td>F. Suscripc: </td><td>' . $arrList['fec_suscripc'] . '</td><td>F. Ini Contract: </td><td>' . $arrList['fec_ini'] . '</td><td>F. Terminacio: </td><td>' . $arrList['fec_termn'] . '</td><td >P. Ejecucion: </td><td>' . $arrList['plazo_ejecuc'] . '</td></tr>'
                    . '<tr><td colspan="8">OBJETO: ' . $arrList['objeto'] . '</td></tr>'
                    . '</table>';

            //INGRESO EL ACORDION

            $resultInfo .= '<div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" >
                <h5 class="mb-0">
                    <span  class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseOne" >
                        Collapsible Group Item #1
                    </span>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" >
                <div class="card-body">
                <div class="container2 ">
                INFORMACION 1
                </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <span class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseTwo">
                        Collapsible Group Item #2
                    </span>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse">
                <div class="card-body">
                   INFORMACION 2
                 </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <span class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseThree">
                        Collapsible Group Item #3
                    </span>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" >
                <div class="card-body">
    INFORMACION 3
</div>
            </div>
        </div>
    </div>';
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>
