<script src="js/usuario/list.js"></script>
<br/>
<rigth>
    &nbsp;&nbsp; 
    <a href="usuario" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="usuarioList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container ">
    <center>
        <form action="controller/usuario_c.php" name="frmUsuarioList" id= "frmUsuarioList" >



            <input id="txtProcess" name="txtProcess" value="2" hidden>
            <h1>LISTADO DE USUARIOS</h1>


            <table id="tableList" name="tableList" align="center">
                <thead>
                    <tr>	
                        <TH> <label>#</label></TH>
                        <TH> <label>IDENTIFICACION</label></TH>
                        <TH> <label>NOMBRE</label></TH>
                        <TH> <label>APELLIDOS</label></TH>
                        <TH> <label>USUARIO</label></TH>
                        <TH> <label>PERFIL</label></TH>
                        <TH> <label>ESTADO</label></TH>
                        <TH> <label>RESET PASS</label></TH>
                        <TH> <label>EDITAR</label></TH>

                    </tr>             
                </thead>
                <tbody id="resultado">
                </tbody>
            </table>	


        </form>
    </center>

</div>
