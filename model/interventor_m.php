<?php

require_once("conexion.php");
require_once("../utils/SessionPhp.php");
require_once("../utils/utils.php");

class interventor extends conexion {

    private $nuId;
    private $sbContrato;
    private $nuTIntervt;
    private $nuPlanta;
    private $nuTerceroID;
    private $sbNumContrat;
    private $nuPorcentaje;
    private $nuEstado;
    
    function getNuId() {
        return $this->nuId;
    }

    function getSbContrato() {
        return $this->sbContrato;
    }

    function getNuTIntervt() {
        return $this->nuTIntervt;
    }

    function getNuPlanta() {
        return $this->nuPlanta;
    }

    function getNuTerceroID() {
        return $this->nuTerceroID;
    }

    function getSbNumContrat() {
        return $this->sbNumContrat;
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

    function setNuTIntervt($nuTIntervt) {
        $this->nuTIntervt = $nuTIntervt;
    }

    function setNuPlanta($nuPlanta) {
        $this->nuPlanta = $nuPlanta;
    }

    function setNuTerceroID($nuTerceroID) {
        $this->nuTerceroID = $nuTerceroID;
    }

    function setSbNumContrat($sbNumContrat) {
        $this->sbNumContrat = $sbNumContrat;
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

        $sql = "INSERT INTO interventor  VALUES(0,"
                . "'" . $this->getSbContrato(). "',"
                . $this->getNuTIntervt() . ","
                . $this->getNuPlanta() . ","
                . $this->getNuTerceroID() . ","
                . "'" . $this->getSbNumContrat(). "',"
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

        $sql = "UPDATE interventor  SET "
                . "contrato_id='" . $this->getSbContrato() . "',"
                . "t_intervt_id=" . $this->getNuTIntervt() . ","
                . "planta=" . $this->getNuPlanta() . ","
                . "tercero_id=" . $this->getNuTerceroID() . ","
                . "num_contrat='" . $this->getSbNumContrat() . "',"
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
        $sql = "select * from interventor where id = " . $this->getNuId();
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
        $sql = "SELECT " . $select . " FROM interventor i INNER JOIN contrato c ON i.contrato_id = c.id INNER JOIN tercero t ON i.tercero_id = t.id INNER JOIN t_intervt ti ON i.t_intervt_id = ti.id INNER JOIN estado e ON i.estado_id = e.id";
        
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
        $sql="DELETE FROM interventor WHERE id = ".$this->getNuId();
        $result = conexion::query($sql);
        return $result;
    }

}

?>