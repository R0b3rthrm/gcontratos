<!DOCTYPE HTML>
<!--
        Faction by Pixelarity
        pixelarity.com | hello@pixelarity.com
        License: pixelarity.com/license
-->

<html>
    <?PHP require_once("core/configGeneral.php"); ?>
    <head>
        <title>Untitled</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="css/datatables.min.css" />
        <link rel="stylesheet" href="css/datepicker.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/chosen.min.css" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="style.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
<!--	<script src="assets/js/jquery.dropotron.min.js"></script>
[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="js/principal/utils.js"></script>
        <script src="js/principal/datepicker.js"></script>
        <script src="js/principal/datatables.min.js"></script>
        <script src="js/principal/moment.min.js"></script>
        <script src="js/principal/chosen.min.js"></script>

    </head>

    <script src="js/principal/bootstrap.min.js.js"></script>	


    <?php
    require_once("controller/vistas_c.php");

    $vistas = new vistas_c ();
    $resultView = $vistas->getViews_c();


    if ($resultView == "login") {

        require_once("includes/login_inc.php");
        require_once("view/login_v.php");
    } else {

        require_once("utils/validarSesion.php");
        require_once("includes/menu_inc.php");
        require_once($resultView);
    }

    echo $resultView;
    ?>


    <!--  </section>-->
</section>

</div>



</body>
</html>