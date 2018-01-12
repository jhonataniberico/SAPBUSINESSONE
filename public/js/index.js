$(document).ready(function() {
	$('#principal').fullpage({
		autoScrolling: false,
		fitToSection: false,
		interlockedSlides: false,
		touchSensitivity: 5000
	});
});

function solicitarEstimacion() {
	var nombre_completo = $('#nombre_completo').val();
	var empresa  		= $('#empresa').val();
	var email 	 		= $('#email').val();
	var pais 	 		= $('#pais').val();
	var cargo 	 		= $('#cargo').val();
	var telefono 		= $('#telefono').val();
	var relacion		= $('#relacion').val();
	var c_email    		= $('#c-email').is(':checked');
	var c_telefono    	= $('#c-telefono').is(':checked');
	var c_ambos    		= $('#c-ambos').is(':checked');
	var terminos		= $('#checkbox-1').is(':checked');
	var contacto		= null;

	if(terminos == false) {
		//HACER UNA ACCIÓN QUE INDIQUE QUE LLENE LOS TÉRMINOS
		return;
	}
	if(c_email == true) {
		contacto = 1;
	}else if(c_telefono == true) {
		contacto = 2;
	}else if(c_ambos == true) {
		contacto = 3;
	}
	if(nombre_completo == null || nombre_completo == '') {
		return;
	}
	if(empresa == null || empresa == '') {
		return;
	}
	if(email == null || email == '') {
		return;
	}
	if (!validateEmail(email)) {
		$('#email').css('border-color','red');
		return;
	}
	if(pais == null || pais == '') {
		return;
	}
	if(cargo == null || cargo == '') {
		return;
	}
	if(telefono == null || telefono == '') {
		return;
	}
	if(contacto == false) {
		  return;
	}
	$.ajax({
		data  : { nombre_completo : nombre_completo,
				  empresa 	      : empresa,
				  email 		  : email,
				  pais 			  : pais,
				  cargo 		  : cargo,
				  telefono 		  : telefono,
				  relacion 		  : relacion,
				  contacto 		  : contacto},
		url   : 'es/solicitarEstimacion',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}

function soloLetras(e) {
    key 	   = e.keyCode || e.which;
    tecla 	   = String.fromCharCode(key).toLowerCase();
    letras     = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }
     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }

 function valida(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta números
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

//DETECT DEVICE FOR MOBILE
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

var global_datos = null;
var datos_array = [];
function guardarDatos(id,datos) {
	var buttonSelect = $('#'+id+'.select-one');
	var buttonToggle = $('#'+id+'.select-prioridad');
	var cardSelect   = $('#'+id+'.select-one').parent().find('.contenido');
	var cardToggle   = $('#'+id+'.select-prioridad').parent().find('.contenido');
	global_datos     = datos;	
	$('.contenido').removeClass('aparecer');
	$('.content-card').find('.select-one').removeClass('button-select');
	buttonSelect.addClass('button-select');
	cardSelect.addClass('aparecer');
	buttonToggle.toggleClass("button-select");
    buttonToggle.click(function() {
    	cardToggle.toggleClass("aparecer");
	});
    if( isMobile.any() ) {
    	var modal   = $('#ModalQuestion');
	    var card    = buttonSelect.closest('.mdl-card-question');
	    var img     = card.find('.contenido-left').find('img');
	    var content = card.find('.contenido-right').find('p');
	    var small   = card.find('.contenido-right').find('small');
	    modal.find('.mdl-card__title').find('img').attr({
	        "alt"   : img.attr('alt'),
	        "src"   : img.attr('src')
	    });
	    modal.find('.mdl-card__supporting-text').find('p').text(content[0].innerText);
	    modal.find('.mdl-card__supporting-text').find('small').text(small[0].innerText);
    	modal.modal('toggle');
    }
}

function saveDatos(pantalla) {
	var idioma = $('#Idioma').val();
	var operar = null;
	if(pantalla == 2) {
		operar = $('#textOperar').text();
	}
	if(pantalla == 3) {
		$( ".select-prioridad.button-select" ).each(function() {
		  var id = $( this ).attr('id');
		  var dato_card = $('#'+id).parents('.mdl-card-question').find('.card-front p').text();
		  if($( this ).attr('id') != undefined) {
		  	datos_array.push(dato_card);
		  }
		});
	}
	$.ajax({
		data  : { global_datos : global_datos,
				  pantalla     : pantalla,
				  idioma 	   : idioma,
				  datos_prio   : datos_array.toString(),
				  operar       : operar,
				  facturacion  : facturacion},
		url   : 'es/saveDatos',
		type  : 'POST'
	}).done(function(data){
		try{
		} catch (err){
			msj('error',err.message);
		}
	});
}


var array_ids = new Array();
$(window).load(function() {
  if($('body').attr('class') == 'fp-viewing-0-0') {
  	$('.fp-prev').addClass('hidden');
  }	
});

$( document ).ready(function() {
	var select 				   = 0;
	var select_prioridad 	   = 0;
	var select_infraestructura = 0;
	var select_tam 			   = 0;
	var select_empl 	       = 0;
	var array_button 		   = new Array();
	//botón adelante
    $(".fp-next").click(function() {
    	setTimeout(function(){
    	 if($('body').attr('class') != 'fp-viewing-0-0') {
    		$('.fp-prev').removeClass("hidden");
    	 }
    	 if($('body').attr('class') == 'fp-viewing-0-1') {
    	 	if(select == 0) {
    	 		$('.fp-next').addClass('arrow-block');
    	 	}else if(select == 1) {
    	 		$('.fp-next').removeClass('arrow-block');
    	 	}
    	}
    	if($('body').attr('class') == 'fp-viewing-0-2') {
			if(select_tam == 0) {
    	 		$('.fp-next').addClass('arrow-block');
    	 	}else if(select_tam == 1) {
    	 		$('.fp-next').removeClass('arrow-block');
    	 	}
    	}
    	if($('body').attr('class') == 'fp-viewing-0-3') {
    		if(select_prioridad == 0) {
    	 		$('.fp-next').addClass('arrow-block');
    	 	}else if(select_prioridad == 1) {
    	 		$('.fp-next').removeClass('arrow-block');
    	 	}
    	}
    	if($('body').attr('class') == 'fp-viewing-0-4') {
			if(select_infraestructura == 0) {
    	 		$('.fp-next').addClass('arrow-block');
    	 	}else if(select_infraestructura == 1) {
    	 		$('.fp-next').removeClass('arrow-block');
    	 	}
    	}
    	 if($('body').attr('class') == 'fp-viewing-0-5') {
    	 	$('.fp-next').addClass( "hidden" );
    	 }
    	}, 500);
    	if($('body').attr('class') == 'fp-viewing-0-1') {
    		saveDatos(1);
    		var id_button = $('.mdl-card-question .content-card').find('.select.select-one.button-select').attr('id');
    		array_ids.push(id_button);
    		if(array_ids.length != 0) {
				array_ids.splice(0, 1, id_button);
				var id = array_ids[1];
				$('#'+id).addClass('button-select');
			}
    	}
    	if($('body').attr('class') == 'fp-viewing-0-2') {
    		saveDatos(2);   
    		var id_button = $('.mdl-card-question .content-card').find('.select-tam.select-one.button-select').attr('id');
    		array_ids.push(id_button);
    		if(array_ids.length != 0) {
				array_ids.splice(1, 1, id_button);
			}
			var id = array_ids[2];
			$('#'+id).addClass('button-select');
    	}
    	if($('body').attr('class') == 'fp-viewing-0-3') {
    		saveDatos(3);
    		var id_button = $('.mdl-card-question .content-card').find('.select-prioridad.button-select').attr('id');
    		array_ids.push(id_button);
    		if(array_ids.length != 0) {
				array_ids.splice(2, 1, id_button);
				var id = array_ids[3];
				$('#'+id).addClass('button-select');
			}
    	}
    	if($('body').attr('class') == 'fp-viewing-0-4') {
    		saveDatos(4);
    		mostrarDatos();
    		var id_button = $('.mdl-card-question .content-card').find('.select-infraestructura.select-one.button-select').attr('id');;
    		array_ids.push(id_button);
    		if(array_ids.length != 0) {
				array_ids.splice(3, 1, id_button);
			}
    	}
    });
    //botón atrás
    $(".fp-prev").click(function(){
    	setTimeout(function(){
    	 if($('body').attr('class') == 'fp-viewing-0-0') {
    		$('.fp-prev').addClass('hidden');
			$('.fp-next').removeClass('arrow-block');
    	 }
    	 if($('body').attr('class') == 'fp-viewing-0-1') {
			$('.fp-next').removeClass('arrow-block');
			var id = array_ids[0];
			$('#'+id).addClass('button-select');
    	}
    	if($('body').attr('class') == 'fp-viewing-0-2') {
			$('.fp-next').removeClass('arrow-block');
			var id = array_ids[1];
			$('#'+id).addClass('button-select');
    	}
    	if($('body').attr('class') == 'fp-viewing-0-3') {
			$('.fp-next').removeClass('arrow-block');
			var id = array_ids[2];
			$('#'+id).addClass('button-select');
			while(datos_array.length > 0) {
  				datos_array.pop();
			}
    	}
    	if($('body').attr('class') == 'fp-viewing-0-4') {
			$('.fp-next').removeClass('arrow-block');
			var id = array_ids[3];
			$('#'+id).addClass('button-select');
    	}
    	 if($('body').attr('class') != 'fp-viewing-0-5') {
    		$('.fp-next').removeClass('hidden');
    	 }
    	}, 500);
    });
    //botón seleccione
    $(".select").click(function () {
		select = 1;
		if($('body').attr('class') == 'fp-viewing-0-1') {
			$('.fp-next').removeClass('arrow-block');
    	}
	});
	$("#buttonMas").click(function () {
		select_tam = 1;
		if(facturacion != null) {
			if($('body').attr('class') == 'fp-viewing-0-2') {
				$('.fp-next').removeClass('arrow-block');
    		}
		}
	});
	$(".select-prioridad").click(function () {
		select_prioridad = 1;
		var id_button = $('.mdl-card-question .content-card').find('.select-prioridad.button-select').attr('id');
		array_button.push(id_button);
		if(array_button.length > 0){
			array_button.splice(0, 1, id_button);
		}
		if($('body').attr('class') == 'fp-viewing-0-3') {
			if($('#'+array_button[0]).hasClass('button-select') == true) {
				$('.fp-next').removeClass('arrow-block');
			}else {
				$('.fp-next').addClass('arrow-block');
			}
    	}
	});
	$(".select-infraestructura").click(function () {
		select_infraestructura = 1;
		if($('body').attr('class') == 'fp-viewing-0-4') {
			$('.fp-next').removeClass('arrow-block');
    	}
	});
});

function mostrarDatos() {
	$.ajax({
		url   : 'es/mostrarDatos',
		type  : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
          	$('#industria').text(data.Industria);
          	$('#factura').text(data.Factura_anual)
           	$('#tamanio').text(data.Tamanio);
           	$('#prioridad').text(data.Prioridad);
           	$('#infraestructura').text(data.Infraestructura);
        }else {
        }
      } catch (err){
        msj('error',err.message);
      }
	});
}

function cambiarIdioma() {
	var idioma = $('#Idioma').val();
	if(idioma == 'Español') {
		location.href = 'Es';
	}else if(idioma == 'Inglés') {
		location.href = 'En';
	}else if(idioma == 'Portugés') {
		location.href = 'Pt';
	}
}
var i = 1;
function operar(id,tipo) {
	var cardSelec    = $('#'+id+'.select-one').parents('.content-card').find('.contenido');
	var divIncrement = $('#'+id+'.select-one').parent();
	var cardHidden   = $('.mdl-card-question.visi-hidden');
	if(tipo == 2) {
		i++;
		if(i == 2) {
			$('#textOperar').text('1 - 50');
			divIncrement.addClass('select-increment');
			cardSelec.addClass('aparecer');
			cardHidden.fadeIn(400);
		}else if(i == 3) {
			$('#textOperar').text('50 - 100');
		}else if(i == 4) {
			$('#textOperar').text('100 - 500');
		}else if(i == 5) {
			$('#textOperar').text('500 - 1000');
		}else if(i == 6) {
			$('#textOperar').text('1000 - 2500');
		}else if(i == 7) {
			$('#textOperar').text('2500 - 5000');
		}else if(i == 8) {
			$('#textOperar').text('5000 a más');
		}else if(i > 8) {
			i = 8;
			return;
		}
	}else if(tipo == 1) {
		i--;
		if(i == 7) {
			$('#textOperar').text('2500 - 5000');
		}else if(i == 6) {
			$('#textOperar').text('1000 - 2500');
		}else if(i == 5) {
			$('#textOperar').text('500 - 1000');
		}else if(i == 4){
			$('#textOperar').text('100 - 500');
		}else if(i == 3){
			$('#textOperar').text('50 - 100');
		}else if(i == 2){
			$('#textOperar').text('1 - 50');
		}else if(i == 1) {
			$('#textOperar').text('Seleccione');
			divIncrement.removeClass('select-increment');
			$('.mdl-select').removeClass('select-increment');
			cardSelec.removeClass('aparecer');
			$('.contenido').removeClass('aparecer');
			cardHidden.fadeOut(400);
			$("#facturacion").val('0');
			$('.selectpicker').selectpicker('refresh');
			return;
		}else if(i < 1) {
			i = 1;
			return;
		}
	}
}

var facturacion = null;
function selectFacturacion(id){
	facturacion = $('#facturacion').val();
	if($('#textOperar') != 'Seleccione' && facturacion != null) {
		$('.fp-next').removeClass('arrow-block');
	}
	$('.contenido').removeClass('aparecer');
	$('.mdl-select').addClass('select-increment');
	var selectButton = $('#'+id).parents('.mdl-select .btn-group').find('button');
	var Select       = $('#'+id).parents('.mdl-card-question').find('.contenido');
	Select.addClass('aparecer');
	selectButton.click(function(){
		Select.removeClass('aparecer');
	})
}

function validarCampos(){
	var $inputs = $('form :input'); // Obtenemos los inputs de nuestro formulario
	var formvalido = true; // Para saber si el form esta vacio 
	$inputs.each(function() {  // Recorremos los inputs del formulario (uno a uno)
		if(isEmpty($(this).val())){ // Verificamos que el input este vacio 
				$(this).css('border-color','red'); // Agregamos un fondo rojo si este esta vacio
				formvalido = false;
		}else{
				$(this).css('border-color',''); // quitamos el fondo rojo si este esta lleno
		}
	});
	return formvalido; // retornamos según corresponda
}
		 
/*
* Funcion que valida que un campo sea completado
* @retun bool 
*/
function isEmpty(val){
	if(jQuery.trim(val).length != 0)
    	return false;
		return true;
}

