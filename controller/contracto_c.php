<?php

require_once("../model/contracto_m.php");
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
            $objContract->setSbObjeto(trim($_POST['txtObject']));
            $objContract->setSbResAdjudic(trim($_POST['txtResAdjudicacion']));
            $objContract->setDtAdjudicacion(trim($_POST['dtAdjudicacion']));
            $objContract->setFlValorIni(trim($_POST['txtValorIni']));
            $objContract->setNuAnticipo(trim($_POST['cmbPactoAnticp']));
            $objContract->setFlValorAnt(trim($_POST['txtValorAnticp']));
            $objContract->setNuPublicSecop(trim($_POST['cmbPublicSecop']));
            $objContract->setDtPublicSecop(trim($_POST['dtPublicSecop']));
            $objContract->setNuActSecop(trim($_POST['cmbActSecop']));
            $objContract->setDtActSecop(trim($_POST['dtActSecop']));
            $objContract->setSbLinkSecop(trim($_POST['txtLinkSecop']));
            $objContract->setNuFiducia(trim($_POST['cmbFiducia']));
            $objContract->setSbObserv(trim($_POST['txtObserv']));
            $objContract->setNuAfectPresupt(trim($_POST['cmbAfecTaPresupt']));
            $objContract->setNuTRecursId(trim($_POST['cmbTRecurs']));
            $objContract->setNuTLiquidId(trim($_POST['cmbTLiquid']));
            $objContract->setSbDocLiquid(trim($_POST['txtDocLiquid']));
            $objContract->setDtLiquid(trim($_POST['dtLiquid']));
            $objContract->setNuFuncionId(trim($_POST['cmbFuncion']));
            $objContract->setSbSegmento(trim($_POST['txtSegment']));
            $objContract->setSbEje(trim($_POST['txtEje']));
            $objContract->setSbEst(trim($_POST['txtEst']));
            $objContract->setSbProg(trim($_POST['txtProg']));
            $resultInfo = $objContract->save();
        } elseif ($nuProcess == 2) {

            $arrList = $objContract->getList("id,depend_nom,tcontract_nom ,valor_ini,fec_ini,fec_termn");

            $resultInfo="";
            $i = 1;
            foreach ($arrList as $value) {
                $resultInfo .= '<tr><td>' . $i . '</td>'
                        . '<td>' . $value['id'] . '</td>'
                        . '<td>' . $value['depend_nom'] . '</td>'
                        . '<td>' . $value['tcontract_nom'] . '</td>'
                        . '<td>' . $value['valor_ini'] . '</td>'
                        . '<td>' . $value['fec_ini'] . '</td>'
                        . '<td>' . $value['fec_termn'] . '</td>'
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
            $objContract->setSbObjeto(trim($_POST['txtObject']));
            $objContract->setSbResAdjudic(trim($_POST['txtResAdjudicacion']));
            $objContract->setDtAdjudicacion(trim($_POST['dtAdjudicacion']));
            $objContract->setFlValorIni(trim($_POST['txtValorIni']));
            $objContract->setNuAnticipo(trim($_POST['cmbPactoAnticp']));
            $objContract->setFlValorAnt(trim($_POST['txtValorAnticp']));
            $objContract->setNuPublicSecop(trim($_POST['cmbPublicSecop']));
            $objContract->setDtPublicSecop(trim($_POST['dtPublicSecop']));
            $objContract->setNuActSecop(trim($_POST['cmbActSecop']));
            $objContract->setDtActSecop(trim($_POST['dtActSecop']));
            $objContract->setSbLinkSecop(trim($_POST['txtLinkSecop']));
            $objContract->setNuFiducia(trim($_POST['cmbFiducia']));
            $objContract->setSbObserv(trim($_POST['txtObserv']));
            $objContract->setNuAfectPresupt(trim($_POST['cmbAfecTaPresupt']));
            $objContract->setNuTRecursId(trim($_POST['cmbTRecurs']));
            $objContract->setNuTLiquidId(trim($_POST['cmbTLiquid']));
            $objContract->setSbDocLiquid(trim($_POST['txtDocLiquid']));
            $objContract->setDtLiquid(trim($_POST['dtLiquid']));
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