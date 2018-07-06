$(document).ready(function () {

    var tercero_id = returnIdUrl(window.location.href);
    var id = tercero_id[0].split("-");
    
    if(id[1]==2){id[1]=20;}
    if(id[1]==3){id[1]=30;}
    
    var array = {txtProcess: id[1],txtUpdate:id[0]};

    $.ajax({
        url: "controller/tercero_c.php",
        type: 'POST',
        data: array,
        success: function (data) {
            
            alert(data);
            
            $("#divUpdate").html("");
            $("#divUpdate").append(data);

        }
    });


});
