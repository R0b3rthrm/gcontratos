<script src="js/funcion/insert.js"></script>
<br/>
<rigth>
    &nbsp;&nbsp; 
    <a href="funcion" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="funcionList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container ">
    <center>
        <form action="controller/funcion_c.php" method="post"  id="frmFuncion" name = "frmFuncion">

            <h1>REGISTRO DE FUNCION</h1>

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

