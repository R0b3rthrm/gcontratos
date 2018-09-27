<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class proyecto extends conexion {

    private $nuId;
    private $sbContrato;
    private $nuProyect;
    private $sbCodAct;
    private $dtFecIni;
    private $dtFecFin;
    private $nuPorcentaje;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getSbContrato() {
        return $this->sbContrato;
    }

    function getNuProyect() {
        return $this->nuProyect;
    }

    function getSbCodAct() {
        return $this->sbCodAct;
    }

    function getDtFecIni() {
        return $this->dtFecIni;
    }

    function getDtFecFin() {
        return $this->dtFecFin;
    }

    function getNuPorcentaje() {
        return $this->nuPorcentaje;
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

    function setNuProyect($nuProyect) {
        $this->nuProyect = $nuProyect;
    }

    function setSbCodAct($sbCodAct) {
        $this->sbCodAct = $sbCodAct;
    }

    function setDtFecIni($dtFecIni) {
        $this->dtFecIni = $dtFecIni;
    }

    function setDtFecFin($dtFecFin) {
        $this->dtFecFin = $dtFecFin;
    }

    function setNuPorcentaje($nuPorcentaje) {
        $this->nuPorcentaje = $nuPorcentaje;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

        
    public function save() {
        $estadoId = 1;
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "INSERT INTO proyecto  VALUES(0,"
                . "'" . $this->getSbContrato(). "',"
                .  $this->getNuProyect(). ","
                . "'" . $this->getSbCodAct(). "',"
                . "'" . $this->getDtFecIni(). "',"
                . "'" . $this->getDtFecFin(). "',"
                . $this->getNuPorcentaje() . ","
                . "$estadoId,'$dtfecha','$dtfecha', $user)";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "UPDATE proyecto  SET "
                . "contrato_id='" . $this->getSbContrato() . "',"
                . "proyect_id='" . $this->getNuProyect() . "',"
                . "cod_act='" . $this->getSbCodAct() . "',"
                . "fec_ini='" . $this->getDtFecIni() . "',"
                . "fec_fin='" . $this->getDtFecFin(). "',"
                . "porcentaje=" . $this->getNuPorcentaje() . ","
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
        $sql = "select * from proyecto where id = " . $this->getNuId();
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
        $sql = "SELECT " . $select . " FROM proyecto p INNER JOIN contrato c ON p.contrato_id = c.id INNER JOIN proyect pr ON p.proyect_id = pr.id INNER JOIN estado e ON p.estado_id = e.id";
        
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
        $sql="DELETE FROM proyecto WHERE id = ".$this->getNuId();
        $result = conexion::query($sql);
        return $result;
    }

}

?>