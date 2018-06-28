<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class novedad extends conexion {
    
    private $nuId;
    private $sbContracto;
    private $nuTNoved;
    private $nuValor;
    private $nuPlazo;
    private $dtFecha;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getSbContracto() {
        return $this->sbContracto;
    }

    function getNuTNoved() {
        return $this->nuTNoved;
    }

    function getNuValor() {
        return $this->nuValor;
    }

    function getNuPlazo() {
        return $this->nuPlazo;
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

    function setSbContracto($sbContracto) {
        $this->sbContracto = $sbContracto;
    }

    function setNuTNoved($nuTNoved) {
        $this->nuTNoved = $nuTNoved;
    }

    function setNuValor($nuValor) {
        $this->nuValor = $nuValor;
    }

    function setNuPlazo($nuPlazo) {
        $this->nuPlazo = $nuPlazo;
    }

    function setDtFecha($dtFecha) {
        $this->dtFecha = $dtFecha;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

                
    public function save() {
        $estadoId=1;
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();
        
        $sql = "INSERT INTO novedad  VALUES(0,"
                . "'" . $this->getSbContracto() . "',"
                .  $this->getNuTNoved(). ","
                .  $this->getNuValor(). ","
                .  $this->getNuPlazo(). ","
                . "'" . $this->getDtFecha() . "',"
                . "$estadoId,'$dtfecha','$dtfecha', $user)";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function update() {

        $estadoId=1;
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();
        
        $sql = "UPDATE novedad  SET "
                . "contracto_id='" . $this->getSbContracto(). "',"
                . "t_noved_id=" . $this->getNuTNoved() . ","
                . "valor=" . $this->getNuValor() . ","
                . "plazo=" . $this->getNuPlazo() . ","
                . "fecha='" . $this->getDtFecha() . "',"
                . "fec_mod='" . $dtfecha. "',"
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
        $sql = "select * from novedad  where id = " . $this->getNuId();
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
        $sql = "SELECT " . $select . " FROM novedad n INNER JOIN contracto c ON n.contracto_id = c.id  INNER JOIN t_noved tn ON n.t_noved_id = tn.id INNER JOIN estado e on n.estado_id = e.id";

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
        $sql="DELETE FROM novedad WHERE id = ".$this->getNuId();
        $result = conexion::query($sql);
        return $result;
    }

}

?>