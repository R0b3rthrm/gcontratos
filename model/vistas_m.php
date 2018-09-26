<?php

class vistas_m {

    public function getViews_m($views) {

        $listWhite = array("login", "inicio", "usuario", "usuarioList", "usuarioUpdate","depend", "dependList", "dependUpdate","tLiquid", "tLiquidList", "tLiquidUpdate",            
            "tRecurs", "tRecursList", "tRecursUpdate","tClasific","tClasificList","tClasificUpdate","tNoved","tNovedList","tNovedUpdate","tAvance","tAvanceList","tAvanceUpdate",
            "tTermin", "tTerminList", "tTerminUpdate","tContratist", "tContratistList", "tContratistUpdate","tIntervt", "tIntervtList", "tIntervtUpdate",
            "tPoliza", "tPolizaList", "tPolizaUpdate","tGasto", "tGastoList", "tGastoUpdate","tContrat", "tContratList", "tContratUpdate","funcion", "funcionList", "funcionUpdate",
            "causal", "causalList", "causalUpdate","mSelecc", "mSeleccList", "mSeleccUpdate", "contrato", "contratoList", "contratoUpdate", "tercero", "terceroList", "terceroUpdate", "pcontrato", "pcontratoList", "pcontratoUpdate", "proyect", "proyectList", "proyectUpdate"
            );

        if (in_array($views, $listWhite)) {

            if (is_file("view/" . $views . "_v.php")) {

                $result = "view/" . $views . "_v.php";
            } else {

                $result = 'login';
            }
        } elseif ($views == 'login') {
            $result = 'login';
        } elseif ($views == 'index') {
            $result = 'login';
        } else {
            $result = 'login';
        }

        return $result;
    }

}

?>