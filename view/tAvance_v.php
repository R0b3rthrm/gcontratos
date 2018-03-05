<script src="js/tAvance/insert.js"></script>
<br/>
<rigth>
    &nbsp;&nbsp; 
    <a href="tAvance" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="tAvanceList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container ">
    <center>
        <form action="controller/tAvance_c.php" method="post"  id="frmTAvance" name = "frmTAvance">

            <h1>REGISTRO TIPO DE AVANCE</h1>

            <input id="txtProcess" name="txtProcess" value="1" hidden>

            <label id="error">
            </label>

            <div class='6u$ 12u$(xsmall)'>         



                <div class="input-group input-group-sm">
                    <span class="input-group-addon" >CODIGO :</span>
                    <input type="text" name="txtCod" id="txtCod" class="form-control" placeholder=" - Codigo -"/>        
                </div>                

                <br> 
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

