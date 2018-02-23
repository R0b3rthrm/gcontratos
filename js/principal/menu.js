$(document).ready(function(){

	

	//Escondemos los submenus cuando el archivo se carga

	$('#menu li ul').hide();

	

	//Cuando el usuario se coloque encima de un elemento del menu

	$('#menu li').hover(

		//funcion hover

		function(){

			

			//escondemos otros menus

			$('#menu li').not($('ul', this)).stop();

			

			//Mostramos el menu que correspondes

			$('ul', this).slideDown('fast');

			

			},

		//funcion out

		function(){

		

			//hide other menus

			$('ul', this).slideUp('fast');

		}

	);

	

	var blSeguir = 1;

	var i;

	var array = {id:blSeguir};



	

	$.post("../../src/principal/menu.php",array, function(data){

		$("#resultMenu").html("");
		$("#resultMenu").append(data['sbHtml']);	

		
/*
		for (i in data){
		$("#"+data[i]).remove();
		}
*/
	 

	},"json");	

	

});