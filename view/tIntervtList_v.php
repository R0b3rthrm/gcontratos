<script src="js/tIntervt/list.js"></script>
<br/>
<rigth>
     &nbsp;&nbsp; 
    <a href="tIntervt" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="tIntervtList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container ">
    <center>
        <form action="controller/tIntervt_c.php" method="post"  id="frmTIntervt" name = "frmTIntervt">

            <input id="txtProcess" name="txtProcess" value="2" hidden>
            <h1>LISTADO TIPO DE INTERVENTOR</h1>

            <table id="tableList" name="tableList" align="center">
                <thead>
                    <tr>	
                        <TH> <label>#</label></TH>
                        <TH> <label>ID</label></TH>
                        <TH> <label>CODIGO</label></TH>
                        <TH> <label>NOMBRE</label></TH>
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
