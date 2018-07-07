<script src="js/pcontrato/insert.js"></script>
<br/>
<!--<rigth>
    &nbsp;&nbsp; 
    <a href="pcontracto" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="pcontractoList" class="button special icon fa-search">LISTADO</a>
</rigth>-->
<div class="container2 ">

    <form action="controller/pcontrato_c.php" method="post"  id="frmPContrato" name = "frmPContrato">

        <input id="txtProcess" name="txtProcess" value="1" hidden>
        <h1 class="text-center">PROCESOS DE CONTRATOS</h1>


        <div class="input-group input-group-sm">

            <span class=" small input-group-addon" >SELECCIONAR CONTRATO :</span>
            <div  name="divContrat"  id="divContrat"> </div>
        </div>

    </form>

     <div id="infoContrat">
     </div>

</div>
