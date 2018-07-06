<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class poliza extends conexion {

    private $nuId;
    private $sbContrato;
    private $nuTerceroID;
    private $sbNumPoliza;
    private $dtFecExp;
    private $sbResulucion;
    private $dtFecApro;
    private $nuTPoliza;
    private $nuValor;
    private $dtFecIni;
    private $dtFecFin;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getSbContrato() {
        return $this->sbContrato;
    }

    function getNuTerceroID() {
        return $this->nuTerceroID;
    }

    function getSbNumPoliza() {
        return $this->sbNumPoliza;
    }

    function getDtFecExp() {
        return $this->dtFecExp;
    }

    function getSbResulucion() {
        return $this->sbResulucion;
    }

    function getDtFecApro() {
        return $this->dtFecApro;
    }

    function getNuTPoliza() {
        return $this->nuTPoliza;
    }

    function getNuValor() {
        return $this->nuValor;
    }

    function getDtFecIni() {
        return $this->dtFecIni;
    }

    function getDtFecFin() {
        return $this->dtFecFin;
    }

    function getNuEstado() {
        return $this->nuEstado;
    }

    function setNuId($nuId) {
        $this->nuId = $nuId;
    }

    function setSbContrato($sbContrato) {
        $this->sbContrato = $sbContrato;
    }

    function setNuTerceroID($nuTerceroID) {
        $this->nuTerceroID = $nuTerceroID;
    }

    function setSbNumPoliza($sbNumPoliza) {
        $this->sbNumPoliza = $sbNumPoliza;
    }

    function setDtFecExp($dtFecExp) {
        $this->dtFecExp = $dtFecExp;
    }

    function setSbResulucion($sbResulucion) {
        $this->sbResulucion = $sbResulucion;
    }

    function setDtFecApro($dtFecApro) {
        $this->dtFecApro = $dtFecApro;
    }

    function setNuTPoliza($nuTPoliza) {
        $this->nuTPoliza = $nuTPoliza;
    }

    function setNuValor($nuValor) {
        $this->nuValor = $nuValor;
    }

    function setDtFecIni($dtFecIni) {
        $this->dtFecIni = $dtFecIni;
    }

    function setDtFecFin($dtFecFin) {
        $this->dtFecFin = $dtFecFin;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

    
        public function save() {
        $estadoId = 1;
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "INSERT INTO poliza  VALUES(0,"
                . "'" . $this->getSbContrato(). "',"
                . $this->getNuTerceroID() . ","
                . "'" . $this->getSbNumPoliza(). "',"
                . "'" . $this->getDtFecExp(). "',"
                . "'" . $this->getSbResulucion(). "',"
                . "'" . $this->getDtFecApro(). "',"
                . $this->getNuTPoliza() . ","
                . $this->getNuValor() . ","
                . "'" . $this->getDtFecIni(). "',"
                . "'" . $this->getDtFecFin(). "',"
                . "$estadoId,'$dtfecha','$dtfecha', $user)";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "UPDATE poliza  SET "
                . "contrato_id='" . $this->getSbContrato() . "',"
                . "tercero_id=" . $this->getNuTerceroID() . ","
                . "num_poliza='" . $this->getSbNumPoliza() . "',"
                . "fec_exp='" . $this->getDtFecExp() . "',"
                . "resolucion='" . $this->getSbResulucion() . "',"
                . "fec_apro='" . $this->getDtFecApro() . "',"
                . "t_poliza_id=" . $this->getNuTPoliza() . ","
                . "valor=" . $this->getNuValor() . ","
                . "fec_ini='" . $this->getDtFecIni() . "',"
                . "fec_fin='" . $this->getDtFecFin() . "',"
                . "fec_mod='" . $dtfecha . "',"
                . "user_id=" . $user
                . " where id =" . $this->getNuId();

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function getListId() {

        $arrInfo = array();
        conexion::conectar();
        $sql = "select * from poliza where id = " . $this->getNuId();
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

    
    ///////////AQUI VOY
    public function getList($select, $where = '', $order = '', $tipoSelect = '') {

        $arrInfo = array();
        conexion::conectar();
        $sql = "SELECT " . $select . " FROM poliza p INNER JOIN contrato c ON p.contrato_id = c.id INNER JOIN tercero t ON p.tercero_id = t.id INNER JOIN t_poliza tp ON p.t_poliza_id = tp.id INNER JOIN estado e ON p.estado_id = e.id";
        
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
    
    public function delete (){
        
        conexion::conectar();
        $sql="DELETE FROM poliza WHERE id = ".$this->getNuId();
        $result = conexion::query($sql);
        return $result;
    }

}

?>