<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class disponibilidad extends conexion {

    private $nuId;
    private $sbContrato;
    private $nuDispon;
    private $nuCompro;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getSbContrato() {
        return $this->sbContrato;
    }

    function getNuDispon() {
        return $this->nuDispon;
    }

    function getNuCompro() {
        return $this->nuCompro;
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

    function setNuDispon($nuDispon) {
        $this->nuDispon = $nuDispon;
    }

    function setNuCompro($nuCompro) {
        $this->nuCompro = $nuCompro;
    }

    function setNuEstado($nuEstado) {
        $this->nuEstado = $nuEstado;
    }

            
    public function save() {
        $estadoId = 1;
        $user = getSession('ID');
        $dtfecha = getFechaHoraActual();

        $sql = "INSERT INTO disponibilidad  VALUES(0,"
                . "'" . $this->getSbContrato(). "',"
                .  $this->getNuDispon(). ","
                .  $this->getNuCompro(). ","
                . "$estadoId,'$dtfecha','$dtfecha', $user)";

        conexion::conectar();
        $result = conexion::query($sql);
        conexion::desconectar();

        return $result;
    }

    public function getListId() {

        $arrInfo = array();
        conexion::conectar();
        $sql = "select * from disponibilidad where id = " . $this->getNuId();
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
        $sql = "SELECT " . $select . " FROM disponibilidad d INNER JOIN dispon di ON d.dispon_id = di.id INNER JOIN compro c ON d.compro_id = c.id INNER JOIN estado e ON d.estado_id = e.id";
        
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
        $sql="DELETE FROM disponibilidad WHERE id = ".$this->getNuId();
        $result = conexion::query($sql);
        return $result;
    }
    
    public function valFecContract ($contracto,$disponibilidad){
        
        conexion::conectar();
        $sql="SELECT * FROM disponibilidad WHERE id = ".$this->getNuId();
        $result = conexion::query($sql);
        return $result;
            
    }

}

?>