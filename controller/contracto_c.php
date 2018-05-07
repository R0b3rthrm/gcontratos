<?php

require_once("../model/contracto_m.php");
require_once("../utils/utils.php");
$resultInfo;
$sbmsj = "";
$objContract = new contracto;

if (isset($_POST['txtIdC'])) {
    $resultInfo=array();
    $objContract->setSbId($_POST['txtIdC']);
    $resultInfo = $objContract->getListId();
    echo json_encode($resultInfo);exit;
}else{

    $nuProcess = trim($_POST['txtProcess']);

    try {

        if ($nuProcess == 1) {

            $objContract->setSbId(trim($_POST['txtId']));
            $objContract->setNuDependId(trim($_POST['cmbDepend']));
            $objContract->setSbSeccion(trim($_POST['txtSeccion']));
            $objContract->setNuMSeleccId(trim($_POST['cmbMSelecc']));
            $objContract->setNuCausalId(trim($_POST['cmbCausal']));
            $objContract->setNuTContractId(trim($_POST['cmbTContract']));
            $objContract->setNuTGastoId(trim($_POST['cmbTGasto']));
            $objContract->setDtSuscripc(trim($_POST['dtSuscripcion']));
            $objContract->setDtInicio(trim($_POST['dtInicio']));
            $objContract->setDtTermn(trim($_POST['dtTerminacion']));
            $objContract->setNuPlazoEjec(trim($_POST['txtPlazoEj']));
            $objContract->setNuContratista($_POST['cmbContratista']);
            $objContract->setSbObjeto(daleteSymbol(trim($_POST['txtObject'])));
            $objContract->setSbResAdjudic(trim($_POST['txtResAdjudicacion']));
            if($_POST['dtAdjudicacion']==''){$_POST['dtAdjudicacion']='1000-10-10';}
            $objContract->setDtAdjudicacion(trim($_POST['dtAdjudicacion']));
            $objContract->setFlValorIni(trim($_POST['txtValorIni']));
            if($_POST['cmbPactoAnticp']==''){$_POST['cmbPactoAnticp']=0;}
            $objContract->setNuAnticipo(trim($_POST['cmbPactoAnticp']));
            if($_POST['txtValorAnticp']==''){$_POST['txtValorAnticp']=0;}
            $objContract->setFlValorAnt(trim($_POST['txtValorAnticp']));
            if($_POST['cmbPublicSecop']==''){$_POST['cmbPublicSecop']=0;}
            $objContract->setNuPublicSecop(trim($_POST['cmbPublicSecop']));
            if($_POST['dtPublicSecop']==''){$_POST['dtPublicSecop']='1000-10-10';}
            $objContract->setDtPublicSecop(trim($_POST['dtPublicSecop']));
            if($_POST['cmbActSecop']==''){$_POST['cmbActSecop']=0;}
            $objContract->setNuActSecop(trim($_POST['cmbActSecop']));
            if($_POST['dtActSecop']==''){$_POST['dtActSecop']='1000-10-10';}
            $objContract->setDtActSecop(trim($_POST['dtActSecop']));
            $objContract->setSbLinkSecop(trim($_POST['txtLinkSecop']));
            if($_POST['cmbFiducia']==''){$_POST['cmbFiducia']=0;}
            $objContract->setNuFiducia(trim($_POST['cmbFiducia']));
            $objContract->setSbObserv(trim($_POST['txtObserv']));
            if($_POST['cmbAfecTaPresupt']==''){$_POST['cmbAfecTaPresupt']=0;}
            $objContract->setNuAfectPresupt(trim($_POST['cmbAfecTaPresupt']));
            if($_POST['cmbTRecurs']==''){$_POST['cmbTRecurs']=0;}
            $objContract->setNuTRecursId(trim($_POST['cmbTRecurs']));
            if($_POST['cmbTLiquid']==''){$_POST['cmbTLiquid']=0;}
            $objContract->setNuTLiquidId(trim($_POST['cmbTLiquid']));
            $objContract->setSbDocLiquid(trim($_POST['txtDocLiquid']));
            if($_POST['dtLiquid']==''){$_POST['dtLiquid']='1000-10-10';}
            $objContract->setDtLiquid(trim($_POST['dtLiquid']));
            if($_POST['cmbFuncion']==''){$_POST['cmbFuncion']=0;}
            $objContract->setNuFuncionId(trim($_POST['cmbFuncion']));
            $objContract->setSbSegmento(trim($_POST['txtSegment']));
            $objContract->setSbEje(trim($_POST['txtEje']));
            $objContract->setSbEst(trim($_POST['txtEst']));
            $objContract->setSbProg(trim($_POST['txtProg']));
            $resultInfo = $objContract->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objContract->getList("depend_nom, seccion, tcontract_nom, contratista_nom,contratista_ape,id,fec_ini,valor_ini");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['depend_nom'] . '</td>'
                        . '<td>' . $value['seccion'] . '</td>'
                        . '<td>' . $value['tcontract_nom'] . '</td>'
                        . '<td>' . $value['contratista_nom'] .' '.$value['contratista_ape']. '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['fec_ini'] . '</td>'
                        . '<td>' . $value['valor_ini'] . '</td>'
                        . '<td><a href="contractoUpdate?id=' . $value['id'] . '" > <IMG id="imgList" src="img/editar.png"/></a></td></tr>';
                $i++;
            }
        }elseif($nuProcess == 3){
            $objContract->setSbId(trim($_POST['txtId']));
            $objContract->setNuDependId(trim($_POST['cmbDepend']));
            $objContract->setSbSeccion(trim($_POST['txtSeccion']));
            $objContract->setNuMSeleccId(trim($_POST['cmbMSelecc']));
            $objContract->setNuCausalId(trim($_POST['cmbCausal']));
            $objContract->setNuTContractId(trim($_POST['cmbTContract']));
            $objContract->setNuTGastoId(trim($_POST['cmbTGasto']));
            $objContract->setDtSuscripc(trim($_POST['dtSuscripcion']));
            $objContract->setDtInicio(trim($_POST['dtInicio']));
            $objContract->setDtTermn(trim($_POST['dtTerminacion']));
            $objContract->setNuPlazoEjec(trim($_POST['txtPlazoEj']));
            $objContract->setNuContratista($_POST['cmbContratista']);            
            $objContract->setSbObjeto(daleteSymbol(trim($_POST['txtObject'])));
            $objContract->setSbResAdjudic(trim($_POST['txtResAdjudicacion']));
            if($_POST['dtAdjudicacion']==''){$_POST['dtAdjudicacion']='1000-10-10';}
            $objContract->setDtAdjudicacion(trim($_POST['dtAdjudicacion']));
            $objContract->setFlValorIni(trim($_POST['txtValorIni']));
            if($_POST['cmbPactoAnticp']==''){$_POST['cmbPactoAnticp']=0;}
            $objContract->setNuAnticipo(trim($_POST['cmbPactoAnticp']));
            if($_POST['txtValorAnticp']==''){$_POST['txtValorAnticp']=0;}
            $objContract->setFlValorAnt(trim($_POST['txtValorAnticp']));
            if($_POST['cmbPublicSecop']==''){$_POST['cmbPublicSecop']=0;}
            $objContract->setNuPublicSecop(trim($_POST['cmbPublicSecop']));
            if($_POST['dtPublicSecop']==''){$_POST['dtPublicSecop']='1000-10-10';}
            $objContract->setDtPublicSecop(trim($_POST['dtPublicSecop']));
            if($_POST['cmbActSecop']==''){$_POST['cmbActSecop']=0;}
            $objContract->setNuActSecop(trim($_POST['cmbActSecop']));
            if($_POST['dtActSecop']==''){$_POST['dtActSecop']='1000-10-10';}
            $objContract->setDtActSecop(trim($_POST['dtActSecop']));
            $objContract->setSbLinkSecop(trim($_POST['txtLinkSecop']));
            if($_POST['cmbFiducia']==''){$_POST['cmbFiducia']=0;}
            $objContract->setNuFiducia(trim($_POST['cmbFiducia']));
            $objContract->setSbObserv(trim($_POST['txtObserv']));
            if($_POST['cmbAfecTaPresupt']==''){$_POST['cmbAfecTaPresupt']=0;}
            $objContract->setNuAfectPresupt(trim($_POST['cmbAfecTaPresupt']));
            if($_POST['cmbTRecurs']==''){$_POST['cmbTRecurs']=0;}
            $objContract->setNuTRecursId(trim($_POST['cmbTRecurs']));
            if($_POST['cmbTLiquid']==''){$_POST['cmbTLiquid']=0;}
            $objContract->setNuTLiquidId(trim($_POST['cmbTLiquid']));
            $objContract->setSbDocLiquid(trim($_POST['txtDocLiquid']));
            if($_POST['dtLiquid']==''){$_POST['dtLiquid']='1000-10-10';}
            $objContract->setDtLiquid(trim($_POST['dtLiquid']));
            if($_POST['cmbFuncion']==''){$_POST['cmbFuncion']=0;}
            $objContract->setNuFuncionId(trim($_POST['cmbFuncion']));
            $objContract->setSbSegmento(trim($_POST['txtSegment']));
            $objContract->setSbEje(trim($_POST['txtEje']));
            $objContract->setSbEst(trim($_POST['txtEst']));
            $objContract->setSbProg(trim($_POST['txtProg']));
            $resultInfo = $objContract->update();
            
        }
        
    } catch (Exception $e) {

        $sbmsj = 'Excepci�n capturada: ' . $e->getMessage() . "\n";
    }
}
echo $resultInfo;
?>