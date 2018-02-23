<script src="js/usuario/insert.js"></script>
<CENTER>   

  
    <p class="text-left"><h1>REGISTRO DE USUARIO</h1></p>

    <form action="controller/usuario_c.php" method="post"  id="frmUsuario" name = "frmUsuario">
    
               
 
        <div class='6u$ 12u$(xsmall)'>         
            
            <div class="input-group">
                <span class="input-group-addon" >IDENTIFICACION :</span>
                <input name="txtId" id="txtId" type="text"  placeholder=" - Identificacion -"/>
            </div>                
            
         <br/>
                  
            <div class="input-group">
                <span class="input-group-addon" >NOMBRE :</span>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder=" - Nombre -"/>        
                <span class="input-group-addon" >APELLIDO 1 :</span>
                <input name="txtApellido1" id="txtApellido1" type="text" class="form-control" placeholder=" - Apellido 1 -"/>
            </div>                
            
         <br/>
                  
            <div class="input-group">
                <span class="input-group-addon" >APELLIDO 2 :</span>
                <input type="password" name="txtPass" id="txtPass" class="form-control" placeholder=" - Apellido 2 -"/>          
                <span class="input-group-addon" >TELEFONO :</span>
                <input name="txtTel" id="txtTel" type="text" class="form-control" placeholder=" - Telefono -"/>
            </div>                
            
         <br/>
         
             <div class="input-group">
             
                 <span class="input-group-addon" >CELULAR :</span>
                <input name="txtCel" id="txtCel" type="text" class="form-control" placeholder=" - Celular -"/>
                <span class="input-group-addon" >EMAIL :</span>
                <input name="txtEmail" id="txtEmail" type="text" class="form-control" placeholder=" - Email -"/>
            </div>                
                    
            <hr />
            <h3>Datos Inicio Sesion</h3>
            <hr />
            
            <div class="input-group">
                <span class="input-group-addon" >USUARIO LOGIN :</span>
                <input name="txtLogin" id="txtLogin" type="text" class="form-control" placeholder=" - Usuario -"/>
            </div>                
            <br/>
       
          <div class="input-group">
            
             <span class="input-group-addon" >PERFIL :</span>
             <div class="6u$ 12u$(xsmall)" name="divPerfil"  id="divPerfil"> </div>
            
             <span class="input-group-addon" >ESTADO :</span>
             <div class="6u$ 12u$(xsmall)" name="divEstado"  id="divEstado"> </div>
 
         </div>
        
        <br/>
        
        <input type="button" id="btnIngresar" name="btnIngresar" value="REGISTRAR" class="button special" />
        <input type="reset" id="btnIngresar" name="btnIngresar" value="LIMPIAR" class="button special" />
    
     </div>
    
    </form>
    							
</CENTER>

