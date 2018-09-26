<script src="js/proyect/update.js"></script>
<br/>
<rigth>
&nbsp;&nbsp; 
<a href="proyect" class="button special icon fa-download">NUEVO REGISTRO</a>
<a href="proyectList" class="button special icon fa-search">LISTADO</a>
</rigth>
<CENTER>   
    
    <h1>ACTUALIZAR EL PROYECTO <h2 id='lblId'></h2></h1>

    <form action="controller/proyect_c.php" method="post"  id="frmProyect" name = "frmProyect">
    
        
        <input id="txtProcess" name="txtProcess" value="3" hidden>

        <label id="error">
        </label>
        
        <div class='6u$ 12u$(xsmall)'>         
            
                <input name="txtIdP" id="txtIdP" type="text" hidden/>
            
         <br/>
                  
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >CODIGO :</span>
                <input type="text" name="txtCod" id="txtCod" class="form-control" placeholder=" "/>        
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

