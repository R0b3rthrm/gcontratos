<script src="js/mSelecc/list.js"></script>
<br/>
<rigth>
     &nbsp;&nbsp; 
    <a href="mSelecc" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="mSeleccList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container ">
    <center>
        <form action="controller/mSelecc_c.php" method="post"  id="frmMSelecc" name = "frmMSelecc">

            <input id="txtProcess" name="txtProcess" value="2" hidden>
            <h1>LISTADO MODALIDAD DE SELECCION </h1>

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
