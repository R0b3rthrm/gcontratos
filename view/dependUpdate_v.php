<script src="js/depend/update.js"></script>
<br/>
<rigth>
&nbsp;&nbsp; 
<a href="depend" class="button special icon fa-download">NUEVO REGISTRO</a>
<a href="dependList" class="button special icon fa-search">LISTADO</a>
</rigth>
<CENTER>   
    
    <h1>ACTUALIZAR LA DEPENDENCIA <h2 id='lblId'></h2></h1>

    <form action="controller/depend_c.php" method="post"  id="frmDepend" name = "frmDepend">
    
        
        <input id="txtProcess" name="txtProcess" value="3" hidden>

        <label id="error">
        </label>
        
        <div class='6u$ 12u$(xsmall)'>         
            
                <input name="txtIdDepend" id="txtIdDepend" type="text" hidden/>
            
         <br/>
                  
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >NOMBRE :</span>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder=" - Nombre -"/>        
            </div>                
            
         <br/>
                  
           
            <div class="input-group input-group-sm">
            
            
             <span class="input-group-addon" >ESTADO :</span>
             <div class="6u$ 12u$(xsmall)" name="divEstado"  id="divEstado"> </div>
 
         </div>
        
        <br/>
        
        <input type="button" id="btnIngresar" name="btnIngresar" value="REGISTRAR" class="button " />
        <input type="reset" id="btnIngresar" name="btnIngresar" value="LIMPIAR" class="button " />
    
     </div>
    
    </form>
    							
</CENTER>

