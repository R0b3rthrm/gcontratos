<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class compro extends conexion {
    
    private $nuId;
    private $sbCod;
    private $nuValor;
    private $dtFecha;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getSbCod() {
        return $this->sbCod;
    }

    function getNuValor() {
        return $this->nuValor;
    }

    function getDtFecha() {
        return $this->dtFecha;
    }

    function getNuEstado() {
        return $this->nuEstado;
    }

    function setNuId($nuId) {
        $this->nuId = $nuId;
    }

    function setSbCod($sbCod) {
        $this->sbCod = $sbCod;
    }

    function setNuValor($nuValor) {
        $this->nuValor = $nuValor;
    }

    function setDtFecha($dtFecha) {
        $this->dtFecha = $dtFecha;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

        
    public function save() {

        $sql = "INSERT INTO compro VALUES(0,"
                . "'" . $this->getSbCod() . "',"
                . $this->getNuEstado() . ")";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $sql = "UPDATE compro SET "
                . "codigo='" . $this->getSbCod() . "',"
                . "estado_id=" . $this->getNuEstado() 
                ." where id =".$this->getNuId();

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }
   
    public function updateId($update,$where) {

       $sql = "UPDATE compro SET ".$update." WHERE ".$where;
         
        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }
   
    public function getListId() {

        $arrInfo = array();
        conexion::conectar();
        $sql = "select * from compro where id = " .$this->getNuId();
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
        $sql = "select " . $select . " from compro c inner join estado e on c.estado_id = e.id";
        
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