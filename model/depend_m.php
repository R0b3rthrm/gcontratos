<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class depend extends conexion {

    function getNuId() {
        return $this->nuId;
    }

    function getSbNombre() {
        return $this->sbNombre;
    }

    function getNuEstado() {
        return $this->nuEstado;
    }

    function setNuId($nuId) {
        $this->nuId = $nuId;
    }

    function setSbNombre($sbNombre) {
        $this->sbNombre = $sbNombre;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

     

    public function save() {

        $sql = "INSERT INTO depend VALUES(0,"
                . "'" . $this->getSbNombre() . "',"
                . $this->getNuEstado() . ")";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $sql = "UPDATE depend SET "
                . "nombre='" . $this->getSbNombre() . "',"
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
        $sql = "select * from depend where id = " .$this->getNuId();
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
        $sql = "select " . $select . " from depend d, estado e where d.id = e.id";
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