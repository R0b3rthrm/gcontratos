<script src="js/tercero/list.js"></script>
<br/>
<rigth>
    &nbsp;&nbsp; 
    <a href="tercero" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="terceroList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container2 ">
    <center>
        <form action="controller/tercero_c.php" name="frmTerceroList" id= "frmTerceroList" >



            <input id="txtProcess" name="txtProcess" value="4" hidden>
            <h1>LISTADO DE TERCEROS</h1>


            <table id="tableList" name="tableList" align="center">
                <thead>
                    <tr>	
                        <TH> <label>#</label></TH>
                        <TH> <label>TIPO TERCERO</label></TH>
                        <TH> <label>TIPO DOCUMENTOIDE</label></TH>
                        <TH> <label>IDENTIFICACION</label></TH>
                        <TH> <label>NOMBRE / RAZON SOCIAL</label></TH>
                        <TH> <label>TIPO CONTRATISTA</label></TH>
                        <TH> <label>CLASIFICACION CONTRATISTA</label></TH>
                        <TH> <label>ESTADO</label></TH>
                        <TH> <label>EDITAR</label></TH>

                    </tr>             
                </thead>
                <tbody id="resultado">
                </tbody>
            </table>	


        </form>
    </center>

</div>
