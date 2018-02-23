<?php

class conexion{ 

 private $conexion="";
 public  $servidor="localhost";
 public  $user="root"; 
 public  $pass=""; 
 private  $bd="gcontratos";

	protected function conectar(){
	
		$this->conexion = mysqli_connect($this->servidor, $this->user, $this->pass, $this->bd ); 
	 
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else
		{
		mysqli_set_charset($this->conexion,"utf8");		
		}
		
	
	}

	protected function desconectar(){

            mysqli_close($this->conexion);
	}	
	

	protected function query($sql){
	
		$respuesta=mysqli_query($this->conexion,$sql);
		return $respuesta;
		
	}
	


}

?>