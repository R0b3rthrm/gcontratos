<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class acta extends conexion {

    private $nuId;
    private $sbContrato;
    private $nuTAvance;
    private $dtFecha;
    private $nuPorcentaje;
    private $nuEstado;

    function getNuId() {
        return $this->nuId;
    }

    function getSbContrato() {
        return $this->sbContrato;
    }

    function getNuTAvance() {
        return $this->nuTAvance;
    }

    function getDtFecha() {
        return $this->dtFecha;
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

    function setNuTAvance($nuTAvance) {
        $this->nuTAvance = $nuTAvance;
    }

    function setDtFecha($dtFecha) {
        $this->dtFecha = $dtFecha;
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

        $sql = "INSERT INTO acta  VALUES(0,"
                . "'" . $this->getSbContrato() . "',"
                . $this->getNuTAvance() . ","
                . "'" . $this->getDtFecha() . "',"
                . $this->getNuPorcentaje() . ","
                . "$estadoId,'$dtfecha','$dtfecha', $user)";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $estadoId = 1;
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "UPDATE acta  SET "
                . "contrato_id='" . $this->getSbContrato() . "',"
                . "t_avance_id=" . $this->getNuTAvance() . ","
                . "fecha='" . $this->getDtFecha() . "',"
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
        $sql = "select * from acta  where id = " . $this->getNuId();
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
        $sql = "SELECT " . $select . " FROM acta a INNER JOIN contrato c ON a.contrato_id = c.id  INNER JOIN t_avance ta ON a.t_avance_id = ta.id INNER JOIN estado e on a.estado_id = e.id";
        
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
        $sql="DELETE FROM acta WHERE id = ".$this->getNuId();
        $result = conexion::query($sql);
        return $result;
    }

}

?>