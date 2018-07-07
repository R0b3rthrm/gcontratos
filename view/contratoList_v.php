<script src="js/contrato/list.js"></script>
<br/>
<rigth>
     &nbsp;&nbsp; 
    <a href="contrato" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="contratoList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container2">
    <center>
        <form action="controller/contrato_c.php" method="post"  id="frmContrato" name = "frmContrato">

            <input id="txtProcess" name="txtProcess" value="3" hidden>
            <h1>LISTADO DE CONTRATOS</h1>

            <table id="tableList" name="tableList" align="center">
                <thead>
                    <tr>	
                        <TH> <label>#</label></TH>
                        <TH> <label>DEPENDENCIA</label></TH>
                        <TH> <label>SECCION</label></TH>
                        <TH> <label>T. CONTRATO</label></TH>
                        <TH> <label>CONTRATISTA</label></TH>
                        <TH> <label>No CONTRATO</label></TH>
                        <TH> <label>F. INICIO</label></TH>
                        <TH> <label>VALOR INICIAL</label></TH>
                        <TH> <label>EDITAR</label></TH>

                    </tr>             
                </thead>
                <tbody id="resultado">
                </tbody>
            </table>	


        </form>
    </center>

</div>
