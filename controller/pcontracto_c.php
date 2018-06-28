<?php

require_once("../model/contracto_m.php");
require_once("../model/tAvance_m.php");
require_once("../model/tNoved_m.php");
require_once("../model/acta_m.php");
require_once("../model/novedad_m.php");
require_once("../utils/utils.php");
$resultInfo;
$sbmsj = "";
$objContract = new contracto();



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
            $contracto = $objContract->getSbId();

            $resultInfo = '<table class="alt">'
                    . '<tr><td >Dependencia: </td><td colspan="3">' . $arrList['depend_nom'] . '</td><td>Seccion: </td><td colspan="3">' . $arrList['seccion'] . '</td></tr>'
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
                                ' . htmlActa($contracto) . '
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
                        <br/>
                          <div class="container2">
                                ' . htmlNovedad($contracto) . '
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
        } elseif ($nuProcess == 71) {
            
            $objActa = new acta();
            $contracto = $_POST['txtContracto'];
            $objActa->setNuTAvance(trim($_POST['cmbTAvance']));
            $objActa->setSbContracto(trim($contracto));
            $objActa->setDtFecha(trim($_POST['dtFecAct']));
            $objActa->setNuPorcentaje(trim($_POST['txtPorcentajActa']));

            if (empty($_POST['txtIdAct'])) {
                $result = $objActa->save();
            } else {
                $objActa->setNuId(trim($_POST['txtIdAct']));
                $result = $objActa->update();
            }

            if ($result) {
                $resultInfo = getTableActa($contracto);
            } else {
                $resultInfo = false;
            }
        } elseif ($nuProcess == 72) {

            $objActa = new acta();
            $objActa->setNuId($_POST['txtIdAct']);
            $resultInfo = $objActa->getListId();
            echo json_encode($resultInfo);
            exit;
        } elseif ($nuProcess == 73) {

            $contracto = $_POST['txtContracto'];
            $objActa = new acta();
            $objActa->setNuId($_POST['txtIdAct']);
            $result = $objActa->delete();

            if ($result) {
                $resultInfo = getTableActa($contracto);
            } else {
                $resultInfo = false;
            }

            echo ($resultInfo);
            exit;
        } elseif ($nuProcess == 81) {
            
            $objNovedad = new novedad();
            $contracto = $_POST['txtContracto'];
            $objNovedad->setNuTNoved(trim($_POST['cmbTNovedad']));
            $objNovedad->setSbContracto(trim($contracto));
            $objNovedad->setNuValor(trim($_POST['txtValor']));
            $objNovedad->setNuPlazo(trim($_POST['txtPlazo']));
            $objNovedad->setDtFecha(trim($_POST['dtFecNov']));

            if (empty($_POST['txtIdNov'])) {
                $result = $objNovedad->save();
            } else {
                $objNovedad->setNuId(trim($_POST['txtIdNov']));
                $result = $objNovedad->update();
            }

            if ($result) {
                $resultInfo = getTableNovedad($contracto);
            } else {
                $resultInfo = false;
            }
        } elseif ($nuProcess == 82) {

            $objNovedad = new novedad();
            $objNovedad->setNuId($_POST['txtIdNov']);
            $resultInfo = $objNovedad->getListId();
            echo json_encode($resultInfo);
            exit;
            
        } elseif ($nuProcess == 83) {

            $contracto = $_POST['txtContracto'];
            $objNovedad = new novedad();
            $objNovedad->setNuId($_POST['txtIdNov']);
            $result = $objNovedad->delete();

            if ($result) {
                $resultInfo = getTableNovedad($contracto);
            } else {
                $resultInfo = false;
            }

            echo ($resultInfo);
            exit;
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;

function htmlActa($contracto) {

    $objTAvance = new tAvance();
   
    //function comboBox($objUtils_m,$select,$id, $class = '', $valor ='', $event='', $func = '') {

    $sbAvancesComb = comboBox($objTAvance, 't.id,t.nombre', '','','cmbTAvance');

    $html = "  
            <script src='js/pcontracto/acta.js'></script>
                <form action='controller/pcontracto_c.php' method='post'  id='frmActa' name = 'frmActa'>
                    
                    <input id='txtProcess' name='txtProcess' value='71' hidden>
                    <input id='txtContracto' name='txtContracto' value='" . $contracto . "' hidden>
                    <input id='txtIdAct' name='txtIdAct' value='' hidden>
                    
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>T. AVANCE: </span>
                        <div class='6u$ 12u$(xsmall)'>" . $sbAvancesComb . "</div> 

                        <span class='input-group-addon'>FECHA:</span>
                        <input type='text' name='dtFecAct' id='dtFecAct'  placeholder=' 0000-00-00 '/>            

                        <span class='input-group-addon'>PORCENTAJE:</span>
                        <input type='text' name='txtPorcentajActa' id='txtPorcentajActa' placeholder=' % '/>         

                    </div>                
                    <br/>
                    
                    <input type='button' id='btnIngresarActa' name='btnIngresarActa' value='REGISTRAR' class='button small'/>&nbsp;&nbsp;
                    <input type='reset' value='LIMPIAR' class='button small' />
                    
                </form>
                <div id='tableActa'>" . getTableActa($contracto) . "</div>
            ";


    return $html;
}

function htmlNovedad($contracto) {

    $objTNovedad = new tNoved();   
    //function comboBox($objUtils_m,$select,$id, $class = '', $valor ='', $event='', $func = '') {

    $sbnNovedComb = comboBox($objTNovedad, 't.id,t.nombre','','', 'cmbTNovedad');
    
    $html = "  
            <script src='js/pcontracto/novedad.js'></script>
                <form action='controller/pcontracto_c.php' method='post'  id='frmNovedad' name = 'frmNovedad'>
                    
                    <input id='txtProcess' name='txtProcess' value='81' hidden>
                    <input id='txtContracto' name='txtContracto' value='4" . $contracto . "' hidden>
                    <input id='txtIdNov' name='txtIdNov' value='' hidden
                    
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>T. NOVEDAD: </span>
                        <div class='6u$ 12u$(xsmall)'>" . $sbnNovedComb . "</div> 

                        <span class='input-group-addon'>VALOR:</span>
                        <input type='text' name='txtValor' id='txtValor'  placeholder=' $$$ '/>            

                        <span class='input-group-addon'>PLAZO:</span>
                        <input type='text' name='txtPlazo' id='txtPlazo'  placeholder=' '/>            

                        <span class='input-group-addon'>FECHA:</span>
                        <input type='text' name='dtFecNov' id='dtFecNov'  placeholder=' 0000-00-00 '/>         

                    </div>                
                    <br/>
                    
                    <input type='button' id='btnIngresar' name='btnIngresar' value='REGISTRAR' class='button small'/>&nbsp;&nbsp;
                    <input type='reset' value='LIMPIAR' class='button small' />
                    
                </form>
                <div id='tableNovedad'>" . getTableNovedad($contracto) . "</div>
            ";


    return $html;
}

function getTableActa($contracto) {

    $objActa = new acta();

    $arrList = $objActa->getList("a.id as a_id, ta.cod as ta_cod,ta.nombre as ta_nom, a.fecha as a_fec,a.porcentaje as a_porc", 'a.contracto_id="' . $contracto . '"', 'a.id DESC');

    $tableInfo = "";

    if (count($arrList) > 0) {

        $tableInfo = "  <table id='tableListActa' name='tableListActa' align='center'>
                        <thead>
                            <tr>	
                                <TH> <label>#</label></TH>
                                <TH> <label>TIPO</label></TH>
                                <TH> <label>ACTA</label></TH>
                                <TH> <label>FECHA</label></TH>
                                <TH> <label>PORCENTAJE</label></TH>
                                <TH> <label>EDITAR</label></TH>
                                <TH> <label>ELIMINAR</label></TH>

                            </tr>             
                        </thead>
                        <tbody id='tableActa'>";

        $i = 1;
        foreach ($arrList as $value) {
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["ta_cod"] . "</td>"
                    . "<td>" . $value["ta_nom"] . "</td>"
                    . "<td>" . $value["a_fec"] . "</td>"
                    . "<td>" . $value["a_porc"] . "%</td>"
                    . "<td><a href='javascript:updateActa( " . $value["a_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a></td>"
                    . "<td><a href='javascript:deleteActa(" . $value["a_id"] . "," . '"' . $contracto . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a></td></tr>";
            $i++;
        }

            $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
                $(document).ready(function () {
                    $("#tableListActa").DataTable();
                });
              </script>';
       
    }

    return $tableInfo;
}

function getTableNovedad($contracto) {

    $objNovedad = new novedad();

    $arrList = $objNovedad->getList("n.id as n_id, tn.cod as tn_cod, tn.nombre as tn_nom, n.valor as n_val, n.plazo as n_pla, n.fecha as n_fec ", 'n.contracto_id="' . $contracto . '"', 'n.id DESC');

    $tableInfo = "";

    if (count($arrList) > 0) {

        $tableInfo = "  <table id='tableListNovedad' name='tableListNovedad' align='center'>
                        <thead>
                            <tr>	
                                <TH> <label>#</label></TH>
                                <TH> <label>TIPO</label></TH>
                                <TH> <label>NOVEDAD</label></TH>
                                <TH> <label>VALOR</label></TH>
                                <TH> <label>NOVEDAD</label></TH>
                                <TH> <label>FECHA</label></TH>
                                <TH> <label>EDITAR</label></TH>
                                <TH> <label>ELIMINAR</label></TH>

                            </tr>             
                        </thead>
                        <tbody id='tableActa'>";

        $i = 1;
        foreach ($arrList as $value) {
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["tn_cod"] . "</td>"
                    . "<td>" . $value["tn_nom"] . "</td>"
                    . "<td>" . $value["n_val"] . "</td>"
                    . "<td>" . $value["n_pla"] . "</td>"
                    . "<td>" . $value["n_fec"] . "</td>"
                    . "<td><a href='javascript:updateNovedad( " . $value["n_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a></td>"
                    . "<td><a href='javascript:deleteNovedad(" . $value["n_id"] . "," . '"' . $contracto . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a></td></tr>";
            $i++;
        }

            $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
                $(document).ready(function () {
                    $("#tableListNovedad").DataTable();
                });
              </script>';
       
    }

    return $tableInfo;
}

?>
