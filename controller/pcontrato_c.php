<?php

require_once("../model/contrato_m.php");
require_once("../model/proyecto_m.php");
require_once("../model/proyect_m.php");
require_once("../model/dispon_m.php");
require_once("../model/compro_m.php");
require_once("../model/disponibilidad_m.php");
require_once("../model/tercero_m.php");
require_once("../model/poliza_m.php");
require_once("../model/tPoliza_m.php");
require_once("../model/interventor_m.php");
require_once("../model/tIntervt_m.php");
require_once("../model/tAvance_m.php");
require_once("../model/tNoved_m.php");
require_once("../model/acta_m.php");
require_once("../model/novedad_m.php");
require_once("../model/procontrato_m.php");
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

        if ($nuProcess == 1) {

            //comboBox($objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = '')   
            $resultInfo = comboBox($objContrat, 'id,id,depend_nom', 'estado_id=1', '', 'cmbContrat', '', '', 'onchange', 'setContrato()');
        } else if ($nuProcess == 2) {

            $contrato= $_POST['cmbContrat'];
            $arrList = $objContrat->getList("*, FORMAT(valor_ini,0) AS f_valor_ini"," estado_id = 1 AND id ='".$contrato."'");         $plazoDiaz = ($arrList[0]['plazo_ejecuc']>1)?  $arrList[0]['plazo_ejecuc']." dias":$arrList[0]['plazo_ejecuc']." dia";
            
            $resultInfo = '<table class="alt">'
                    . '<tr><td><b>Dependencia:</b> </th><td colspan="3">' . $arrList[0]['depend_nom'] . '</td><td><b>Seccion: </b></td><td colspan="3">' . $arrList[0]['seccion'] . '</td></tr>'
                    . '<tr><td><b>Contratista: </b></td><td colspan="3">' . $arrList[0]['ter_ide'] . ' - ' . $arrList[0]['ter_nom'] . ' ' . $arrList[0]['ter_ape1'] . ' ' . $arrList[0]['ter_ape2'] . '</td><td> <b>Valor Inicial: </b></td><td colspan="3">$' . $arrList[0]['f_valor_ini'] . '</td></tr>'
                    . '<tr><td><b>Modalidad:</b></td><td>' . $arrList[0]['selecc_nom'] . '</td><td><b>Causal: </b></td><td>' . $arrList[0]['causal_nom'] . '</td><td><b>Tipo Contrato:</b></td><td>' . $arrList[0]['tcontrat_nom'] . '</td><td ><b>Gasto:</b> </td><td>' . $arrList[0]['tgasto_nom'] . '</td></tr>'
                    . '<tr><td><b>Fecha Suscripcion: </b></td><td>' . $arrList[0]['fec_suscripc'] . '</td><td><b>Fecha Inicio:</b> </td><td>' . $arrList[0]['fec_ini'] . '</td><td><b>Fecha Terminacion:</b> </td><td>' . $arrList[0]['fec_termn'] . '</td><td ><b>Plazo:</b> </td><td>' . $plazoDiaz . '</td></tr>'
                    . '<tr><td ><b>Objeto: </b></td><td colspan="7">' . $arrList[0]['objeto'] . '</td></tr>'
                    . '</table>';

            //INGRESO EL ACORDION

            $resultInfo .= '
            <div id="divContenidoContrat" name="divContenidoContrat">   
            <div class="accordion" id="accordionExample">
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
                            <div id="divDisponabilidad" name="divDisponabilidad" class="container2">
                                ' . htmlDispon($contrato) . '
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
            </div>
            <br/>
            <input id="btnInsertPContrat" name="btnInsertPContrat" value="Finalizar Registro" type="button" class="button special icon fa-download" >
            </div>
            ';
        }else if($nuProcess == 3){
            
            $contrato = $_POST['cmbContrat'];
            $arrList = $objContrat->getList("*, FORMAT(valor_anticp,0) as f_valor_anticp", "estado_id = 1 AND id = '".$contrato."' ");
            
            $anticipo = ($arrList[0]['anticipo']==1)? "SI":"NO";
            $publicSecop = ($arrList[0]['public_secop']==1)? "SI":"NO";
            $actualSecop = ($arrList[0]['actulz_secop']==1)? "SI":"NO";
            $fiducia = ($arrList[0]['fiducia']==1)? "SI":"NO";
            $afectPresup = ($arrList[0]['afect_presupt']==1)? "SI":"NO";
            
            $fecAdjud = ($arrList[0]['fec_adjud']=="1000-10-10")? "":$arrList[0]['fec_adjud'];
            $fecPublic= ($arrList[0]['fpublic_secop']=="1000-10-10")? "":$arrList[0]['fpublic_secop'];
            $fecActualz = ($arrList[0]['factulz_secop']=="1000-10-10")? "":$arrList[0]['factulz_secop'];
            $fecLiquid = ($arrList[0]['fec_liquid']=="1000-10-10")? "":$arrList[0]['fec_liquid'];
            
            
            
            $resultInfo = '<table class="alt">'
                    . '<tr><td><b>Resolucion Adjudicacion:</b></td><td>' . $arrList[0]['res_adjud'] . '</td><td><b>Fecha Adjudicacion: </b></td><td>' . $fecAdjud . '</td><td><b>Pacto Anticipo:</b></td><td>' . $anticipo . '</td><td ><b>Valor Anticipo:</b> </td><td>' . $arrList[0]['f_valor_anticp'] . '</td></tr>'
                    . '<tr><td><b>Puplico SECOP: </b></td><td>' . $publicSecop . '</td><td><b>Fecha Publicacion:</b> </td><td>' . $fecPublic . '</td><td><b>Actualizacion SECOP:</b> </td><td>' . $actualSecop . '</td><td ><b>Fecha Actualizacion:</b> </td><td>' . $fecActualz . '</td></tr>'
                    . '<tr><td><b>Link SECOP:</b> </th><td colspan="3">' . $arrList[0]['link_secop'] . '</td><td><b>Constituyo Fiducia: </b></td><td colspan="3">' . $fiducia . '</td></tr>'
                    . '<tr><td ><b>Observaciones: </b></td><td colspan="7">' . $arrList[0]['observ'] . '</td></tr>'
                    . '<tr><td><b>Afecta Presupuesto:</b></td><td>' . $afectPresup . '</td><td><b>Tipo de Recurso: </b></td><td>' . $arrList[0]['trecurs_nom'] . '</td><td><b>Tipo Liquidacion:</b></td><td>' . $arrList[0]['tliquid_nom'] . '</td><td ><b>Documento Liquidacion:</b> </td><td>' . $arrList[0]['doc_liquid'] . '</td></tr>'
                    . '<tr><td><b>Fecha Liquidacion: </b></td><td>' . $fecLiquid . '</td><td><b>Codigo Funcion:</b> </td><td>' . $arrList[0]['funcion_nom'] . '</td><td><b>EJE:</b> </td><td>' . $arrList[0]['eje'] . '</td><td ><b>EST:</b> </td><td>' . $arrList[0]['est'] . '</td></tr>'
                    . '<tr><td><b>PROG:</b> </th><td colspan="3">' . $arrList[0]['prog'] . '</td><td><b>Segmento del Servicio: </b></td><td colspan="3">' . $arrList[0]['segmento'] . '</td></tr>'
                    . '</table>'
                    . '<h3>PROYECTOS</h3>'
                    . getTableProyecto($contrato,1)
                    . '<br/><h3>DISPONIBILIDAD</h3>'
                    . getTableDisponibilidad($contrato,1)
                    . '<br/><h3>POLIZAS</h3>'
                    . getTablePoliza($contrato,1)
                    . '<br/><h3>INTERVENTOR</h3>'
                    . getTableIntervent($contrato,1)
                    . '<br/><h3>ACTAS</h3>'
                    . getTableActa($contrato,1)
                    . '<br/><h3>NOVEDADES</h3>'
                    . getTableNovedad($contrato,1)
                    . '<br/>
                        <center>
                        
                        <input id="btnContinuarReg" name="btnContinuarReg" value="Continuar Registro" type="button" class="button special fa-download" >
                        <input id="btnClosePContrat" name="btnClosePContrat" value="Finalizar Registro de Contrato" type="button" class="button special icon fa-download" >
                        </center>'
                    .'<script>
                        $(document).ready(function () {
                            
                            $("#btnContinuarReg").click(function (){
                                location.reload();
                            });
                            
                            $("#btnClosePContrat").click(function (){
                            
                                var sbAction = $("#frmPContrato").attr("action");

                                $.confirm({
                                    title: "¡CONFIRMACION!",
                                    content: "Desea Finalizar el Contrato?, Despues de cerrado no podra hacer modificaciones",
                                    type: "orange",
                                    buttons: {
                                        SI: function () {

                                            var formData = {txtProcess: 4,  txtContrato:"'.$contrato.'"}
                                            var sbAction = $("#frmPContrato").attr("action");

                                            $.ajax({
                                                url: sbAction,
                                                type: "POST",
                                                data: formData,
                                                success: function (data) {

                                                    if (data) {
                                                        
                                                        msjModal("Se Cerror el Contrato Correctamente", "OK");
                                                        setTimeout(function () {location.reload();}, 1300);
                                                        
                                                    } else {
                                                        msjModal("No se Pudo Cerrar el Contrato", "ER");
                                                    }
                                                }
                                            });

                                        },
                                        NO: function () {
                                        }
                                    }
                                });
                            });
                          
                        });
                      </script>';
            
            
            
        }else if($nuProcess == 4){
            $objProCont = new procontrato();
            $contrato = $_POST["txtContrato"];
            $result = $objContrat->updateId("estado_id = 2", "estado_id = 1 AND id = '".$contrato."'");
            
            if($result){
                $resultInfo = true;
            }else{
                $resultInfo = false;
            }                    
            
        }else if ($nuProcess == 31) {

            $objProyecto = new proyecto();
            $contrato = $_POST['txtContrato'];
            $objProyecto->setSbContrato(trim($contrato));
            $objProyecto->setNuProyect(trim($_POST['cmbCodPro']));
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
        } elseif ($nuProcess == 32) {

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
        } else if ($nuProcess == 41) {

            $nuTotalCom = 0;
            $blFecContract = false;

            $objDisponibilidad = new disponibilidad();
            $objDispon = new dispon();
            $objCompro = new compro();
            $objContract = new contrato();


            $contrato = $_POST['txtContrato'];
            $objDisponibilidad->setSbContrato(trim($contrato));

            $arrDispon = explode("-", $_POST['cmbDispon']);
            $arrCompro = explode(",", $_POST['cmbComproList']);

            $objDisponibilidad->setNuDispon(trim($arrDispon[0]));

            $arrDisponInfo = $objDispon->getList('d.fecha', 'd.id = ' . $arrDispon[0] . ' AND d.estado_id = 1');
            $arrContractInfo = $objContract->getList('fec_suscripc', "id = '" . $contrato . "' AND estado_id = 1");

            if ($arrDisponInfo[0]['fecha'] <= $arrContractInfo[0]['fec_suscripc']) {
                $blFecContract = true;
            }

            if ($blFecContract) {

                for ($i = 0; $i < count($arrCompro); $i++) {
                    $arrValCom = explode("-", $arrCompro[$i]);
                    if (!empty($arrValCom[1]))
                        $nuTotalCom = $nuTotalCom + $arrValCom[1];
                }

                if ($nuTotalCom <= ($arrDispon[1] - $arrDispon[2])) {

                    for ($i = 0; $i < count($arrCompro); $i++) {

                        $arrIdCom = explode("-", $arrCompro[$i]);
                        
                        if(!empty($arrIdCom[0])){
               
                            $objDisponibilidad->setNuCompro($arrIdCom[0]);
                            $result = $objDisponibilidad->save();
                        
                            if($result){
                                $objDispon->updateId("valgas = (valgas + ".$arrIdCom[1].")", "id =".$arrDispon[0]);
                                $objCompro->updateId("estado_id = 2", "id =".$arrIdCom[0]);
                                
                                if($nuTotalCom == ($arrDispon[1] - $arrDispon[2]))
                                    $objDispon->updateId("estado_id = 2", "id =".$arrDispon[0]);
                               
                            }
                            
                        }
                    }

                    if ($result) {
                        $resultInfo = getTableDisponibilidad($contrato);
                    } else {
                        $resultInfo = false;
                    }
                } else {

                    $resultInfo = 2;
                }
            } else {

                $resultInfo = 3;
            }
        } elseif ($nuProcess == 42) {
            
            $contrato = $_POST['txtContratoDispon'];
            $resultInfo = htmlDispon($contrato);
           
        } elseif ($nuProcess == 43) {
            
            $update="";
            $objDisponibilidad = new disponibilidad();
            $objDispon = new dispon();
            $objCompro = new compro();
            $contrato = $_POST['txtContrato'];
            $arrDispon = explode("-", $_POST['txtDispon']);
            $arrCompro = explode("-", $_POST['txtCompro']);
            $objDisponibilidad->setNuId($_POST['txtIdDisponibilidad']);
            $result = $objDisponibilidad->delete();
            
             //txtDispo:dispo, txtCompro

            if ($result) {
                if($arrDispon[1]==$arrDispon[2])
                    $update=" , estado_id = 1";
                    $objDispon->updateId("valgas = (valgas - ".$arrCompro[1].")".$update, "id = ".$arrDispon[0]);
                    $objCompro->updateId("estado_id=1", "id=".$arrCompro[0]);
                    $resultInfo = htmlDispon($contrato);

            } else {
                $resultInfo = false;
            }

            echo ($resultInfo);
            exit;
        } else if ($nuProcess == 51) {

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
        } elseif ($nuProcess == 52) {

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
        } elseif ($nuProcess == 61) {

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
        } elseif ($nuProcess == 62) {

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

    $objProyect = new proyect();

    //f$objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = ''
    $sbCodProy = comboBox($objProyect, 'p.id,p.codigo', 'p.estado_id=1', '', 'cmbCodPro', 'chosen-select');


    $html = "  
            <script src='js/pcontrato/proyecto.js'></script>
                <form action='controller/pcontrato_c.php' method='post'  id='frmProyecto' name = 'frmProyecto'>
                    
                    <input id='txtProcess' name='txtProcess' value='31' hidden>
                    <input id='txtContrato' name='txtContrato' value='" . $contrato . "' hidden>
                    <input id='txtIdProyecto' name='txtIdProyecto' value='' hidden>
                    

                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>CODIGO DEL PROYECTO: </span>
                       <div>" . $sbCodProy . "</div>         
                        
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
                <div id='tableProyecto'>" . getTableProyecto($contrato) . "</div>
            ";

    return $html;
}

function htmlDispon($contrato) {

    $objContrata = new contrato();
    $objCompro = new compro();
    $objDispon = new dispon();


    //comboBox($objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = '')   
    $resultInfo = comboBox($objContrata, 'id,id,depend_nom', '', '', 'cmbCodPrueba', '', '', '', '', 1);
    $cmbCompro = comboBox($objCompro, "CONCAT(c.id,'-',c.valor),c.codigo,CONCAT('$',FORMAT(c.valor,0)) AS valor", '', '', 'cmbCompro', '', '', '', '', 1);
    $cmbDispon = comboBox($objDispon, "CONCAT(d.id,'-',d.valor,'-',d.valgas),d.codigo,CONCAT('$',FORMAT(d.valor - d.valgas,0)) AS valor", '', '', 'cmbDispon', '', '', '', '');


    $html = "  
            <script src='js/pcontrato/disponibilidad.js'></script>
                <form action='controller/pcontrato_c.php' method='post'  id='frmDisponibilidad' name = 'frmDisponibilidad'>
                    
                    <input id='txtProcess' name='txtProcess' value='41' hidden>
                    <input id='cmbComproList' name='cmbComproList' value='41' hidden>
                    <input id='txtContrato' name='txtContrato' value='" . $contrato . "' hidden>
                    <input id='txtContratoDisp' name='txtContratoDisp' value='" . $contrato . "' hidden>
                    
                    <div class='input-group input-group-sm'>
                    
                        <span class='input-group-addon'>DISPONIBILIDAD: </span>
                        <div>" . $cmbDispon . "</div>
                            
                        <span class='input-group-addon'>COMPROMISO: </span>
                        <div>" . $cmbCompro . "</div> 
                        
                    </div>                
											
                    <br/>
                    btnPrueba
                    <input type='button' id='btnIngresarDispon' name='btnIngresarDispon' value='REGISTRAR' class='button small'/>&nbsp;&nbsp;
                    <input type='reset' value='LIMPIAR' class='button small' />&nbsp;&nbsp;
                    
                    <input type='button' id='btnPrueba' name='btnPrueba' value='PRUEBA' class='button small'/>

                </form>
                <div id='tableDisponibilidad'>" . getTableDisponibilidad($contrato) . "</div>
            ";

    return $html;
}

function htmlPoliza($contrato) {

    $objTercero = new tercero();
    $objTPoliza = new tPoliza();

    //f$objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = ''
    $sbTerceroCmb = comboBox($objTercero, 't.id, t.id_ter,t.nombre, t.apellido1, t.apellido2', 't.estado_id = 1 AND t.t_tercero = 2', 't.nombre', 'cmbTerceroPol');
    $sbTPolizaCmb = comboBox($objTPoliza, 't.id, t.nombre', 't.estado_id = 1', 't.nombre', 'cmbTPolizaPol');
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
                <div id='tablePoliza'>" . getTablePoliza($contrato) . "</div>
            ";

    return $html;
}

function htmlIntervent($contrato) {

    $objTercero = new tercero();
    $objTIntervent = new tIntervt();

    //f$objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = ''
    $sbTerceroCmb = comboBox($objTercero, 't.id, t.id_ter, t.apellido1, t.apellido2', 't.estado_id = 1 AND t.t_tercero = 3', 't.nombre', 'cmbTercero');
    $sbIntervCmb = comboBox($objTIntervent, 't.id, t.nombre', 't.estado_id = 1', 't.nombre', 'cmbTInterv');
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
                <div id='tableInterv'>" . getTableIntervent($contrato) . "</div>
            ";


    return $html;
}

function htmlActa($contrato) {

    $objTAvance = new tAvance();

    //function comboBox($objUtils_m,$select,$id, $class = '', $valor ='', $event='', $func = '') {

    $sbAvancesComb = comboBox($objTAvance, 't.id,t.nombre', 't.estado_id=1', 't.nombre', 'cmbTAvance');

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

    $sbnNovedComb = comboBox($objTNovedad, 't.id,t.nombre', 't.estado_id=1', 't.nombre', 'cmbTNovedad');

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

function getTableProyecto($contrato,$img="") {

    $objProyecto = new proyecto();

    $arrList = $objProyecto->getList("p.id as p_id, pr.codigo as pr_codigo, p.cod_act as act_cod, p.fec_ini as fec_ini, p.fec_fin as fec_fin, p.porcentaje as porcentaje ", 'p.contrato_id="' . $contrato . '"', 'p.id DESC');

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
            
            if(empty($img)){
                $imgEdit="<a href='javascript:updateProyecto( " . $value["p_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a>";
                $imgDel="<a href='javascript:deleteProyecto(" . $value["p_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a>";
            }else{
                $imgEdit="<IMG id='imgList' src='img/editar2.png'/>";
                $imgDel="<IMG id='imgList' src='img/eliminar2.png'/>";
            }
            
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["pr_codigo"] . "</td>"
                    . "<td>" . $value["act_cod"] . "</td>"
                    . "<td>" . $value["fec_ini"] . "</td>"
                    . "<td>" . $value["fec_fin"] . "</td>"
                    . "<td>" . $value["porcentaje"] . "%</td>"
                    . "<td>$imgEdit</td>"
                    . "<td>$imgDel</td></tr>";
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

function getTableDisponibilidad($contrato,$img="") {

    $objDisponibilidad = new disponibilidad();

    $arrList = $objDisponibilidad->getList("d.id as d_id, d.dispon_id as d_dispon_id, d.compro_id as d_compro_id, di.codigo as di_codigo, di.valor as di_valor, di.valgas as di_valgas, c.codigo as c_codigo, c.valor as c_valor", 'd.contrato_id="' . $contrato . '"', 'd.id DESC');

    $tableInfo = "";

    if (count($arrList) > 0) {

        $tableInfo = "  <table id='tableListDisponibilidad' name='tableListDisponibilidad' align='center'>
                        <thead>
                            <tr>	
                                <TH> <label>#</label></TH>
                                <TH> <label>CODIGO DISPONIBILIDAD</label></TH>
                                <TH> <label>VALOR DISPONIBILIDAD</label></TH>
                                <TH> <label>CODIGO COMPROMISO</label></TH>
                                <TH> <label>VALOR COMPROMISO</label></TH>
                                <TH> <label>ELIMINAR</label></TH>
                            </tr>             
                        </thead>
                        <tbody id='tableDisponibilidad'>";

        $i = 1;
        foreach ($arrList as $value) {
            
             if(empty($img)){
                $imgDel="<a href='javascript:deleteDisponibilidad(" . $value["d_id"] . "," . '"' . $contrato . '"' . ",".'"'.$value["d_dispon_id"].'-'.$value["di_valor"].'-'.$value["di_valgas"].'"'.",".'"'.$value["d_compro_id"]."-".$value["c_valor"].'"'.")'  > <IMG id='imgList' src='img/eliminar.png'/></a>";
            }else{
                $imgDel="<IMG id='imgList' src='img/eliminar2.png'/>";
            }
            
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["di_codigo"] . "</td>"
                    . "<td>" . $value["di_valor"] . "</td>"
                    . "<td>" . $value["c_codigo"] . "</td>"
                    . "<td>" . $value["c_valor"] . "</td>"
                    . "<td>$imgDel</td></tr>";
            $i++;
        }

        $tableInfo .= '
                        </tbody>
                    </table>	
              <script>
                $(document).ready(function () {
                    setTableFrm(["#tableListDisponibilidad"]);
                });
              </script>';
    }

    return $tableInfo;
}

function getTablePoliza($contrato,$img="") {

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
            
            if(empty($img)){
                $imgEdit="<a href='javascript:updatePoliza( " . $value["p_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a>";
                $imgDel="<a href='javascript:deletePoliza(" . $value["p_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a>";
            }else{
                $imgEdit="<IMG id='imgList' src='img/editar2.png'/>";
                $imgDel="<IMG id='imgList' src='img/eliminar2.png'/>";
            }
            
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["ter_nom"] . " " . $value["ter_ape1"] . " " . $value["ter_ape2"] . " - " . $value["ter_ide"] . "</td>"
                    . "<td>" . $value["num_pol"] . "</td>"
                    . "<td>" . $value["fec_exp"] . "</td>"
                    . "<td>" . $value["resoluc"] . "</td>"
                    . "<td>" . $value["fec_apro"] . "</td>"
                    . "<td>" . $value["tpo_nom"] . "</td>"
                    . "<td>$" . $value["valor"] . "</td>"
                    . "<td>" . $value["fec_ini"] . "</td>"
                    . "<td>" . $value["fec_fin"] . "</td>"
                    . "<td>$imgEdit</td>"
                    . "<td>$imgDel</td></tr>";
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

function getTableIntervent($contrato,$img="") {

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

            $planta = "";
            if ($value["planta"] == 1) {
                $planta = 'SI';
            } elseif ($value["planta"] == 2) {
                $planta = 'NO';
            }
            
            if(empty($img)){
                $imgEdit="<a href='javascript:updateInterv( " . $value["i_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a>";
                $imgDel="<a href='javascript:deleteInterv(" . $value["i_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a>";
            }else{
                $imgEdit="<IMG id='imgList' src='img/editar2.png'/>";
                $imgDel="<IMG id='imgList' src='img/eliminar2.png'/>";
            }

            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["ter_id"] . "</td>"
                    . "<td>" . $value["ter_nom"] . " " . $value["ter_ape1"] . " " . $value["ter_ape2"] . "</td>"
                    . "<td>" . $value["tin_nom"] . "</td>"
                    . "<td>" . $planta . "</td>"
                    . "<td>" . $value["num_cont"] . "</td>"
                    . "<td>" . $value["porcentaje"] . "%</td>"
                    . "<td>$imgEdit</td>"
                    . "<td>$imgDel</td></tr>";
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

function getTableActa($contrato,$img="") {

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
            
            if(empty($img)){
                $imgEdit="<a href='javascript:updateActa( " . $value["a_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a>";
                $imgDel="<a href='javascript:deleteActa(" . $value["a_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a>";
            }else{
                $imgEdit="<IMG id='imgList' src='img/editar2.png'/>";
                $imgDel="<IMG id='imgList' src='img/eliminar2.png'/>";
            }
            
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["ta_cod"] . "</td>"
                    . "<td>" . $value["ta_nom"] . "</td>"
                    . "<td>" . $value["a_fec"] . "</td>"
                    . "<td>" . $value["a_porc"] . "%</td>"
                    . "<td>$imgEdit</td>"
                    . "<td>$imgDel</td></tr>";
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

function getTableNovedad($contrato,$img="") {

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
            
            if(empty($img)){
                $imgEdit="<a href='javascript:updateNovedad( " . $value["n_id"] . ")' > <IMG id='imgList' src='img/editar.png'/></a>";
                $imgDel="<a href='javascript:deleteNovedad(" . $value["n_id"] . "," . '"' . $contrato . '"' . ")'  > <IMG id='imgList' src='img/eliminar.png'/></a>";
            }else{
                $imgEdit="<IMG id='imgList' src='img/editar2.png'/>";
                $imgDel="<IMG id='imgList' src='img/eliminar2.png'/>";
            }
            
            $tableInfo .= "<tr><td>" . $i . "</td>"
                    . "<td>" . $value["tn_cod"] . "</td>"
                    . "<td>" . $value["tn_nom"] . "</td>"
                    . "<td>$" . $value["n_val"] . "</td>"
                    . "<td>" . $value["n_pla"] . "</td>"
                    . "<td>" . $value["n_fec"] . "</td>"
                    . "<td>$imgEdit</td>"
                    . "<td>$imgDel</td></tr>";
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
