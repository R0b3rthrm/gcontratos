
function isEmptyFields(array) {

    //Valido informacion que viene en un array
    blValidate = true;
    var arrInfo = "";

    var x;
    for (x in array) {
        arrInfo = array[x].split("|");
        //alert("ESTE ES VAL  =>"+arrInfo[0] );
        if (arrInfo[0] != "undefined") {
            if (arrInfo[0] == "") {
                event.preventDefault();
                $(arrInfo[1]).addClass("validate");
            } else {
                $(arrInfo[1]).removeClass("validate");
            }
        }
    }
    for (x in array) {

        arrInfo = array[x].split("|");
        if (arrInfo[0] == "") {
            msjModal("Este Campo Es Obligatorio",'AT',arrInfo[1]);
            $(arrInfo[1]).focus();
            blValidate = false;
            break;
        }
    }

    return blValidate;
}

function reset(frm) {
    $(frm).each(function () {
        this.reset();
    });
}

function noCopyPaste(arr = []) {
    for (x in arr) {
        $(arr[x]).bind("cut copy paste", function (e) {
            e.preventDefault();
            alert('EN ESTE CAMPO NO SE PERMITE COPIAR-PEGAR-CORTAR');
        });
    }

}

function comboBox(x, y, z, div, event='', func='', clas = '') {


    var array = {proceso: 1, sql: x, id: y, valor: z, event:event, func:func,classs: clas};

    $.ajax({
        url: "controller/utils_c.php",
        type: 'POST',
        data: array,
        success: function (data) {

            $(div).html("");
            $(div).append(data);
        }
    });

    //return false;

}

function returnIdUrl(url) {



    var src = String(url).split('?')[1];

    var vrs = src.split('&');

    var arr = [];



    for (var x = 0, c = vrs.length; x < c; x++)

    {

        arr[x] = vrs [x].split('=')[1];

    }
    ;

    return arr;

}


function alfNumPG(arr = []) {

    for (x in arr) {
        $(arr[x]).keypress(function (tecla) {
            if (!((tecla.charCode > 47 && tecla.charCode < 58) ||
                    (tecla.charCode > 64 && tecla.charCode < 91) ||
                    (tecla.charCode > 96 && tecla.charCode < 123) ||
                    tecla.charCode == 46 || tecla.charCode == 95
                    ))
                return false;
        });
}
}

function alfNumPE(arr = []) {

    for (x in arr) {
        $(arr[x]).keypress(function (tecla) {
            if (!((tecla.charCode > 47 && tecla.charCode < 58) ||
                    (tecla.charCode > 64 && tecla.charCode < 91) ||
                    (tecla.charCode > 96 && tecla.charCode < 123) ||
                    tecla.charCode == 46 || tecla.charCode == 32
                    ))
                return false;
        });
}
}

function alfNum(arr = []) {

    for (x in arr) {
        $(arr[x]).keypress(function (tecla) {
            if (!((tecla.charCode > 43 && tecla.charCode < 60) ||
                    (tecla.charCode > 64 && tecla.charCode < 91) ||
                    (tecla.charCode > 96 && tecla.charCode < 123) ||
                    tecla.charCode == 32 || tecla.charCode == 95

                    ))
                return false;
        });
}
}

function isNumber(arr = []) {

    for (x in arr) {
        $(arr[x]).keypress(function (tecla) {
            if (!((tecla.charCode > 47 && tecla.charCode < 58) ||
                    tecla.charCode == 46

                    ))
                return false;
        });
}
}

function difDate(dtIni, dtFin) {
    d = 0;
    dtIni = moment($('#dtInicio').val());
    dtFin = moment($('#dtTerminacion').val());
    d = dtFin.diff(dtIni, 'days');
    return d
}

function noChar(arr = []) {

    for (x in arr) {
        $(arr[x]).keypress(function (tecla) {
            return false;
        });
}
}

function minChar(arr = [], num = 0) {

    blValidate = true;

    for (x in arr) {
        //Almacenamos los valores
        nombre = $(arr[x]).val();

        //Comprobamos la longitud de caracteres
        if (!nombre.length > num) {
            alert("SON MINIMO " + num + " CARACTERES EN ESTE CAMPO");
            $(arr[x]).focus();
            blValidate = false;
            break;
        }
    }

    return blValidate;
}

function maxChar(arr = [], n = 999999999) {
    for (x in arr) {
        $(arr[x]).attr("maxlength", n);
}
}


function msjModal(_text,_title = '',_focus=''){
    
    if(_title=='OK'){_title='¡EXITOSO!';_type='blue';
    }else if(_title=='ER'){_title='¡ERROR!';_type='red';
    }else if(_title=='AT'){_title='¡ATENCIÓN!';_type='orange';
    }else {_title='';_type=''; }
    
    if(_focus!=''){
        var options={title: _title,content: _text, type:_type,  buttons:{OK: function () {$(_focus).focus();}}}
    }else{
        var options={title: _title,content: _text, type:_type}
    }
     $.alert(options);
}

function validFiletype(info) {



    var blFileType = false;



    //obtenemos un array con los datos del archivo

    var file = $(info)[0].files[0];

    //obtenemos el nombre del archivo

    var fileName = file.name;

    //obtenemos la extensi�n del archivo

    var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);



    //valido las extenciones

    if (fileExtension.toLowerCase() == "doc" || fileExtension.toLowerCase() == "docx" ||
            fileExtension.toLowerCase() == "xls" || fileExtension.toLowerCase() == "xlsx" ||
            fileExtension.toLowerCase() == "pdf") {
        blFileType = true;
    }



    return blFileType;



}

