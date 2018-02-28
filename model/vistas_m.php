<?php 

	class vistas_m{
		
        public function getViews_m($views){
              
            $listWhite= array("login","inicio","usuario","usuarioList");
          
             if(in_array($views, $listWhite)){
            
            
                if(is_file("view/".$views."_v.php")){
                    
                   $result= "view/".$views."_v.php";
                    
                }else{
                    
                    $result= 'login';
                }
            
            }elseif($views == 'login'){
                    $result= 'login';
            }elseif($views == 'index'){
                    $result= 'login';
            }else{
                    $result= 'login';
            }
                                
            return $result;
        } 
		
	}


?>