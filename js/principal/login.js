$(document).ready(function () {
    /**
     * @author ROBERTH ROJAS
     */

    $("#btnIngresar").click(function () {

        //realizo validaciones
        blValido = validadciones();

        if (blValido) {

            //traigo info de las variables
            var sbLogin = $("#txtLogin").val();/*!< sbLogin me trae la informacino del login*/
            var sbClave = $("#txtPass").val();/*!< sbClave la contrase�a del usuario */


            //Valido info de las variables y agrego una clase
            var array = {txtLogin: sbLogin, txtPass: sbClave};


            $.ajax({

                url: "controller/login_c.php",
                type: 'POST',
                data: array,
                success: function (data) {

                    if (data) {

                        msjModal("BIENVENIDO AL SISTEMA", 'OK');
                        setTimeout(function () {
                            location.href = "inicio";
                        }, 1000);

                    } else {

                        msjModal("Usuario No Valido", 'ER');
                    }


                }

            });

        }
    });




});

//iniciio la funcion para validar campos
function validadciones() {

    var sbLogin = $("#txtLogin").val();

    var sbClave = $("#txtPass").val();

    if (sbLogin == '') {

        msjModal("Ingresar Login", 'AT');
        $("#txtLogin").focus();
        return false;
    }

    if (sbClave == '') {

        msjModal("Ingresar Password", 'AT');
        $("#txtPass").focus();
        return false;
    }

    return true;

}
;