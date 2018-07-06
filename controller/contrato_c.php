<?php

require_once("../model/contrato_m.php");
require_once("../model/depend_m.php");
require_once("../model/mSelecc_m.php");
require_once("../model/causal_m.php");
require_once("../model/tContrat_m.php");
require_once("../model/tGasto_m.php");
require_once("../model/tRecurs_m.php");
require_once("../model/tLiquid_m.php");
require_once("../model/funcion_m.php");
require_once("../model/tercero_m.php");
require_once("../utils/utils.php");
$resultInfo;
$sbmsj = "";
$objContrat = new contrato;

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

            $setInfoUpdate = "";
            if (isset($_POST['txtUpdate'])) {
                $setInfoUpdate = $_POST['txtUpdate'];
            }
            $resultInfo = setHtmlContrato($setInfoUpdate);
        } else if ($nuProcess == 2) {

            $objContrat->setSbId(trim($_POST['txtId']));
            $objContrat->setNuDependId(trim($_POST['cmbDepend']));
            $objContrat->setSbSeccion(trim($_POST['txtSeccion']));
            $objContrat->setNuMSeleccId(trim($_POST['cmbMSelecc']));
            $objContrat->setNuCausalId(trim($_POST['cmbCausal']));
            $objContrat->setNuTContratId(trim($_POST['cmbTContrat']));
            $objContrat->setNuTGastoId(trim($_POST['cmbTGasto']));
            $objContrat->setDtSuscripc(trim($_POST['dtSuscripcion']));
            $objContrat->setDtInicio(trim($_POST['dtInicio']));
            $objContrat->setDtTermn(trim($_POST['dtTerminacion']));
            $objContrat->setNuPlazoEjec(trim($_POST['txtPlazoEj']));
            $objContrat->setNuTerceroId($_POST['cmbTercero']);
            $objContrat->setSbObjeto(daleteSymbol(trim($_POST['txtObject'])));
            $objContrat->setSbResAdjudic(trim($_POST['txtResAdjudicacion']));
            if ($_POST['dtAdjudicacion'] == '') {
                $_POST['dtAdjudicacion'] = '1000-10-10';
            }
            $objContrat->setDtAdjudicacion(trim($_POST['dtAdjudicacion']));
            $objContrat->setFlValorIni(trim($_POST['txtValorIni']));
            if ($_POST['cmbPactoAnticp'] == '') {
                $_POST['cmbPactoAnticp'] = 0;
            }
            $objContrat->setNuAnticipo(trim($_POST['cmbPactoAnticp']));
            if ($_POST['txtValorAnticp'] == '') {
                $_POST['txtValorAnticp'] = 0;
            }
            $objContrat->setFlValorAnt(trim($_POST['txtValorAnticp']));
            if ($_POST['cmbPublicSecop'] == '') {
                $_POST['cmbPublicSecop'] = 0;
            }
            $objContrat->setNuPublicSecop(trim($_POST['cmbPublicSecop']));
            if ($_POST['dtPublicSecop'] == '') {
                $_POST['dtPublicSecop'] = '1000-10-10';
            }
            $objContrat->setDtPublicSecop(trim($_POST['dtPublicSecop']));
            if ($_POST['cmbActSecop'] == '') {
                $_POST['cmbActSecop'] = 0;
            }
            $objContrat->setNuActSecop(trim($_POST['cmbActSecop']));
            if ($_POST['dtActSecop'] == '') {
                $_POST['dtActSecop'] = '1000-10-10';
            }
            $objContrat->setDtActSecop(trim($_POST['dtActSecop']));
            $objContrat->setSbLinkSecop(trim($_POST['txtLinkSecop']));
            if ($_POST['cmbFiducia'] == '') {
                $_POST['cmbFiducia'] = 0;
            }
            $objContrat->setNuFiducia(trim($_POST['cmbFiducia']));
            $objContrat->setSbObserv(trim($_POST['txtObserv']));
            if ($_POST['cmbAfecTaPresupt'] == '') {
                $_POST['cmbAfecTaPresupt'] = 0;
            }
            $objContrat->setNuAfectPresupt(trim($_POST['cmbAfecTaPresupt']));
            if ($_POST['cmbTRecurs'] == '') {
                $_POST['cmbTRecurs'] = 0;
            }
            $objContrat->setNuTRecursId(trim($_POST['cmbTRecurs']));
            if ($_POST['cmbTLiquid'] == '') {
                $_POST['cmbTLiquid'] = 0;
            }
            $objContrat->setNuTLiquidId(trim($_POST['cmbTLiquid']));
            $objContrat->setSbDocLiquid(trim($_POST['txtDocLiquid']));
            if ($_POST['dtLiquid'] == '') {
                $_POST['dtLiquid'] = '1000-10-10';
            }
            $objContrat->setDtLiquid(trim($_POST['dtLiquid']));
            if ($_POST['cmbFuncion'] == '') {
                $_POST['cmbFuncion'] = 0;
            }
            $objContrat->setNuFuncionId(trim($_POST['cmbFuncion']));
            $objContrat->setSbSegmento(trim($_POST['txtSegment']));
            $objContrat->setSbEje(trim($_POST['txtEje']));
            $objContrat->setSbEst(trim($_POST['txtEst']));
            $objContrat->setSbProg(trim($_POST['txtProg']));
            $resultInfo = $objContrat->save();
        } else if ($nuProcess == 3) {

            $arrList = $objContrat->getList("depend_nom, seccion, tcontrat_nom, ter_nom,ter_ape1,ter_ape2,id,fec_ini,valor_ini");

            $resultInfo = "";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['depend_nom'] . '</td>'
                        . '<td>' . $value['seccion'] . '</td>'
                        . '<td>' . $value['tcontrat_nom'] . '</td>'
                        . '<td>' . $value['ter_nom'] . ' ' . $value['ter_ape1'] . ' ' . $value['ter_ape2'] . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['fec_ini'] . '</td>'
                        . '<td>' . $value['valor_ini'] . '</td>'
                        . '<td><a href="contratoUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        } elseif ($nuProcess == 4) {
            
            $objContrat->setSbId(trim($_POST['txtUpdate']));
            $objContrat->setNuDependId(trim($_POST['cmbDepend']));
            $objContrat->setSbSeccion(trim($_POST['txtSeccion']));
            $objContrat->setNuMSeleccId(trim($_POST['cmbMSelecc']));
            $objContrat->setNuCausalId(trim($_POST['cmbCausal']));
            $objContrat->setNuTContratId(trim($_POST['cmbTContrat']));
            $objContrat->setNuTGastoId(trim($_POST['cmbTGasto']));
            $objContrat->setDtSuscripc(trim($_POST['dtSuscripcion']));
            $objContrat->setDtInicio(trim($_POST['dtInicio']));
            $objContrat->setDtTermn(trim($_POST['dtTerminacion']));
            $objContrat->setNuPlazoEjec(trim($_POST['txtPlazoEj']));
            $objContrat->setNuTerceroId($_POST['cmbTercero']);
            $objContrat->setSbObjeto(daleteSymbol(trim($_POST['txtObject'])));
            $objContrat->setSbResAdjudic(trim($_POST['txtResAdjudicacion']));
            if ($_POST['dtAdjudicacion'] == '') {
                $_POST['dtAdjudicacion'] = '1000-10-10';
            }
            $objContrat->setDtAdjudicacion(trim($_POST['dtAdjudicacion']));
            $objContrat->setFlValorIni(trim($_POST['txtValorIni']));
            if ($_POST['cmbPactoAnticp'] == '') {
                $_POST['cmbPactoAnticp'] = 0;
            }
            $objContrat->setNuAnticipo(trim($_POST['cmbPactoAnticp']));
            if ($_POST['txtValorAnticp'] == '') {
                $_POST['txtValorAnticp'] = 0;
            }
            $objContrat->setFlValorAnt(trim($_POST['txtValorAnticp']));
            if ($_POST['cmbPublicSecop'] == '') {
                $_POST['cmbPublicSecop'] = 0;
            }
            $objContrat->setNuPublicSecop(trim($_POST['cmbPublicSecop']));
            if ($_POST['dtPublicSecop'] == '') {
                $_POST['dtPublicSecop'] = '1000-10-10';
            }
            $objContrat->setDtPublicSecop(trim($_POST['dtPublicSecop']));
            if ($_POST['cmbActSecop'] == '') {
                $_POST['cmbActSecop'] = 0;
            }
            $objContrat->setNuActSecop(trim($_POST['cmbActSecop']));
            if ($_POST['dtActSecop'] == '') {
                $_POST['dtActSecop'] = '1000-10-10';
            }
            $objContrat->setDtActSecop(trim($_POST['dtActSecop']));
            $objContrat->setSbLinkSecop(trim($_POST['txtLinkSecop']));
            if ($_POST['cmbFiducia'] == '') {
                $_POST['cmbFiducia'] = 0;
            }
            $objContrat->setNuFiducia(trim($_POST['cmbFiducia']));
            $objContrat->setSbObserv(trim($_POST['txtObserv']));
            if ($_POST['cmbAfecTaPresupt'] == '') {
                $_POST['cmbAfecTaPresupt'] = 0;
            }
            $objContrat->setNuAfectPresupt(trim($_POST['cmbAfecTaPresupt']));
            if ($_POST['cmbTRecurs'] == '') {
                $_POST['cmbTRecurs'] = 0;
            }
            $objContrat->setNuTRecursId(trim($_POST['cmbTRecurs']));
            if ($_POST['cmbTLiquid'] == '') {
                $_POST['cmbTLiquid'] = 0;
            }
            $objContrat->setNuTLiquidId(trim($_POST['cmbTLiquid']));
            $objContrat->setSbDocLiquid(trim($_POST['txtDocLiquid']));
            if ($_POST['dtLiquid'] == '') {
                $_POST['dtLiquid'] = '1000-10-10';
            }
            $objContrat->setDtLiquid(trim($_POST['dtLiquid']));
            if ($_POST['cmbFuncion'] == '') {
                $_POST['cmbFuncion'] = 0;
            }
            $objContrat->setNuFuncionId(trim($_POST['cmbFuncion']));
            $objContrat->setSbSegmento(trim($_POST['txtSegment']));
            $objContrat->setSbEje(trim($_POST['txtEje']));
            $objContrat->setSbEst(trim($_POST['txtEst']));
            $objContrat->setSbProg(trim($_POST['txtProg']));
            $resultInfo = $objContrat->update();
            
        } elseif ($nuProcess == 5) {

            $objContrat->setSbId($_POST['cmbContrat']);
            $arrList = $objContrat->getListId("v_contrato");


            $resultInfo = '<table class="alt">'
                    . '<tr><td>Dependencia: </td><td colspan="3">' . $arrList['depend_nom'] . '</td><td>Seccion: </td><td colspan="3">' . $arrList['seccion'] . '</td></tr>'
                    . '<tr><td>Contratista: </td><td colspan="3">' . $arrList['contratista_id'] . ' - ' . $arrList['contratista_nom'] . ' ' . $arrList['contratista_ape'] . '</td><td>Valor Inicial: </td><td colspan="3">' . $arrList['valor_ini'] . '</td></tr>'
                    . '<tr><td>Modalidad</td><td>' . $arrList['selecc_nom'] . '</td><td>Causal: </td><td>' . $arrList['causal_nom'] . '</td><td>T. Contrato: </td><td>' . $arrList['tcontrat_nom'] . '</td><td >Gasto: </td><td>' . $arrList['tgasto_nom'] . '</td></tr>'
                    . '<tr><td>F. Suscripc: </td><td>' . $arrList['fec_suscripc'] . '</td><td>F. Ini Contract: </td><td>' . $arrList['fec_ini'] . '</td><td>F. Terminacio: </td><td>' . $arrList['fec_termn'] . '</td><td >P. Ejecucion: </td><td>' . $arrList['plazo_ejecuc'] . '</td></tr>'
                    . '<tr><td colspan="8">OBJETO: ' . $arrList['objeto'] . '</td></tr>'
                    . '</table>';
        }
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;

function setHtmlContrato($setIdUpdate) {

    //function comboBox($objUtils_m, $select, $where, $order, $id, $class = '', $valor ='', $event='', $func = '') {
    $objDepend = new depend();
    $objMSelecc = new mSelecc();
    $objCausal = new causal();
    $objTContrat = new tContrat();
    $objTGasto = new tGasto();
    $objTRecurs = new tRecurs();
    $objTLiquid = new tLiquid();
    $objFuncion = new funcion();
    $objTercero = new tercero();
    // $objEstado = new estado();
    // $objTContratist = new tContratist();
    // $objClasific = new tClasific();


    $disabled = "";
    $id = "";
    $depend = "";
    $seccion = "";
    $mSelecc = "";
    $causal = "";
    $tcontrat = "";
    $tGasto = "";
    $fec_sus = "";
    $fec_ini = "";
    $fec_ter = "";
    $plazo = "";
    $tercero = "";
    $objeto = "";
    $res_adj = "";
    $fec_adj = "";
    $valor = "";
    $anticipo1 = "";
    $anticipo2 = "";
    $valAnticipo = "";
    $publico1 = "";
    $publico2 = "";
    $fecpublico = "";
    $actualizo1 = "";
    $actualizo2 = "";
    $fecActualizo = "";
    $link = "";
    $fiducia1 = "";
    $fiducia2 = "";
    $observ = "";
    $afecta1 = "";
    $afecta2 = "";
    $tRecurs = "";
    $tLiquid = "";
    $docLiquid = "";
    $fec_Liquid = "";
    $funcion = "";
    $segmento = "";
    $eje = "";
    $est = "";
    $prog = "";


    $sbProcess = "<input id='txtProcess' name='txtProcess' value='2' hidden>";

    if (!empty($setIdUpdate)) {
        $objContracto = new contrato();
        $objContracto->setSbId($setIdUpdate);
        $arrInfo = $objContracto->getListId();
        $id = $setIdUpdate;
        $depend = $arrInfo['depend_id'];
        $seccion = $arrInfo['seccion'];
        $mSelecc = $arrInfo['m_selecc_id'];
        $causal = $arrInfo['causal_id'];
        $tcontrat = $arrInfo['t_contrat_id'];
        $tGasto = $arrInfo['t_gasto_id'];
        $fec_sus = $arrInfo['fec_suscripc'];
        $fec_ini = $arrInfo['fec_ini'];
        $fec_ter = $arrInfo['fec_termn'];
        $plazo = $arrInfo['plazo_ejecuc'];
        $tercero = $arrInfo['tercero_id'];
        $objeto = $arrInfo['objeto'];
        $res_adj = $arrInfo['res_adjud'];
        if ($arrInfo['fec_adjud'] != '1000-10-10') {
            $fec_adj = $arrInfo['fec_adjud'];
        }
        if ($arrInfo['valor_ini'] != 0) {
            $valor = $arrInfo['valor_ini'];
        }
        if ($arrInfo['anticipo'] != 0) {
            if ($arrInfo['anticipo']==2)
                $anticipo1 = 'selected';
            if ($arrInfo['anticipo']==1)
                $anticipo2 = 'selected';
        }
        if ($arrInfo['valor_anticp'] != 0) {
            $valAnticipo = $arrInfo['valor_anticp'];
        }
        if ($arrInfo['public_secop'] != 0) {
            if ($arrInfo['public_secop']==2)
                $publico1 = 'selected';
            if ($arrInfo['public_secop']==1)
                $publico2 = 'selected';
        }
        if ($arrInfo['fpublic_secop'] != '1000-10-10') {
            $fecpublico = $arrInfo['fpublic_secop'];
        }
        if ($arrInfo['actulz_secop'] != 0) {
            if ($arrInfo['actulz_secop']==2)
                $actualizo1 = 'selected';
            if ($arrInfo['actulz_secop']==1)
                $actualizo2 = 'selected';
        }
        if ($arrInfo['factulz_secop'] != '1000-10-10') {
            $fecActualizo = $arrInfo['factulz_secop'];
        }
        $link = $arrInfo['link_secop'];
        if ($arrInfo['fiducia'] != 0) {
            if ($arrInfo['fiducia']==2)
                $fiducia1 = 'selected';
            if ($arrInfo['fiducia']==1)
                $fiducia2 = 'selected';
        }
        $observ = $arrInfo['observ'];
        if ($arrInfo['afect_presupt'] != 0) {
            if ($arrInfo['afect_presupt']==2)
                $afecta1 = 'selected';
            if ($arrInfo['afect_presupt']==1)
                $afecta2 = 'selected'; 
        }
        $tRecurs = $arrInfo['t_recurs_id'];
        $tLiquid = $arrInfo['t_liquid_id'];
        $docLiquid = $arrInfo['doc_liquid'];
        if ($arrInfo['fec_liquid'] != '1000-10-10') {
            $fec_Liquid = $arrInfo['fec_liquid'];
        }
        $funcion = $arrInfo['funcion_id'];
        $segmento = $arrInfo['segmento'];
        $eje = $arrInfo['eje'];
        $est = $arrInfo['est'];
        $prog = $arrInfo['prog'];


        $sbProcess = "<input id='txtProcess' name='txtProcess' value='4' hidden>"
                . "<input id='txtUpdate' name='txtUpdate' value='$setIdUpdate' hidden>";
        $disabled = "disabled";
    };
    $cmbDepend = comboBox($objDepend, 'd.id,d.nombre', 'd.estado_id =1', 'd.nombre', 'cmbDepend', '', $depend);
    $cmbMSelecc = comboBox($objMSelecc, 'm.id,m.nombre', 'm.estado_id =1', 'm.nombre', 'cmbMSelecc', '', $mSelecc);
    $cmbCausal = comboBox($objCausal, 'c.id,c.cod,c.nombre', 'c.estado_id =1', 'c.nombre', 'cmbCausal', '', $causal);
    $cmbTContrat = comboBox($objTContrat, 't.id,t.nombre', 't.estado_id =1', 't.nombre', 'cmbTContrat', '', $tcontrat);
    $cmbTGasto = comboBox($objTGasto, 't.id,t.nombre', 't.estado_id =1', 't.nombre', 'cmbTGasto', '', $tGasto);
    $cmbTRecurs = comboBox($objTRecurs, 't.id,t.nombre', 't.estado_id =1', 't.nombre', 'cmbTRecurs', '', $tRecurs);
    $cmbTLiquid = comboBox($objTLiquid, 't.id,t.nombre', 't.estado_id =1', 't.nombre', 'cmbTLiquid', '', $tLiquid);
    $cmbFuncion = comboBox($objFuncion, 'f.id,f.nombre', 'f.estado_id =1', 'f.nombre', 'cmbFuncion', '', $funcion);
    $cmbTercero = comboBox($objTercero, 't.id,t.nombre,t.apellido1, t.apellido2', 't.t_tercero = 1 AND t.estado_id=1 ', 't.nombre', 'cmbTercero', '', $tercero);

    $htmlContrato = '   <script src="js/contrato/insert.js"></script>

           
            <CENTER>   

                <form action="controller/contrato_c.php" method="post"  id="frmContrato" name = "frmContrato">


                    ' . $sbProcess . '

                    <label id="error">
                    </label>

                    <div class="6u$ 12u$(xsmall)"> 

                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >No Contrato :</span>
                            <input name="txtId" id="txtId" type="text"  value="' . $id . '" ' . $disabled . '/>
                        </div>                
                        <br/>
                        <div class="input-group input-group-sm">

                            <span class="input-group-addon" >DEPENDENCIA :</span>
                            <div class="6u$ 12u$(xsmall)" name="divDepend"  id="divDepend">' . $cmbDepend . ' </div>

                            <span class="input-group-addon" >SECCION :</span>
                            <input name="txtSeccion" id="txtSeccion" type="text" value="' . $seccion . '" />

                        </div>
                        <br/>
                        <div class="input-group input-group-sm">

                            <span class="input-group-addon" >MOD. SELECCION :</span>
                            <div class="6u$ 12u$(xsmall)" name="divMSelecc"  id="divMSelecc">' . $cmbMSelecc . ' </div>
                            <span class="input-group-addon" >CAUSAL :</span>
                            <div class="6u$ 12u$(xsmall)" name="divCausal"  id="divCausal"> ' . $cmbCausal . '</div>
                        </div>  
                        <br/>
                        <div class="input-group input-group-sm">

                            <span class="input-group-addon" >TIPO CONTRATO:</span>
                            <div class="6u$ 12u$(xsmall)" name="divTContract"  id="divTContract">' . $cmbTContrat . ' </div>
                            <span class="input-group-addon" >TIPO GASTO :</span>
                            <div class="6u$ 12u$(xsmall)" name="divGasto"  id="divGasto"> ' . $cmbTGasto . '</div>
                        </div>  

                        <br/>      
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >F. SUSCRIPCION :</span>
                            <input type="text" name="dtSuscripcion" id="dtSuscripcion" class="form-control" placeholder=" 0000-00-00 " value="' . $fec_sus . '"/ >        
                            <span class="input-group-addon" >F. INCIO CONTRACT:</span>
                            <input name="dtInicio" id="dtInicio" type="text" class="form-control" placeholder=" 0000-00-00 " value="' . $fec_ini . '"/>
                        </div>                

                        <br/>

                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >F. TERMINACION:</span>
                            <input type="text" name="dtTerminacion" id="dtTerminacion" class="form-control" placeholder="  0000-00-00 " value="' . $fec_ter . '"/>          
                            <span class="input-group-addon" >PLAZO EJECUCION:</span>
                            <input name="txtPlazoEj" id="txtPlazoEj" type="text" class="form-control" value="' . $plazo . '"/>
                        </div>                
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >CONTRATISTA:</span>
                            <div class="6u$ 12u$(xsmall)" name="divContratista"  id="divContratista">' . $cmbTercero . ' </div>
                            <span class="input-group-addon" >VALOR INICIAL:</span>
                            <input name="txtValorIni" id="txtValorIni" type="text"  placeholder="" value="' . $valor . '"/>
                        </div>                
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >OBJETO:</span>
                            <textarea id="txtObject" name="txtObject" class="form-control" placeholder=" - Max 256 Caracteres -" >' . $objeto . '</textarea>
                        </div>                
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >RESOLUCION ADJUDICACION:</span>
                            <input type="text" name="txtResAdjudicacion" id="txtResAdjudicacion" class="form-control" placeholder=" - Resolucion Adjudicacion -" value="' . $res_adj . '"/>          
                            <span class="input-group-addon" >F. ADJUDICACION:</span>
                            <input name="dtAdjudicacion" id="dtAdjudicacion" type="text" class="form-control" placeholder=" 0000-00-00 " value="' . $fec_adj . '"/>
                        </div>    
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >PACTO ANTICIPO:</span>
                            <select id="cmbPactoAnticp" name="cmbPactoAnticp">
                                <option value="">- Seleccionar -</option>
                                <option value="2" '.$anticipo1.'>No</option>
                                <option value="1" '.$anticipo2.'>Si</option>
                            </select>          
                            <span class="input-group-addon input-group-sm" >VALOR ANTICIPO:</span>
                            <input name="txtValorAnticp" id="txtValorAnticp" type="text" value="' . $valAnticipo. '" />
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >PUBLICO EN SECOP:</span>
                            <select id="cmbPublicSecop" name="cmbPublicSecop">
                                <option value="">- Seleccionar -</option>
                                <option value="2" '.$publico1.'>No</option>
                                <option value="1" '.$publico2.'>Si</option>
                            </select>          
                            <span class="input-group-addon" >F. PUBLICACION SECOP:</span>
                            <input name="dtPublicSecop" id="dtPublicSecop" type="text"  placeholder=" 0000-00-00 " value="' . $fecpublico . '"/>
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >ACTUALIZO EN SECOP:</span>

                            <select id="cmbActSecop" name="cmbActSecop">
                                <option value="">- Seleccionar -</option>
                                <option value="2" '.$actualizo1.'>No</option>
                                <option value="1" '.$actualizo2.'>Si</option>
                            </select>          
                            <span class="input-group-addon" >F. ACTUALIZACION SECOP:</span>
                            <input name="dtActSecop" id="dtActSecop" type="text"  placeholder=" 0000-00-00 " value="' . $fecActualizo . '"/>
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >LINK SECOP:</span>
                            <input type="text" name="txtLinkSecop" id="txtLinkSecop" placeholder=" www.secop.gov.co/..."/ value="'.$link.'">          
                            <span class="input-group-addon" >CONSTITUYO FIDUCIA:</span>
                            <select id="cmbFiducia" name="cmbFiducia">
                                <option value="">- Seleccionar -</option>
                                <option value="2" '.$fiducia1.'>No</option>
                                <option value="1" '.$fiducia2.'>Si</option>
                            </select>                    
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >OBSERVACIONES:</span>
                            <textarea id="txtObserv" name="txtObserv" class="form-control" placeholder=" - Max 256 Caracteres -" >'.$observ.'</textarea>
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >AFECTA PRESUPUESTO:</span>
                            <select id="cmbAfecTaPresupt" name="cmbAfecTaPresupt">
                                <option value="">- Seleccionar -</option>
                                <option value="2" '.$afecta1.'>No</option>
                                <option value="1" '.$afecta2.'>Si</option>
                            </select>                    
                           <span class="input-group-addon" >TIPO DE RECURSOS:</span>
                            <div class="6u$ 12u$(xsmall)" name="divTRecurs"  id="divTRecurs"> ' . $cmbTRecurs . '</div>
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">                  
                           <span class="input-group-addon" >TIPO DE LIQUIDACION:</span>
                            <div class="6u$ 12u$(xsmall)" name="divTLiquid"  id="divTLiquid">' . $cmbTLiquid . ' </div>
                           <span class="input-group-addon" >DOCUMENTO DE LIQUIDACION:</span>
                            <input name="txtDocLiquid" id="txtDocLiquid" type="text"  value="' . $docLiquid. '" />
                        </div> 
                        <br/>
                         <div class="input-group input-group-sm">                  
                           <span class="input-group-addon" >F. LIQUIDACION:</span>
                            <input name="dtLiquid" id="dtLiquid" type="text" value="' . $fec_Liquid . '" />
                           <span class="input-group-addon" >CODIGO FUNCION:</span>
                            <div class="6u$ 12u$(xsmall)" name="divFuncion"  id="divFuncion"> ' . $cmbFuncion . '</div>
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">                  
                           <span class="input-group-addon" >EJE:</span>
                            <input name="txtEje" id="txtEje" type="text"  value="' . $eje . '" />
                           <span class="input-group-addon" >EST:</span>
                            <input name="txtEst" id="txtEst"  type="text" value="' . $est . '" />
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >PROG:</span>
                            <input name="txtProg" id="txtProg" type="text" value="' . $prog . '" />
                        </div> 
                        <br/>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" >SEGMENTO DEL SERVICIO:</span>
                            <textarea id="txtSegment" name="txtSegment" class="form-control" placeholder=" - Max 256 Caracteres -" >'.$segmento.'</textarea>
                        </div> 
                        <br/>
                        <input type="button" id="btnIngresar" name="btnIngresar" value="REGISTRAR" class="button " />
                        <input type="reset" id="btnIngresar" name="btnIngresar" value="LIMPIAR" class="button " />

                    </div>

                </form>

            </CENTER>
';

    return $htmlContrato;
}
?>