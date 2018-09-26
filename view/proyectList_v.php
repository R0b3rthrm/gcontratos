<script src="js/proyect/list.js"></script>
<br/>
<rigth>
    &nbsp;&nbsp; 
<a href="proyect" class="button special icon fa-download">NUEVO REGISTRO</a>
<a href="proyectList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container ">
    <center>
    <form action="controller/proyect_c.php" method="post"  id="frmProyect" name = "frmProyect">



            <input id="txtProcess" name="txtProcess" value="2" hidden>
            <h1>LISTADO DE PROYECTOS</h1>


            <table id="tableList" name="tableList" align="center">
                <thead>
                    <tr>	
                        <TH> <label>#</label></TH>
                        <TH> <label>ID</label></TH>
                        <TH> <label>CODIGO</label></TH>
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
