<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class contracto extends conexion {
    
    private $sbId;
    private $nuDependId;
    private $sbSeccion;
    private $nuMSeleccId;
    private $nuCausalId;
    private $nuTContractId;
    private $nuTGastoId;
    private $dtSuscripc;
    private $dtInicio;
    private $dtTermn;
    private $nuPlazoEjec;
    private $nuContratista;
    private $sbObjeto;
    private $sbResAdjudic;
    private $dtAdjudicacion;
    private $flValorIni;
    private $nuAnticipo;
    private $flValorAnt;
    private $nuPublicSecop;
    private $dtPublicSecop;
    private $nuActSecop;
    private $dtActSecop;
    private $sbLinkSecop;
    private $nuFiducia;
    private $sbObserv;
    private $nuAfectPresupt;
    private $nuTRecursId;
    private $nuTLiquidId;
    private $sbDocLiquid;
    private $dtLiquid;
    private $nuFuncionId;
    private $sbSegmento;
    private $sbEje;
    private $sbEst;
    private $sbProg;
    
    
    function getNuContratista() {
        return $this->nuContratista;
    }

    function setNuContratista($nuContratista) {
        $this->nuContratista = $nuContratista;
    }

        
    function getSbId() {
        return $this->sbId;
    }

    function getNuId() {
        return $this->nuId;
    }

    function getNuDependId() {
        return $this->nuDependId;
    }

    function getSbSeccion() {
        return $this->sbSeccion;
    }

    function getNuMSeleccId() {
        return $this->nuMSeleccId;
    }

    function getNuCausalId() {
        return $this->nuCausalId;
    }

    function getNuTContractId() {
        return $this->nuTContractId;
    }

    function getNuTGastoId() {
        return $this->nuTGastoId;
    }

    function getDtSuscripc() {
        return $this->dtSuscripc;
    }

    function getDtInicio() {
        return $this->dtInicio;
    }

    function getDtTermn() {
        return $this->dtTermn;
    }

    function getNuPlazoEjec() {
        return $this->nuPlazoEjec;
    }

    function getSbObjeto() {
        return $this->sbObjeto;
    }

    function getSbResAdjudic() {
        return $this->sbResAdjudic;
    }

    function getDtAdjudicacion() {
        return $this->dtAdjudicacion;
    }

    function getFlValorIni() {
        return $this->flValorIni;
    }

    function getNuAnticipo() {
        return $this->nuAnticipo;
    }

    function getFlValorAnt() {
        return $this->flValorAnt;
    }

    function getNuPublicSecop() {
        return $this->nuPublicSecop;
    }

    function getDtPublicSecop() {
        return $this->dtPublicSecop;
    }

    function getNuActSecop() {
        return $this->nuActSecop;
    }

    function getDtActSecop() {
        return $this->dtActSecop;
    }

    function getSbLinkSecop() {
        return $this->sbLinkSecop;
    }

    function getNuFiducia() {
        return $this->nuFiducia;
    }

    function getSbObserv() {
        return $this->sbObserv;
    }

    function getNuAfectPresupt() {
        return $this->nuAfectPresupt;
    }

    function getNuTRecursId() {
        return $this->nuTRecursId;
    }

    function getNuTLiquidId() {
        return $this->nuTLiquidId;
    }

    function getSbDocLiquid() {
        return $this->sbDocLiquid;
    }

    function getDtLiquid() {
        return $this->dtLiquid;
    }

    function getNuFuncionId() {
        return $this->nuFuncionId;
    }

    function getSbSegmento() {
        return $this->sbSegmento;
    }

    function getSbEje() {
        return $this->sbEje;
    }

    function getSbEst() {
        return $this->sbEst;
    }

    function getSbProg() {
        return $this->sbProg;
    }

    function setSbId($sbId) {
        $this->sbId = $sbId;
    }


    function setNuDependId($nuDependId) {
        $this->nuDependId = $nuDependId;
    }

    function setSbSeccion($sbSeccion) {
        $this->sbSeccion = $sbSeccion;
    }

    function setNuMSeleccId($nuMSeleccId) {
        $this->nuMSeleccId = $nuMSeleccId;
    }

    function setNuCausalId($nuCausalId) {
        $this->nuCausalId = $nuCausalId;
    }

    function setNuTContractId($nuTContractId) {
        $this->nuTContractId = $nuTContractId;
    }

    function setNuTGastoId($nuTGastoId) {
        $this->nuTGastoId = $nuTGastoId;
    }

    function setDtSuscripc($dtSuscripc) {
        $this->dtSuscripc = $dtSuscripc;
    }

    function setDtInicio($dtInicio) {
        $this->dtInicio = $dtInicio;
    }

    function setDtTermn($dtTermn) {
        $this->dtTermn = $dtTermn;
    }

    function setNuPlazoEjec($nuPlazoEjec) {
        $this->nuPlazoEjec = $nuPlazoEjec;
    }

    function setSbObjeto($sbObjeto) {
        $this->sbObjeto = $sbObjeto;
    }

    function setSbResAdjudic($sbResAdjudic) {
        $this->sbResAdjudic = $sbResAdjudic;
    }

    function setDtAdjudicacion($dtAdjudicacion) {
        $this->dtAdjudicacion = $dtAdjudicacion;
    }

    function setFlValorIni($flValorIni) {
        $this->flValorIni = $flValorIni;
    }

    function setNuAnticipo($nuAnticipo) {
        $this->nuAnticipo = $nuAnticipo;
    }

    function setFlValorAnt($flValorAnt) {
        $this->flValorAnt = $flValorAnt;
    }

    function setNuPublicSecop($nuPublicSecop) {
        $this->nuPublicSecop = $nuPublicSecop;
    }

    function setDtPublicSecop($dtPublicSecop) {
        $this->dtPublicSecop = $dtPublicSecop;
    }

    function setNuActSecop($nuActSecop) {
        $this->nuActSecop = $nuActSecop;
    }

    function setDtActSecop($dtActSecop) {
        $this->dtActSecop = $dtActSecop;
    }

    function setSbLinkSecop($sbLinkSecop) {
        $this->sbLinkSecop = $sbLinkSecop;
    }

    function setNuFiducia($nuFiducia) {
        $this->nuFiducia = $nuFiducia;
    }

    function setSbObserv($sbObserv) {
        $this->sbObserv = $sbObserv;
    }

    function setNuAfectPresupt($nuAfectPresupt) {
        $this->nuAfectPresupt = $nuAfectPresupt;
    }

    function setNuTRecursId($nuTRecursId) {
        $this->nuTRecursId = $nuTRecursId;
    }

    function setNuTLiquidId($nuTLiquidId) {
        $this->nuTLiquidId = $nuTLiquidId;
    }

    function setSbDocLiquid($sbDocLiquid) {
        $this->sbDocLiquid = $sbDocLiquid;
    }

    function setDtLiquid($dtLiquid) {
        $this->dtLiquid = $dtLiquid;
    }

    function setNuFuncionId($nuFuncionId) {
        $this->nuFuncionId = $nuFuncionId;
    }

    function setSbSegmento($sbSegmento) {
        $this->sbSegmento = $sbSegmento;
    }

    function setSbEje($sbEje) {
        $this->sbEje = $sbEje;
    }

    function setSbEst($sbEst) {
        $this->sbEst = $sbEst;
    }

    function setSbProg($sbProg) {
        $this->sbProg = $sbProg;
    }

    
    public function save() {          
        $estadoId=1;
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();
        $sql = "INSERT INTO contracto VALUES("
                . "'" . $this->getsbId(). "',"
                . $this->getNuDependId() . ","
                . "'" . $this->getSbSeccion() . "',"
                . $this->getNuMSeleccId() . ","
                . $this->getNuCausalId() . ","
                . $this->getNuTContractId() . ","
                . $this->getNuTGastoId() . ","
                . "'" . $this->getDtSuscripc() . "',"
                . "'" . $this->getDtInicio() . "',"
                . "'" . $this->getDtTermn() . "',"
                . $this->getNuPlazoEjec() . ","
                . $this->getNuContratista() . ","
                . "'" . $this->getSbObjeto() . "',"
                . "'" . $this->getSbResAdjudic() . "',"
                . "'" . $this->getDtAdjudicacion() . "',"
                . $this->getFlValorIni() . ","
                . $this->getNuAnticipo() . ","
                . $this->getFlValorAnt() . ","
                . $this->getNuPublicSecop() . ","
                . "'" . $this->getDtPublicSecop() . "',"
                . $this->getNuActSecop() . ","
                . "'" . $this->getDtActSecop() . "',"
                . "'" . $this->getSbLinkSecop() . "',"
                . $this->getNuFiducia() . ","
                . "'" . $this->getSbObserv() . "',"
                . $this->getNuAfectPresupt() . ","
                . $this->getNuTRecursId() . ","
                . $this->getNuTLiquidId() . ","
                . "'" . $this->getSbDocLiquid() . "',"
                . "'" . $this->getDtLiquid() . "',"
                . $this->getNuFuncionId() . ","
                . "'" . $this->getSbSegmento() . "',"
                . "'" . $this->getSbEje() . "',"
                . "'" . $this->getSbEst() . "',"
                . "'" . $this->getSbProg() . "',"
                . "$estadoId,'$dtfecha','$dtfecha', $user)";
        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();
        $sql = "UPDATE contracto SET "
                ."depend_id =". $this->getNuDependId() . ","
                . "seccion='" . $this->getSbSeccion() . "',"
                . "m_selecc_id=" . $this->getNuMSeleccId() . ","
                . "causal_id=" . $this->getNuCausalId() . ","
                . "t_contract_id=" . $this->getNuTContractId() . ","
                . "t_gasto_id=" .$this->getNuTGastoId() . ","
                . "fec_suscripc='" . $this->getDtSuscripc() . "',"
                . "fec_ini='" . $this->getDtInicio() . "',"
                . "fec_termn='" . $this->getDtTermn() . "',"
                . "plazo_ejecuc=" . $this->getNuPlazoEjec() . ","
                . "contratista_id=" . $this->getNuContratista() . ","
                . "objeto='" . $this->getSbObjeto() . "',"
                . "res_adjud='" . $this->getSbResAdjudic() . "',"
                . "fec_adjud='" . $this->getDtAdjudicacion() . "',"
                . "valor_ini=" . $this->getFlValorIni() . ","
                . "anticipo=" . $this->getNuAnticipo() . ","
                . "valor_anticp=" . $this->getFlValorAnt() . ","
                . "public_secop=" . $this->getNuPublicSecop() . ","
                . "fpublic_secop='" . $this->getDtPublicSecop() . "',"
                . "actulz_secop=" . $this->getNuActSecop() . ","
                . "factulz_secop='" . $this->getDtActSecop() . "',"
                . "link_secop='" . $this->getSbLinkSecop() . "',"
                . "fiducia=" . $this->getNuFiducia() . ","
                . "observ='" . $this->getSbObserv() . "',"
                . "afect_presupt=" . $this->getNuAfectPresupt() . ","
                . "t_recurs_id=" . $this->getNuTRecursId() . ","
                . "t_liquid_id=" . $this->getNuTLiquidId() . ","
                . "doc_liquid='" . $this->getSbDocLiquid() . "',"
                . "fec_liquid='" . $this->getDtLiquid() . "',"
                . "funcion_id=" . $this->getNuFuncionId() . ","
                . "segmento='" . $this->getSbSegmento() . "',"
                . "eje='" . $this->getSbEje() . "',"
                . "est='" . $this->getSbEst() . "',"
                . "prog='" . $this->getSbProg() . "',"
                . "fec_mod='" . $dtfecha . "',"
                . "user_id=" . $user 
                ." where id = '".$this->getSbId()."'";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $sql;
    }

    public function getListId($table ="") {
        
        $arrInfo = array();
        conexion::conectar();
        $sql = "select * from ";
        if($table !=""){
            $sql.=$table;
        }else{
            $sql.=" contracto ";
        }
        $sql.= " where id = '" . $this->getSbId()."'";
        $result = conexion::query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $key => $value) {
                $arrInfo[$key] = $value;
            }
        }


        mysqli_free_result($result);
        conexion::desconectar();
        return $arrInfo;
    }

    public function getList($select) {

        $arrInfo = array();
        conexion::conectar();
        $sql = "select " . $select . " from v_contracto order by fec_reg desc";
        $result = conexion::query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $arrInfo[] = $row;
        }

        mysqli_free_result($result);
        conexion::desconectar();
        return $arrInfo;
    }

}

?>