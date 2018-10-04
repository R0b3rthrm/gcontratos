<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class procontrato extends conexion {
    
    private $nuId;
    private $sbContratoId;
    private $sbRevision1;
    private $sbRevision2;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getSbContratoId() {
        return $this->sbContratoId;
    }

    function getSbRevision1() {
        return $this->sbRevision1;
    }

    function getSbRevision2() {
        return $this->sbRevision2;
    }

    function getNuEstado() {
        return $this->nuEstado;
    }

    function setNuId($nuId) {
        $this->nuId = $nuId;
    }

    function setSbContratoId($sbContratoId) {
        $this->sbContratoId = $sbContratoId;
    }

    function setSbRevision1($sbRevision1) {
        $this->sbRevision1 = $sbRevision1;
    }

    function setSbRevision2($sbRevision2) {
        $this->sbRevision2 = $sbRevision2;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

            
    public function save() {

        $sql = "INSERT INTO procontrato VALUES(0,"
                . "'" . $this->getSbContratoId() . "',"
                . "'" . $this->getSbRevision1() . "',"
                . "'" . $this->getSbRevision2() . "',1)";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $sql = "UPDATE procontrato SET "
                . "contrato_id='" . $this->getSbContratoId(). "',"
                . "revision1='" . $this->getSbRevision1(). "',"
                . "revision2='" . $this->getSbRevision2(). "',"
                . "estado_id=" . $this->getNuEstado() 
                ." where id =".$this->getNuId();

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }
   
    public function updateId($update, $where) {

        $sql = "UPDATE procontrato SET ".$update." WHERE ".$where;

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }
   
    public function getListId() {

        $arrInfo = array();
        conexion::conectar();
        $sql = "select * from procontrato where id = " .$this->getNuId();
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
        $sql = "select " . $select . " from procontrato p inner join contrato c on p.contrato_id = c.id inner join estado e on p.estado_id = e.id";
        
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