<script src="js/pcontracto/insert.js"></script>
<br/>
<rigth>
    &nbsp;&nbsp; 
    <a href="pcontracto" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="pcontractoList" class="button special icon fa-search">LISTADO</a>
</rigth>
<div class="container2 ">

    <form action="controller/pcontracto_c.php" method="post"  id="frmPContracto" name = "frmPContracto">

        <input id="txtProcess" name="txtProcess" value="1" hidden>
        <h1 class="text-center">PROCESOS DE CONTRACTOS</h1>


        <div class="input-group input-group-sm">

            <span class=" small input-group-addon" >SELECCIONAR CONTRACTO :</span>
            <div  name="divContract"  id="divContract"> </div>
        </div>

    </form>

     <div id="infoContract">
     </div>

</div>
