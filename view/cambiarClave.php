<?php include("../../includes/frm/top_page.php"); ?>
<?php include("../../includes/frm/header.php"); ?>
<?php include("../../includes/frm/menu.php"); ?>

<script src="../../js/principal/clave.js"></script>

<section class="main">
<section>
										<center>
<form action="../../src/principal/cambiarClave.php" name="frmCambiarClave" id="frmCambiarClave" >
	  <center><b><h2>CAMBIAR CLAVE</b></center></h2><br>
		
		
			<div class="6u$ 12u$(xsmall)">

			  <input name="txtClaveAntigua" type="password" id="txtClaveAntigua" placeholder="PASSWORD ACTUAL"  ><br>
 	  	    	  	     
			  <input name="txtClaveNueva" type="password" id="txtClaveNueva"   placeholder="NUEVOV PASSWORD " ><br>
 	  	    
 	  	      <input name="txtConfirmarClave" type="password" id="txtConfirmarClave"  placeholder="CONFIRMAR PASSWORD" >
 	  	    
			</div>
	
		<center>
		<br>
	
	 <input type="submit" name="btnIngresar" value="CAMBIAR PASSWORD">
	</form>
										
								
</section>
					</section>
		
<?php include("../../includes/frm/footer.php"); ?>