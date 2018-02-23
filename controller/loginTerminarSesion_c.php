<?php
 include_once ("../../utils/SessionPhp.php");
 endSession();
 
  $sbCadena =  "<script language='javascript'>";
  $sbCadena .= "location.href = ''";
  $sbCadena .= "</script>";
  echo $sbCadena;  	
?>		
