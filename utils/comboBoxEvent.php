<?php
	//Código para incluir las librerias	
	include_once("../src/principal/conexion.php");		
	
	//Recuperación de variables
	$sql = $_POST['sql'];
	$id = $_POST['id'];
	$valor = $_POST['valor'];
	$evento = $_POST['evento'];
	$funcion = $_POST['funcion'];
	$sbHtml="";
	
	//Conexión con la base datos
	$conexion=crearConexion();

	//Ejecución de la consulta
	//$respuesta=consultas($sql);
	$respuesta=query($conexion,$sql);	 

 	//obtiene respuesta
	$sbHtml="<select name='$id' id='$id' ".$evento."='$funcion'>
				<option value=''>Seleccionar</option>";
				
	
   while($row=mysqli_fetch_array($respuesta))
			    {
			   	$sbHtml.="<option ";
				 
				 if($row[0]==$valor){$sbHtml.="selected"; } 
				
				$sbHtml.=" value=$row[0]>";
				$sbHtml.= $row[1];
				if(isset($row[2])){$sbHtml.= " - ".$row[2];}
				if(isset($row[3])){$sbHtml.= " - ".$row[3];}
				if(isset($row[4])){$sbHtml.= " - ".$row[4];}
				if(isset($row[5])){$sbHtml.= " - ".$row[5];}
				if(isset($row[6])){$sbHtml.= " - ".$row[6];}
				$sbHtml.="</option>";
			   }
			   
			    $sbHtml.='</select>';
		
		 mysqli_free_result($respuesta);

				
     //Función para desconectarse de la base de datos
	desconectarse($conexion);//cierra la conexion

	echo json_encode($sbHtml);

?>