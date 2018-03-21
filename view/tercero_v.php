<script src="js/tercero/insert.js"></script>
<br/>
<rigth>
    &nbsp;&nbsp; 
    <a href="tercero" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="terceroList" class="button special icon fa-search">LISTADO</a>
</rigth>
<CENTER>   

    <h1>REGISTRO DE CONTRATISTA / TERCERO</h1>

    <form action="controller/tercero_c.php" method="post"  id="frmTerceros" name = "frmTerceros">


        <input id="txtProcess" name="txtProcess" value="1" hidden>

        <label id="error">
        </label>

        <div class='6u$ 12u$(xsmall)'>         

        <div class="input-group input-group-sm">
            <span class="input-group-addon" >TERCERO/CONTRATISTA :</span>
            <select id="cmbTTercero" name="cmbTTercero">
                <option value="">- Seleccionar -</option>
                <option value="1">Contratista</option>
                <option value="2">Tercero</option>
            </select>                 
            <span class="input-group-addon" >TIPO PERSONA:</span>
            <select id="cmbTPersona" name="cmbTPersona">
                <option value="">- Seleccionar -</option>
                <option value="1">Juridica</option>
                <option value="2">Natural</option>
            </select>         </div>  

            <br/>

            <div class="input-group input-group-sm">
                 <span class="input-group-addon" >TIPO DOCUMENTO:</span>
                <div class="6u$ 12u$(xsmall)" name="divTDoc"  id="divTDoc"> </div>
                <span class="input-group-addon" >NUMERO DEL DOCUMENTO  :</span>
                <input name="txtId" id="txtId" type="text"  />
                <input name="txtDV" id="txtDV" type="text" placeholder="D. Verificacion"/>
            </div>                

            <br/>

            <div class="input-group input-group-sm">
                <span id="spNom" class="input-group-addon" >NOMBRE :</span>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder=" - Nombre -"/>        
                <span class="input-group-addon" >APELLIDO 1 :</span>
                <input name="txtApellido1" id="txtApellido1" type="text" class="form-control" placeholder=" - Apellido 1 -"/>
            </div>                

            <br/>

            <div class="input-group input-group-sm">
                <span class="input-group-addon" >APELLIDO 2 :</span>
                <input type="text" name="txtApellido2" id="txtApellido2" class="form-control" placeholder=" - Apellido 2 -"/>          
                <span class="input-group-addon" >TELEFONO :</span>
                <input name="txtTel" id="txtTel" type="text" class="form-control" placeholder=" - Telefono -"/>
            </div>
            <br/>
            
            <div class="input-group input-group-sm">

                <span id="spDiv1" class="input-group-addon" >NATURALEZA:</span>
                <div class="6u$ 12u$(xsmall)" name="divNaturaleza"  id="divNaturaleza"> </div>
                <span id="spDiv2" class="input-group-addon" >CLASIFICACION:</span>
                <div class="6u$ 12u$(xsmall)" name="divClasific"  id="divClasific"> </div>
            </div>  

            <br/>

            <div class="input-group input-group-sm">

                <span class="input-group-addon" >CELULAR :</span>
                <input name="txtCel" id="txtCel" type="text" class="form-control" placeholder=" - Celular -"/>
                <span class="input-group-addon" >EMAIL :</span>
                <input name="txtEmail" id="txtEmail" type="text" class="form-control" placeholder=" - Email -"/>
            </div>                

            
            <br/>

            <input type="button" id="btnIngresar" name="btnIngresar" value="REGISTRAR" class="button " />
            <input type="reset" id="btnIngresar" name="btnIngresar" value="LIMPIAR" class="button " />

        </div>

    </form>

</CENTER>

