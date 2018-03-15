<script src="js/contracto/list.js"></script>
<br/>
<rigth>
     &nbsp;&nbsp; 
    <a href="causal" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="causalList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container ">
    <center>
        <form action="controller/contracto_c.php" method="post"  id="frmContracto" name = "frmContracto">

            <input id="txtProcess" name="txtProcess" value="2" hidden>
            <h1>LISTADO DE CONTRACTOS</h1>

            <table id="tableList" name="tableList" align="center">
                <thead>
                    <tr>	
                        <TH> <label>#</label></TH>
                        <TH> <label>No CONTRACTO</label></TH>
                        <TH> <label>DEPENDENCIA</label></TH>
                        <TH> <label>T. CONTRACTO</label></TH>
                        <TH> <label>VALOR INICIAL</label></TH>
                        <TH> <label>F. INICIO</label></TH>
                        <TH> <label>F. TERMINACION</label></TH>
                        <TH> <label>EDITAR</label></TH>

                    </tr>             
                </thead>
                <tbody id="resultado">
                </tbody>
            </table>	


        </form>
    </center>

</div>
