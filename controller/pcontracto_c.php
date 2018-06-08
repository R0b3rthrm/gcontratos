<?php

require_once("../model/contracto_m.php");
require_once("../model/tAvance_m.php");
require_once("../model/acta_m.php");
require_once("../model/novedad_m.php");
require_once("../utils/utils.php");
$resultInfo;
$sbmsj = "";
$objContract = new contracto();
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
        } elseif ($nuProcess == 71) {

            $objActa = new acta();
            $contracto =$_POST['txtContracto'];
            $objActa->setNuTAvance(trim($_POST['cmbTAvance']));
            $objActa->setSbContracto(trim($contracto));
            $objActa->setDtFecha(trim($_POST['dtFechaActa']));
            $objActa->setNuPorcentaje(trim($_POST['txtPorcentajActa']));

            if (empty($_POST['txtId'])) {
                $result = $objActa->save();
            } else {
                $objActa->setNuId(trim($_POST['txtId']));
                $result = $objActa->update();
            }
            
            if ($result) {
                $resultInfo = getTableActa($contracto);
            } else {
                $resultInfo = false;
            }
        } elseif ($nuProcess == 72) {

            $objActa = new acta();
            $objActa->setNuId($_POST['txtId']);
            $resultInfo = $objActa->getListId();
            echo json_encode($resultInfo);
            exit;
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;

function htmlActa($contracto) {

    $objTAvance = new tAvance();
    $tableInfo = getTableActa($contracto);
    //function comboBox($objUtils_m,$select,$id, $class = '', $valor ='', $event='', $func = '') {

    $sbAvancesComb = comboBox($objTAvance, 't.id,t.nombre', 'cmbTAvance');

    $html = "  
            <script src='js/pcontracto/acta.js'></script>
                <form action='controller/pcontracto_c.php' method='post'  id='frmActa' name = 'frmActa'>
                    
                    <input id='txtProcess' name='txtProcess' value='71' hidden>
                    <input id='txtContracto' name='txtContracto' value='" . $contracto . "' hidden>
                    <input id='txtId' name='txtId' value='' hidden>
                    <div class='input-group input-group-sm'>
                        <span class='input-group-addon'>T. AVANCE: </span>
                        <div class='6u$ 12u$(xsmall)'>" . $sbAvancesComb . "</div> 

                        <span class='input-group-addon'>FECHA:</span>
                        <input type='text' name='dtFechaActa' id='dtFechaActa'  placeholder=' 0000-00-00 '/>            

                        <span class='input-group-addon'>PORCENTAJE:</span>
                        <input type='text' name='txtPorcentajActa' id='txtPorcentajActa' placeholder=' % '/>         

                    </div>                
                    <br/>
                    
                    <input type='button' id='btnIngresarActa' name='btnIngresarActa' value='REGISTRAR' class='button small'/>&nbsp;&nbsp;
                    <input type='reset' value='LIMPIAR' class='button small' />
                    
                </form>
                <div id='tableActa'>".getTableActa($contracto)."</div>
            ";


    return $html;
}

function getTableActa($contracto) {

    $objActa = new acta();

    $arrList = $objActa->getList("a.id as a_id, ta.id as ta_id,ta.nombre as ta_nom, a.fecha as a_fec,a.porcentaje as a_porc", 'a.contracto_id="'.$contracto.'"', 'a.id DESC');

    $tableInfo = "";

    if(count($arrList)>0){
        
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
            $tableInfo .= '<tr><td>' . $i . '</td>'
                    . '<td>' . $value['ta_id'] . '</td>'
                    . '<td>' . $value['ta_nom'] . '</td>'
                    . '<td>' . $value['a_fec'] . '</td>'
                    . '<td>' . $value['a_porc'] . '%</td>'
                    . '<td><a href="javascript:updateActa(' . $value['a_id'] . ')" > <IMG id="imgList" src="img/editar.png"/></a></td>'
                    . '<td><a href="javascript:deleteActa(' . $value['a_id'] . ')"  > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
            $i++;
        }
        $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
              
                $(document).ready(function () {
          
                    $("#tableListActa").DataTable({"language": {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrada de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",
                    }});
                });
              </script>';     
    }

    return $tableInfo;
}

?>
