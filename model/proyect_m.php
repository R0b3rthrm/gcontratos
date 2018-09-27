<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class proyect extends conexion {
    
    private $nuId;
    private $sbCod;
    private $nuEstado;
            
    function getNuId() {
        return $this->nuId;
    }

    function getSbCod() {
        return $this->sbCod;
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

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

        

    public function save() {

        $sql = "INSERT INTO proyect VALUES(0,"
                . "'" . $this->getSbCod() . "',"
                . $this->getNuEstado() . ")";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $sql = "UPDATE proyect SET "
                . "codigo='" . $this->getSbCod() . "',"
                . "estado_id=" . $this->getNuEstado() 
                ." where id =".$this->getNuId();

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }
   
    public function getListId() {

        $arrInfo = array();
        conexion::conectar();
        $sql = "select * from proyect where id = " .$this->getNuId();
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
        $sql = "select " . $select . " from proyect p inner join estado e on p.estado_id = e.id";
        
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