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
        date_default_timezone_set("America/Bogota");
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

//FUNCION PARA QUITAR CARACTERES ESPECIALES

function daleteSymbol($string) {

    $string = trim($string);

    $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), 
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
    );

    $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), 
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
    );

    $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), 
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
    );

    $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
    );

    $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), 
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
    );

    $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'), 
            array('n', 'N', 'c', 'C',), $string
    );

    $string = str_replace(
            array("\\", "¨", "º", "-", "~",
        "#", "@", "|", "!", "\"",
        "·", "$", "%", "&", "/",
        "(", ")", "?", "'", "¡",
        "¿", "[", "^", "<code>", "]",
        "+", "}", "{", "¨", "´",
        ">", "< ", " "), ' ', $string
    );
    return $string;
}

?>