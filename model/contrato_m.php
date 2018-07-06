<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class contrato extends conexion {
    
    private $sbId;
    private $nuDependId;
    private $sbSeccion;
    private $nuMSeleccId;
    private $nuCausalId;
    private $nuTContratId;
    private $nuTGastoId;
    private $dtSuscripc;
    private $dtInicio;
    private $dtTermn;
    private $nuPlazoEjec;
    private $nuTerceroId;
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
    
    function getSbId() {
        return $this->sbId;
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

    function getNuTContratId() {
        return $this->nuTContratId;
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

    function getNuTerceroId() {
        return $this->nuTerceroId;
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

    function setNuTContratId($nuTContratId) {
        $this->nuTContratId = $nuTContratId;
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

    function setNuTerceroId($nuTerceroId) {
        $this->nuTerceroId = $nuTerceroId;
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
        $sql = "INSERT INTO contrato VALUES("
                . "'" . $this->getsbId(). "',"
                . $this->getNuDependId() . ","
                . "'" . $this->getSbSeccion() . "',"
                . $this->getNuMSeleccId() . ","
                . $this->getNuCausalId() . ","
                . $this->getNuTContratId() . ","
                . $this->getNuTGastoId() . ","
                . "'" . $this->getDtSuscripc() . "',"
                . "'" . $this->getDtInicio() . "',"
                . "'" . $this->getDtTermn() . "',"
                . $this->getNuPlazoEjec() . ","
                . $this->getNuTerceroId() . ","
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
        $sql = "UPDATE contrato SET "
                ."depend_id =". $this->getNuDependId() . ","
                . "seccion='" . $this->getSbSeccion() . "',"
                . "m_selecc_id=" . $this->getNuMSeleccId() . ","
                . "causal_id=" . $this->getNuCausalId() . ","
                . "t_contrat_id=" . $this->getNuTContratId() . ","
                . "t_gasto_id=" .$this->getNuTGastoId() . ","
                . "fec_suscripc='" . $this->getDtSuscripc() . "',"
                . "fec_ini='" . $this->getDtInicio() . "',"
                . "fec_termn='" . $this->getDtTermn() . "',"
                . "plazo_ejecuc=" . $this->getNuPlazoEjec() . ","
                . "tercero_id=" . $this->getNuTerceroId() . ","
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

        return $result;
    }

    public function getListId($table ="") {
        
        $arrInfo = array();
        conexion::conectar();
        $sql = "select * from ";
        if($table !=""){
            $sql.=$table;
        }else{
            $sql.=" contrato ";
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

    public function getList($select, $where = '', $order = '', $tipoSelect = '') {

        $arrInfo = array();
        conexion::conectar();
        $sql = "select " . $select . " from v_contrato order by fec_reg desc";
        
        if (!empty($where)) {
            $sql .= " WHERE " . $where;
        }
        if (!empty($order)){
            $sql .= " ORDER BY ".$order;
        }
        
        $result = conexion::query($sql);

        if (empty($tipoSelect)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $arrInfo[] = $row;
            }
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $arrInfo[] = $row;
            }
        }

        mysqli_free_result($result);
        conexion::desconectar();
        return $arrInfo;
    }

}

?>