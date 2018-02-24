<?php
function quitarAcentos ($sbNombre){

	$quitar = array	('á','é','í','ó','ú','ñ','Á','É','Í','Ó','Ú','Ñ');
	$poner = array	('a','e','i','o','u','n','A','E','I','O','U','N');
	
	$sbNombreFinal = str_replace($quitar , $poner, $sbNombre);
 	
	return $sbNombreFinal;
} 

function cambiarTipoDocumento ($sbTipo){
 	if($sbTipo=="xlsx"){$sbTipo="xls";}
	if($sbTipo=="docx"){$sbTipo="doc";}
	return $sbTipo;
} 

function getFechaHoraActual (){
	$dtFecha=date('Y-m-d H:i:s');
	return $dtFecha;
}
 
function getFechaActual (){
 	date_default_timezone_set("America/Bogota");
	$dtFecha=date('Y-m-d');
	return $dtFecha;
}
 
function getHoraActual (){
	date_default_timezone_set("America/Bogota");
	$dtTime=date('H:i:s');
	return $dtTime;	
}

function calcularConsecutivo($sbNomConsecutivo){
	//Conexión con la base datos
	$conexion=crearConexion();

	//Consecutivo 
	$sqlConsecutivo="select * from  consecutivos";
	$resultConsecutivo=query($conexion,$sqlConsecutivo);
    
	//llamo el el consecutivo 
	$sbYear =date("Y");
	$Date = date("Y");
	$nuDate=(int)$Date;
	$nuConsecutivo=0;
	$sbConsecutivo="";
	 
	//Calcular Consecutivo	 
	while($row=mysqli_fetch_array($resultConsecutivo)){ 
				
		$nufecha=(int)$row[1];
			
		if($nuDate>$nufecha  && $row[0]==$sbNomConsecutivo){
						   
			$sqlConsecutivo = "insert into consecutivos values ('$sbNomConsecutivo','$nuDate',0) ";
	              $InsertarConsecutivo=query($conexion,$sqlConsecutivo);
			$sbYear=substr($sbYear, -2);
			
		}else{				 
			
			if($Date==$row[1] && $row[0]== $sbNomConsecutivo){
			$sbYear=substr($sbYear, -2);
			$nuConsecutivo=$row[2]+1;
			}

		}//fin del else
	}//fin del while
	
	//libera memoria	
	mysqli_free_result ($resultConsecutivo);
				
	//$sbConsecutivo= (string) $nuConsecutivo;
	if(strlen($nuConsecutivo)==1){$sbConsecutivo="00".$nuConsecutivo;}
	if(strlen($nuConsecutivo)==2){$sbConsecutivo="0".$nuConsecutivo;}
	if(strlen($nuConsecutivo)>=3){$sbConsecutivo="".$nuConsecutivo;}

	$nomRecepcion = $sbNomConsecutivo."-".$sbConsecutivo."-".$sbYear;

	/*Función para desconectarse de la base de datos*/
	desconectarse($conexion);//cierra la conexion
  
	return $nomRecepcion;
	  
}//fin de la funcion de calcular radicado

//funcion para cambiar formato fecha
function cambiarFormatoFecha($fecha){
	list($anio,$mes,$dia)=explode("-",$fecha);
	return $dia."-".$mes."-".$anio;
} 	

//funcion para restar fechas		
function calcularFechas($dFecIni, $dFecFin){
	
	$dFecIni=str_replace("-","",$dFecIni);
	$dFecIni=str_replace("/","",$dFecIni);
	$dFecFin=str_replace("-","",$dFecFin);
	$dFecFin=str_replace("/","",$dFecFin);

	preg_match( '/'."([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})".'/', $dFecIni, $aFecIni);
	preg_match( '/'."([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})".'/', $dFecFin, $aFecFin);

	$date1=mktime(0,0,0,$aFecIni[2], $aFecIni[1], $aFecIni[3]);
	$date2=mktime(0,0,0,$aFecFin[2], $aFecFin[1], $aFecFin[3]);

	return round(($date2 - $date1) / (60 * 60 * 24));
}


//funcion que apartir de la cedula devuelte informacion de puesto de votacion
function obtenerDatosPuesto($sbCedula){

	
	$url = 'https://wsp.registraduria.gov.co/censo/_censoResultado.php?nCedula='.$sbCedula.'&nCedulaH=&x=39&y=16';
	      //  $url = 'https://wsp.registraduria.gov.co/censo/_censoResultado.php?nCedula=14837625';
	
	$html = file_get_contents($url);
	
	$doc = new DOMDocument();
	@$doc->loadHTML($html);

	$trs = $doc->getElementsByTagName('tr');
	
	$nuCounter = 1;
	
	$arrayData = array(
		"Departamento"=>"",
		"Municipio"=>"",
		"Puesto"=>"",
		"Direccion"=>"",
		"Inscripcion"=>"",
		"Mesa"=>""
	);
	
	foreach ($trs as $tr) {	
		
		
		switch($nuCounter){
			case 1: 				
				$strTmp = str_replace("Departamento:", "", $tr->nodeValue);
				$arrayData["Departamento"] = $strTmp;
				break;	
			case 2:			
				$strTmp = str_replace("Municipio:", "", $tr->nodeValue);
				$arrayData["Municipio"] = $strTmp;
				break;			
			case 3:			
				$strTmp = str_replace("Puesto:", "", $tr->nodeValue);
				$arrayData["Puesto"] = $strTmp;
			break;			
			case 4:			
				$strTmp = str_replace("Dirección Puesto:", "", $tr->nodeValue);
				$arrayData["Direccion"] = $strTmp;
			break;			
			case 5:
				$strTmp = str_replace("Fecha de inscripción:", "", $tr->nodeValue);
				$arrayData["Inscripcion"] = $strTmp;
			break;
			case 6:
				$strTmp = str_replace("Mesa", "", $tr->nodeValue);
				$arrayData["Mesa"] = $strTmp;
			break;
		
		}
		
		$nuCounter++;
	}
	
	
 
	 
	//**********************************************************************************************
	//inserta en la base de datos la informacion de los puestos de acuerdo a cada cedula
	 
	 $i=0;
	 foreach ($arrayData as $clave =>$valor) {
		
		if( $i == 0 ){
			 $sbDepartamento	= trim($arrayData["Departamento"]);
			 $sbMunicipio		= trim($arrayData["Municipio"]);
			 $sbPuesto 			= trim($arrayData["Puesto"]);
			 $sbDireccion 		= trim($arrayData["Direccion"]);
			 $sbInscripcion		= trim($arrayData["Inscripcion"]);
			 $sbMesa 			= trim($arrayData["Mesa"]);
			 //echo "<br>";
			 //echo "dpto: ".$sbDepartamento." Muni: ".$sbMunicipio." Puesto: ".$sbPuesto." Dir: ".$sbDireccion." Inscri: ".$sbInscripcion." Mesa: ".$sbMesa; 
			 $i++;
		}
	 }
	
}//fin de funcion obtenerDatosPuesto


?>