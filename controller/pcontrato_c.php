<?php

require_once("../model/contrato_m.php");
require_once("../model/proyecto_m.php");
require_once("../model/tercero_m.php");
require_once("../model/poliza_m.php");
require_once("../model/tPoliza_m.php");
require_once("../model/interventor_m.php");
require_once("../model/tIntervt_m.php");
require_once("../model/tAvance_m.php");
require_once("../model/tNoved_m.php");
require_once("../model/acta_m.php");
require_once("../model/novedad_m.php");
require_once("../utils/utils.php");
$resultInfo;
$sbmsj = "";
$objContrat = new contrato();



if (isset($_POST['txtIdC'])) {
    $resultInfo = array();
    $objContrat->setSbId($_POST['txtIdC']);
    $resultInfo = $objContrat->getListId();
    echo json_encode($resultInfo);
    exit;
} else {

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1){
            
          //comboBox($objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = '')   
          $resultInfo = comboBox($objContrat, 'id,id,depend_nom', '','','cmbContrat','','','onchange','setContrato()');
            
            
        } else if ($nuProcess == 2) {

            $objContrat->setSbId($_POST['cmbContrat']);
            $arrList = $objContrat->getListId("v_contrato");
            $contrato = $objContrat->getSbId();

            $resultInfo = '<table class="alt">'
                    . '<tr><td >Dependencia: </td><td colspan="3">' . $arrList['depend_nom'] . '</td><td>Seccion: </td><td colspan="3">' . $arrList['seccion'] . '</td></tr>'
                    . '<tr><td>Contratista: </td><td colspan="3">' . $arrList['ter_ide'] . ' - ' . $arrList['ter_nom'] . ' ' . $arrList['ter_ape1'] .' ' . $arrList['ter_ape2'] . '</td><td>Valor Inicial: </td><td colspan="3">' . $arrList['valor_ini'] . '</td></tr>'
                    . '<tr><td>Modalidad</td><td>' . $arrList['selecc_nom'] . '</td><td>Causal: </td><td>' . $arrList['causal_nom'] . '</td><td>T. Contrato: </td><td>' . $arrList['tcontrat_nom'] . '</td><td >Gasto: </td><td>' . $arrList['tgasto_nom'] . '</td></tr>'
                    . '<tr><td>F. Suscripc: </td><td>' . $arrList['fec_suscripc'] . '</td><td>F. Ini Contract: </td><td>' . $arrList['fec_ini'] . '</td><td>F. Terminacio: </td><td>' . $arrList['fec_termn'] . '</td><td >P. Ejecucion: </td><td>' . $arrList['plazo_ejecuc'] . '</td></tr>'
                    . '<tr><td colspan="8">OBJETO: ' . $arrList['objeto'] . '</td></tr>'
                    . '</table>';

            //INGRESO EL ACORDION

            $resultInfo .= '<div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" >
                        <h5 class="mb-0">
                            <span  class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseProyect" >
                                PROYECTOS
                            </span>
                        </h5>
                    </div>

                    <div id="collapseProyect" class="collapse" >
                        <div class="card-body">
                        <br/>
                            <div class="container2">
                               ' . htmlProyect($contrato) . '
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" >
                        <h5 class="mb-0">
                            <span  class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseDispon" >
                                DISPONIBILIDAD
                            </span>
                        </h5>
                    </div>

                    <div id="collapseDispon" class="collapse" >
                        <div class="card-body">
                        <br/>
                            <div class="container2">
                               DISPONIBILIDAD
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" >
                        <h5 class="mb-0">
                            <span  class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapsePoliza" >
                                POLIZAS
                            </span>
                        </h5>
                    </div>

                    <div id="collapsePoliza" class="collapse" >
                        <div class="card-body">
                        <br/>
                            <div class="container2">
                               ' . htmlPoliza($contrato) . '
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" >
                        <h5 class="mb-0">
                            <span  class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseIntervent" >
                                INTERVENTOR
                            </span>
                        </h5>
                    </div>

                    <div id="collapseIntervent" class="collapse" >
                        <div class="card-body">
                        <br/>
                            <div class="container2">
                               ' . htmlIntervent($contrato) . '
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" >
                        <h5 class="mb-0">
                            <span  class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseActa" >
                                ACTAS
                            </span>
                        </h5>
                    </div>

                    <div id="collapseActa" class="collapse" >
                        <div class="card-body">
                        <br/>
                            <div class="container2">
                                ' . htmlActa($contrato) . '
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <span class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapseNovedad">
                                NOVEDADES
                            </span>
                        </h5>
                    </div>
                    <div id="collapseNovedad" class="collapse">
                        <div class="card-body">
                        <br/>
                          <div class="container2">
                                ' . htmlNovedad($contrato) . '
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
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <span class="text-mutedfont-weight-bold" data-toggle="collapse" data-target="#collapse4">
                                Collapsible Group Item #3
                            </span>
                        </h5>
                    </div>
                    <div id="collapse4" class="collapse" >
                        <div class="card-body">
                            <div class="container2">
                                INFORMACION 4
                            </div">
                        </div>
                    </div>
                </div>
            </div>';
        }else if ($nuProcess == 31) {
            
            $objProyecto = new proyecto();
            $contrato = $_POST['txtContrato'];
            $objProyecto->setSbContrato(trim($contrato));
            $objProyecto->setSbCod(trim($_POST['txtCodPro']));
            $objProyecto->setSbCodAct(trim($_POST['txtCodActPro']));
            $objProyecto->setDtFecIni(trim($_POST['dtFecIniPro']));
            $objProyecto->setDtFecFin(trim($_POST['dtFecFinPro']));
            $objProyecto->setNuPorcentaje(trim($_POST['txtPorcentajePro']));
           
           
            if (empty($_POST['txtIdProyecto'])) {
                $result = $objProyecto->save();
            } else {
                $objProyecto->setNuId(trim($_POST['txtIdProyecto']));
                $result = $objProyecto->update();
            }

            if ($result) {
                $resultInfo = getTableProyecto($contrato);
            } else {
                $resultInfo = false;
            }
        }elseif ($nuProcess == 32) {

            $objProyecto = new proyecto();
            $objProyecto->setNuId($_POST['txtIdProyecto']);
            $resultInfo = $objProyecto->getListId();
            echo json_encode($resultInfo);
            exit;
        } elseif ($nuProcess == 33) {
            
            $objProyecto = new proyecto();
            $contrato = $_POST['txtContrato'];
            $objProyecto->setNuId($_POST['txtIdProyecto']);
            $result = $objProyecto->delete();

            if ($result) {
                $resultInfo = getTableProyecto($contrato);
            } else {
                $resultInfo = false;
            }

            echo ($resultInfo);
            exit;
        }else if ($nuProcess == 51) {
            
            $objPoliza = new poliza();
            $contrato = $_POST['txtContrato'];
            $objPoliza->setSbContrato(trim($contrato));
            $objPoliza->setNuTerceroID(trim($_POST['cmbTerceroPol']));
            $objPoliza->setSbNumPoliza(trim($_POST['txtNumPoliza']));
            $objPoliza->setDtFecExp(trim($_POST['dtFecExpPol']));
            $objPoliza->setSbResulucion(trim($_POST['txtResolucPol']));
            $objPoliza->setDtFecApro(trim($_POST['txtFecAproPol']));
            $objPoliza->setNuTPoliza(trim($_POST['cmbTPolizaPol']));
            $objPoliza->setNuValor(trim($_POST['txtValorPol']));
            $objPoliza->setDtFecIni(trim($_POST['dtFecIniPol']));
            $objPoliza->setDtFecFin(trim($_POST['dtFecFinPol']));
          
            if (empty($_POST['txtIdPoliza'])) {
                $result = $objPoliza->save();
            } else {
                $objPoliza->setNuId(trim($_POST['txtIdPoliza']));
                $result = $objPoliza->update();
            }

            if ($result) {
                $resultInfo = getTablePoliza($contrato);
            } else {
                $resultInfo = false;
            }
        }elseif ($nuProcess == 52) {

            $objPoliza = new poliza();
            $objPoliza->setNuId($_POST['txtIdPoliza']);
            $resultInfo = $objPoliza->getListId();
            echo json_encode($resultInfo);
            exit;
        } elseif ($nuProcess == 53) {
            
            $objPoliza = new poliza();
            $contrato = $_POST['txtContrato'];
            $objPoliza->setNuId($_POST['txtIdPoliza']);
            $result = $objPoliza->delete();

            if ($result) {
                $resultInfo = getTablePoliza($contrato);
            } else {
                $resultInfo = false;
            }

            echo ($resultInfo);
            exit;
        }elseif ($nuProcess == 61) {
            
            $objInterv = new interventor();
            $contrato = $_POST['txtContrato'];
            $objInterv->setSbContrato(trim($contrato));
            $objInterv->setNuTerceroID(trim($_POST['cmbTercero']));
            $objInterv->setNuTIntervt(trim($_POST['cmbTInterv']));
            $objInterv->setNuPlanta(trim($_POST['cmbPlanta']));
            $objInterv->setSbNumContrat(trim($_POST['txtNumContrato']));
            $objInterv->setNuPorcentaje(trim($_POST['txtPorcentajInterv']));
            

            if (empty($_POST['txtIdInterv'])) {
                $result = $objInterv->save();
            } else {
                $objInterv->setNuId(trim($_POST['txtIdInterv']));
                $result = $objInterv->update();
            }

            if ($result) {
                $resultInfo = getTableIntervent($contrato);
            } else {
                $resultInfo = false;
            }
        }elseif ($nuProcess == 62) {

            $objInterv = new interventor();
            $objInterv->setNuId($_POST['txtIdInterv']);
            $resultInfo = $objInterv->getListId();
            echo json_encode($resultInfo);
            exit;
        } elseif ($nuProcess == 63) {
            
            $objInterv = new interventor();
            $contrato = $_POST['txtContrato'];
            $objInterv->setNuId($_POST['txtIdInterv']);
            $result = $objInterv->delete();

            if ($result) {
                $resultInfo = getTableIntervent($contrato);
            } else {
                $resultInfo = false;
            }

            echo ($resultInfo);
            exit;
        } elseif ($nuProcess == 71) {
            
            $objActa = new acta();
            $contrato = $_POST['txtContrato'];
            $objActa->setNuTAvance(trim($_POST['cmbTAvance']));
            $objActa->setSbContrato(trim($contrato));
            $objActa->setDtFecha(trim($_POST['dtFecAct']));
            $objActa->setNuPorcentaje(trim($_POST['txtPorcentajActa']));

            if (empty($_POST['txtIdAct'])) {
                $result = $objActa->save();
            } else {
                $objActa->setNuId(trim($_POST['txtIdAct']));
                $result = $objActa->update();
            }

            if ($result) {
                $resultInfo = getTableActa($contrato);
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

            $contrato = $_POST['txtContrato'];
            $objActa = new acta();
            $objActa->setNuId($_POST['txtIdAct']);
            $result = $objActa->delete();

            if ($result) {
                $resultInfo = getTableActa($contrato);
            } else {
                $resultInfo = false;
            }

            echo ($resultInfo);
            exit;
        } elseif ($nuProcess == 81) {
            
            $objNovedad = new novedad();
            $contrato = $_POST['txtContrato'];
            $objNovedad->setNuTNoved(trim($_POST['cmbTNovedad']));
            $objNovedad->setSbContrato(trim($contrato));
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
                $resultInfo = getTableNovedad($contrato);
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

            $contrato = $_POST['txtContrato'];
            $objNovedad = new novedad();
            $objNovedad->setNuId($_POST['txtIdNov']);
            $result = $objNovedad->delete();

            if ($result) {
                $resultInfo = getTableNovedad($contrato);
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

function htmlProyect($contrato) {
    
    $objProyecto = new proyecto();
    
   //$sbAvancesComb = comboBox($objTAvance, 't.id,t.nombre', '','','cmbTAvance');

    $html = "  
            <script src='js/pcontrato/proyecto.js'></script>
                <form action='controller/pcontrato_c.php' method='post'  id='frmProyecto' name = 'frmProyecto'>
                    
                    <input id='txtProcess' name='txtProcess' value='31' hidden>
                    <input id='txtContracto' name='txtContrato' value='" . $contrato . "' hidden>
                    <input id='txtIdProyecto' name='txtIdProyecto' value='' hidden>
                    
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>CODIGO DEL PROYECTO: </span>
                        <input type='text' name='txtCodPro' id='txtCodPro' placeholder='  '/>         
                        
                    </div>                
											
                    <br/>
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>COD ACTIVIDAD: </span>
                        <input type='text' name='txtCodActPro' id='txtCodActPro' placeholder='  '/>         



                        <span class='input-group-addon'>F. INICIO ACT:</span>
                        <input type='text' name='dtFecIniPro' id='dtFecIniPro' placeholder=' 0000-00-00 '/>         
                                     

                        <span class='input-group-addon'>F. FINAL ACT:</span>
                        <input type='text' name='dtFecFinPro' id='dtFecFinPro' placeholder=' 0000-00-00 '/>             

                        <span class='input-group-addon'>Porcentaje:</span>
                        <input type='text' name='txtPorcentajePro' id='txtPorcentajePro' placeholder=' % '/>         

                    </div>                
                                    
                    <br/>
                    
                    <input type='button' id='btnIngresarPro' name='btnIngresarPro' value='REGISTRAR' class='button small'/>&nbsp;&nbsp;
                    <input type='reset' value='LIMPIAR' class='button small' />
                    
                </form>
                <div id='tableProyecto'>". getTableProyecto($contrato). "</div>
            ";

    return $html;   
}


function htmlPoliza($contrato) {
    
    $objTercero = new tercero();
    $objTPoliza = new tPoliza();
   
    //f$objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = ''
    $sbTerceroCmb = comboBox($objTercero, 't.id, t.id_ter,t.nombre, t.apellido1, t.apellido2', 't.estado_id = 1 AND t.t_tercero = 2', 't.nombre','cmbTerceroPol');
    $sbTPolizaCmb = comboBox($objTPoliza, 't.id, t.nombre', 't.estado_id = 1', 't.nombre','cmbTPolizaPol');
    //$sbAvancesComb = comboBox($objTAvance, 't.id,t.nombre', '','','cmbTAvance');

    $html = "  
            <script src='js/pcontrato/poliza.js'></script>
                <form action='controller/pcontrato_c.php' method='post'  id='frmPoliza' name = 'frmPoliza'>
                    
                    <input id='txtProcess' name='txtProcess' value='51' hidden>
                    <input id='txtContracto' name='txtContrato' value='" . $contrato . "' hidden>
                    <input id='txtIdPoliza' name='txtIdPoliza' value='' hidden>
                    
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>ASEGURADORA: </span>
                        <div class='6u$ 12u$(xsmall)'>" . $sbTerceroCmb . "</div> 
                       
                    </div>                
											
                    <br/>
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>NRO POLIZA: </span>
                        <input type='text' name='txtNumPoliza' id='txtNumPoliza' placeholder='  '/>         



                        <span class='input-group-addon'>F. EXPEDICION:</span>
                        <input type='text' name='dtFecExpPol' id='dtFecExpPol' placeholder=' 0000-00-00 '/>         
                                     

                        <span class='input-group-addon'>RESOLUCION DE APROB.:</span>
                        <input type='text' name='txtResolucPol' id='txtResolucPol' placeholder=''/>         

                        <span class='input-group-addon'>F. APROBACION:</span>
                        <input type='text' name='txtFecAproPol' id='txtFecAproPol' placeholder=' 0000-00-00 '/>         

                    </div>                
                    <br/>
                    <div class='input-group input-group-sm'>

                        <span class='input-group-addon'>T. POLIZA: </span>
                        <div class='6u$ 12u$(xsmall)'>" . $sbTPolizaCmb . "</div> 

                        <span class='input-group-addon'>VALOR ASEGURADO:</span>
                        <input type='text' name='txtValorPol' id='txtValorPol' placeholder='  '/>         
                        
                        <span class='input-group-addon'>F. INICIAL:</span>
                        <input type='text' name='dtFecIniPol' id='dtFecIniPol' placeholder=' 0000-00-00 '/>         

                        <span class='input-group-addon'>F. FINAL:</span>
                        <input type='text' name='dtFecFinPol' id='dtFecFinPol' placeholder=' 0000-00-00 '/>         

                    </div>                
                    <br/>
                    
                    <input type='button' id='btnIngresarPol' name='btnIngresarPol' value='REGISTRAR' class='button small'/>&nbsp;&nbsp;
                    <input type='reset' value='LIMPIAR' class='button small' />
                    
                </form>
                <div id='tablePoliza'>". getTablePoliza($contrato). "</div>
            ";

    return $html;   
}

function htmlIntervent($contrato) {
    
    $objTercero = new tercero();
    $objTIntervent = new tIntervt();
   
    //f$objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = ''
    $sbTerceroCmb = comboBox($objTercero, 't.id, t.id_ter, t.apellido1, t.apellido2', 't.estado_id = 1 AND t.t_tercero = 3', 't.nombre','cmbTercero');
    $sbIntervCmb = comboBox($objTIntervent, 't.id, t.nombre', 't.estado_id = 1', 't.nombre','cmbTInterv');
    //$sbAvancesComb = comboBox($objTAvance, 't.id,t.nombre', '','','cmbTAvance');

    $html = "  
            <script src='js/pcontrato/interventor.js'></script>
                <form action='controller/pcontrato_c.php' method='post'  id='frmInterv' name = 'frmInterv'>
                    
                    <input id='txtProcess' name='txtProcess' value='61' hidden>
                    <input id='txtContracto' name='txtContrato' value='" . $contrato . "' hidden>
                    <input id='txtIdInterv' name='txtIdInterv' value='' hidden>
                    
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>INTERVENTOR: </span>
                        <div class='6u$ 12u$(xsmall)'>" . $sbTerceroCmb . "</div> 
                       
                    </div>                
                    <br/>
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>T. INTERVENTOR: </span>
                        <div class='6u$ 12u$(xsmall)'>" . $sbIntervCmb . "</div> 

                        <span class='input-group-addon'>DE PLANTA:</span>
                        <select id='cmbPlanta' name='cmbPlanta'>
                            <option value=''>- Seleccionar -</option>
                            <option value='2'>No</option>
                            <option value='1'>Si</option>
                        </select>              

                        <span class='input-group-addon'>N. CONTRATO:</span>
                        <input type='text' name='txtNumContrato' id='txtNumContrato' placeholder='  '/>         

                        <span class='input-group-addon'>PORCENTAJE:</span>
                        <input type='text' name='txtPorcentajInterv' id='txtPorcentajInterv' placeholder=' % '/>         

                    </div>                
                    <br/>
                    
                    <input type='button' id='btnIngresarInterv' name='btnIngresarInterv' value='REGISTRAR' class='button small'/>&nbsp;&nbsp;
                    <input type='reset' value='LIMPIAR' class='button small' />
                    
                </form>
                <div id='tableInterv'>". getTableIntervent($contrato). "</div>
            ";


    return $html;
    
}

function htmlActa($contrato) {

    $objTAvance = new tAvance();
   
    //function comboBox($objUtils_m,$select,$id, $class = '', $valor ='', $event='', $func = '') {

    $sbAvancesComb = comboBox($objTAvance, 't.id,t.nombre', 't.estado_id=1','t.nombre','cmbTAvance');

    $html = "  
            <script src='js/pcontrato/acta.js'></script>
                <form action='controller/pcontrato_c.php' method='post'  id='frmActa' name = 'frmActa'>
                    
                    <input id='txtProcess' name='txtProcess' value='71' hidden>
                    <input id='txtContracto' name='txtContrato' value='" . $contrato . "' hidden>
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
                <div id='tableActa'>" . getTableActa($contrato) . "</div>
            ";


    return $html;
}

function htmlNovedad($contrato) {

    $objTNovedad = new tNoved();   
    //function comboBox($objUtils_m,$select,$id, $class = '', $valor ='', $event='', $func = '') {

    $sbnNovedComb = comboBox($objTNovedad, 't.id,t.nombre','t.estado_id=1','t.nombre', 'cmbTNovedad');
    
    $html = "  
            <script src='js/pcontrato/novedad.js'></script>
                <form action='controller/pcontrato_c.php' method='post'  id='frmNovedad' name='frmNovedad'>
                    
                    <input id='txtProcess' name='txtProcess' value='81' hidden/>
                    <input id='txtContracto' name='txtContrato' value='" . $contrato . "' hidden/>
                    <input id='txtIdNov' name='txtIdNov' value='' hidden/>
                    
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>T. NOVEDAD: </span>
                        <div class='6u$ 12u$(xsmall)' >" . $sbnNovedComb . "</div> 

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
                <div id='tableNovedad'>" . getTableNovedad($contrato) . "</div>
            ";


    return $html;
}

function getTableProyecto($contrato) {

    $objProyecto = new proyecto();

    $arrList = $objProyecto->getList("p.id as p_id, p.cod as p_cod, p.cod_act as act_cod, p.fec_ini as fec_ini, p.fec_fin as fec_fin, p.porcentaje as porcentaje ", 'p.contrato_id="' . $contrato . '"', 'p.id DESC');

    $tableInfo = "";

    if (count($arrList) > 0) {

        $tableInfo = "  <table id='tableListProyecto' name='tableListProyecto' align='center'>
                        <thead>
                            <tr>	
                                <TH> <label>#</label></TH>
                                <TH> <label>CODIGO PROYECTO</label></TH>
                                <TH> <label>CODIGO ACTIVIDAD</label></TH>
                                <TH> <label>F. INICIO ACTIVIDAD</label></TH>
                                <TH> <label>F. FINAL ACTIVIDAD</label></TH>
                                <TH> <label>PORCENTAJE</label></TH>
                                <TH> <label>EDITAR</label></TH>
                                <TH> <label>ELIMINAR</label></TH>

                            </tr>             
                        </thead>
                        <tbody id='tableProyecto'>";

        $i = 1;
        foreach ($arrList as $value) {
            
            $tableInfo .= "<tr><td>" . $i . "</td>"

                    . "<td>" . $value["p_cod"] . "</td>"
                    . "<td>" . $value["act_cod"] . "</td>"
                    . "<td>" . $value["fec_ini"] . "</td>"
                    . "<td>" . $value["fec_fin"] . "</td>"
                    . "<td>" . $value["porcentaje"] . "</td>"
                    . "<td><a href='javascript:updateProyecto( " . $value["p_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a></td>"
                    . "<td><a href='javascript:deleteProyecto(" . $value["p_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a></td></tr>";
            $i++;
        }

            $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
                $(document).ready(function () {
                    setTableFrm(["#tableListProyecto"]);
                });
              </script>';
       
    }

    return $tableInfo;
}

function getTablePoliza($contrato) {

    $objPoliza = new poliza();

    $arrList = $objPoliza->getList("p.id as p_id, t.id_ter as ter_ide, t.nombre as ter_nom, t.apellido1 as ter_ape1, t.apellido2 as ter_ape2, p.num_poliza as num_pol, p.fec_exp as fec_exp, p.resolucion as resoluc, p.fec_apro as fec_apro, tp.nombre as tpo_nom, p.valor as valor, p.fec_ini, p.fec_fin as fec_fin", 'p.contrato_id="' . $contrato . '"', 'p.id DESC');

    $tableInfo = "";

    if (count($arrList) > 0) {

        $tableInfo = "  <table id='tableListPoliza' name='tableListPoliza' align='center'>
                        <thead>
                            <tr>	
                                <TH> <label>#</label></TH>
                                <TH> <label>ASEGURADORA - IDE</label></TH>
                                <TH> <label>NRO. POLIZA</label></TH>
                                <TH> <label>F. EXPEDICION</label></TH>
                                <TH> <label>RESOLUCION APRO</label></TH>
                                <TH> <label>F. APROBACION</label></TH>
                                <TH> <label>T. POLIZA</label></TH>
                                <TH> <label>VAL. ASEGURADO</label></TH>
                                <TH> <label>F. INICIAL</label></TH>
                                <TH> <label>F. FINAL</label></TH>
                                <TH> <label>EDITAR</label></TH>
                                <TH> <label>ELIMINAR</label></TH>

                            </tr>             
                        </thead>
                        <tbody id='tableInterv'>";

        $i = 1;
        foreach ($arrList as $value) {
            
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["ter_nom"] . " ". $value["ter_ape1"] ." ". $value["ter_ape2"] ." - ".$value["ter_ide"]."</td>"
                    . "<td>" . $value["num_pol"] . "</td>"
                    . "<td>" . $value["fec_exp"] . "</td>"
                    . "<td>" . $value["resoluc"] . "</td>"
                    . "<td>" . $value["fec_apro"] . "</td>"
                    . "<td>" . $value["tpo_nom"] . "</td>"
                    . "<td>" . $value["valor"] . "</td>"
                    . "<td>" . $value["fec_ini"] . "</td>"
                    . "<td>" . $value["fec_fin"] . "</td>"
                    . "<td><a href='javascript:updatePoliza( " . $value["p_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a></td>"
                    . "<td><a href='javascript:deletePoliza(" . $value["p_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a></td></tr>";
            $i++;
        }

            $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
                $(document).ready(function () {
                    setTableFrm(["#tableListPoliza"]);
                });
              </script>';
       
    }

    return $tableInfo;
}


function getTableIntervent($contrato) {

    $objInterv = new interventor();

    $arrList = $objInterv->getList("i.id as i_id, t.id_ter as ter_id, t.nombre as ter_nom, t.apellido1 as ter_ape1, t.apellido2 as ter_ape2, ti.nombre as  tin_nom, i.planta as planta , i.num_contrat as num_cont, i.porcentaje as porcentaje", 'i.contrato_id="' . $contrato . '"', 'i.id DESC');

    $tableInfo = "";

    if (count($arrList) > 0) {

        $tableInfo = "  <table id='tableListInterv' name='tableListInterv' align='center'>
                        <thead>
                            <tr>	
                                <TH> <label>#</label></TH>
                                <TH> <label>NRO ID</label></TH>
                                <TH> <label>NOMBRE</label></TH>
                                <TH> <label>T INTERVENTOR</label></TH>
                                <TH> <label>DE PLANTA</label></TH>
                                <TH> <label>NRO. CONTRATO</label></TH>
                                <TH> <label>PORCENTAJE</label></TH>
                                <TH> <label>EDITAR</label></TH>
                                <TH> <label>ELIMINAR</label></TH>

                            </tr>             
                        </thead>
                        <tbody id='tableInterv'>";

        $i = 1;
        foreach ($arrList as $value) {
            
            $planta="";
            if($value["planta"]==1){$planta = 'SI';}elseif ($value["planta"]==2) {$planta ='NO'; }
            
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["ter_id"] . "</td>"
                    . "<td>" . $value["ter_nom"] . " ". $value["ter_ape1"] ." ". $value["ter_ape2"] ."</td>"
                    . "<td>" . $value["tin_nom"] . "</td>"
                    . "<td>" . $planta . "</td>"
                    . "<td>" . $value["num_cont"] . "</td>"
                    . "<td>" . $value["porcentaje"] . "</td>"
                    . "<td><a href='javascript:updateInterv( " . $value["i_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a></td>"
                    . "<td><a href='javascript:deleteInterv(" . $value["i_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a></td></tr>";
            $i++;
        }

            $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
                $(document).ready(function () {
                    setTableFrm(["#tableListInterv"]);
                });
              </script>';
       
    }

    return $tableInfo;
}

function getTableActa($contrato) {

    $objActa = new acta();

    $arrList = $objActa->getList("a.id as a_id, ta.cod as ta_cod,ta.nombre as ta_nom, a.fecha as a_fec,a.porcentaje as a_porc", 'a.contrato_id="' . $contrato . '"', 'a.id DESC');

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
                    . "<td><a href='javascript:deleteActa(" . $value["a_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a></td></tr>";
            $i++;
        }

            $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
                $(document).ready(function () {
                    setTableFrm(["#tableListActa"]);
                });
              </script>';
       
    }

    return $tableInfo;
}

function getTableNovedad($contrato) {

    $objNovedad = new novedad();

    $arrList = $objNovedad->getList("n.id as n_id, tn.cod as tn_cod, tn.nombre as tn_nom, n.valor as n_val, n.plazo as n_pla, n.fecha as n_fec ", 'n.contrato_id="' . $contrato . '"', 'n.id DESC');

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
                    . "<td><a href='javascript:deleteNovedad(" . $value["n_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a></td></tr>";
            $i++;
        }

            $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
                $(document).ready(function () {
                    setTableFrm(["#tableListNovedad"]); 
                });
              </script>';
       
    }

    return $tableInfo;
}

?>
