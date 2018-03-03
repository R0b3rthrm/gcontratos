<script src="js/t_liquid/list.js"></script>
<br/>
<rigth>
    &nbsp;&nbsp; 
<a href="t_liquid" class="button special icon fa-download">NUEVO REGISTRO</a>
<a href="t_liquidList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container ">
    <center>
    <form action="controller/t_liquid_c.php" method="post"  id="frmTLiquid" name = "frmTLiquid">

            <input id="txtProcess" name="txtProcess" value="2" hidden>
            <h1>LISTADO DE DEPENDENCIAS</h1>


            <table id="tableList" name="tableList" align="center">
                <thead>
                    <tr>	
                        <TH> <label>#</label></TH>
                        <TH> <label>ID</label></TH>
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
