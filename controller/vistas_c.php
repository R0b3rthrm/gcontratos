<?php 
    require_once ("utils/SessionPhp.php");
    require_once ("model/vistas_m.php");

	class vistas_c extends vistas_m {
		 
        public function getViews_c (){
            
            if(isset($_GET['views'])){     
                 
                $ruta = explode("/",$_GET['views']);
                $result = vistas_m::getViews_m($ruta[0]);
              
            }else{
                $result = "login";
            }
            
            if($result == "login" ){endSession();}
            
            return $result;
        }
		
	}





?>