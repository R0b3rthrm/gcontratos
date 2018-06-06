<?php

require_once("../model/contracto_m.php");
require_once("../model/tAvance_m.php");
require_once("../model/acta_m.php");
require_once("../model/novedad_m.php");
require_once("../utils/utils.php");
$resultInfo;
$sbmsj = "";
$objContract = new contracto();
$objActa = new acta();
$objNovedad = new novedad();
    

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
                        ACTAS
                    </span>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" >
                <div class="card-body">
                <br/>
                    <div class="container2">
                        '.htmlActa().'
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <span class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseTwo">
                        NOVEDADES
                    </span>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse">
                <div class="card-body">
                  <div class="container2">
                      INFORMACION 2
                   </div>
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
                    <div class="container2">
                        INFORMACION 3
                    </div">
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

function htmlActa (){
   
    $objTAvance = new tAvance();
    //function comboBox($objUtils_m,$select,$id, $class = '', $valor ='', $event='', $func = '') {

    $sbAvancesComb = comboBox($objTAvance,'t.id,t.nombre','cmbTAvance');
   
    $html="  
                <form action='controller/pcontracto_c.php' method='post'  id='frmActas' name = 'frmActas'>

                    <div class='input-group input-group-sm'>
                        <span class='input-group-addon'>T. AVANCE: </span>
                        <div class='6u$ 12u$(xsmall)'>".$sbAvancesComb."</div> 

                        <span class='input-group-addon'>FECHA:</span>
                        <input type='text' name='dtFecha' id='dtFecha'  placeholder=' 0000-00-00 '/>            

                        <span class='input-group-addon'>PORCENTAJE:</span>
                        <input type='text' name='txtPorcentaj' id='txtPorcentaj' placeholder=' % '/>         

                    </div>                


                </form>
            ";

    
    return $html;
    
}
?>
