<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class proyecto extends conexion {

    private $nuId;
    private $sbContracto;
    private $sbCod;
    private $sbCodAct;
    private $dtFecIni;
    private $dtFecFin;
    private $nuPorcentaje;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getSbContracto() {
        return $this->sbContracto;
    }

    function getSbCod() {
        return $this->sbCod;
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

    function setSbContracto($sbContracto) {
        $this->sbContracto = $sbContracto;
    }

    function setSbCod($sbCod) {
        $this->sbCod = $sbCod;
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
                . "'" . $this->getSbContracto(). "',"
                . "'" . $this->getSbCod(). "',"
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
                . "contracto_id='" . $this->getSbContracto() . "',"
                . "cod='" . $this->getSbCod() . "',"
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

    ///////////////////AQUI VOYYYYYYYYY
    public function getList($select, $where = '', $order = '', $tipoSelect = '') {

        $arrInfo = array();
        conexion::conectar();
        $sql = "SELECT " . $select . " FROM proyecto p INNER JOIN p. ON INNER JOIN estado e ON p.estado_id = e.id";
        
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