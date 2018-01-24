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
				if(confirmar == 1) {
					limpiarCampos();
					enviarGracias();
				}
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
	console.log(datos_array);
	$.ajax({
		data  : { global_datos : global_datos,
				  pantalla     : pantalla,
				  idioma 	   : idioma,
				  datos_prio   : datos_array.toString(),
				  operar       : operar,
				  facturacion  : facturacion},
		url   : 'es/Savedatos',
		type  : 'POST'
	}).done(function(data){
		try{
			if(pantalla == 4) {
				mostrarDatos();
			}
		} catch (err){
			msj('error',err.message);
		}
	});
}


var array_ids = new Array();
var select 				   = 0;
var select_prioridad 	   = 0;
var select_infraestructura = 0;
var select_tam 			   = 0;
var select_empl 	       = 0;
$( document ).ready(function() {
	var array_button 		   = new Array();
    //botón seleccione
    $(".select").click(function () {
		select = 1;
		$('.button-next').prop("disabled", false);
	});
	$("#buttonMas").click(function () {
		select_tam = 1;
		facturacion = $('#facturacion').val();
		if(facturacion != null) {
			$('.button-next').prop("disabled", false);
		}
	});
	$(".select-prioridad").click(function () {
		select_prioridad = 1;
		var id_button = $('.mdl-card-question .content-card').find('.select-prioridad.button-select').attr('id');
		array_button.push(id_button);
		if(array_button.length > 0){
			array_button.splice(0, 1, id_button);
		}
		if($('#'+array_button[0]).hasClass('button-select') == true) {
			$('.button-next').prop("disabled", false);
		}else {
			$('.button-next').prop("disabled", true);
		}
	});
	$(".select-infraestructura").click(function () {
		select_infraestructura = 1;
		$('.button-next').prop("disabled", false);
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
           	$('#prioridad').find('li').remove();
           	$('#prioridad').append(data.Prioridad);
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
			$('.mdl-tablet').find('.mdl-select').removeClass('select-increment');
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
		$('.button-next').prop("disabled", false);
	}
	$('.contenido').removeClass('aparecer');
	$('.mdl-tablet').find('.mdl-select').addClass('select-increment');
	var selectButton = $('#'+id).parents('.mdl-select .btn-group').find('button');
	var Select       = $('#'+id).parents('.mdl-card-question').find('.contenido');
	Select.addClass('aparecer');
	selectButton.click(function(){
		Select.removeClass('aparecer');
	})
}

function validarCampos(){
	var $inputs = $('form :input');
	var formvalido = true;
	$inputs.each(function() {
		if(isEmpty($(this).val())){
				$(this).css('border-color','red');
				formvalido = false;
		}else{
				$(this).css('border-color','');
		}
	});
	return formvalido;
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

var confirmar = 0;	
function ConfirmarRespuestas(){
	confirmar = 1;
	$('.mdl-card-confirmacion').addClass('confirmar');
	$('.fp-controlArrow.fp-prev').css("display","none");
}
function limpiarCampos() {
	var nombre_completo = $('#nombre_completo').val("");
	var empresa  		= $('#empresa').val("");
	var email 	 		= $('#email').val("");
	var pais 	 		= $('#pais').val("");
	var cargo 	 		= $('#cargo').val("");
	var telefono 		= $('#telefono').val("");
	var relacion		= $('#relacion').val("0");
	$('.selectpicker').selectpicker('refresh');
	var c_email    		= $('#c-email').is(':checked');
	var c_telefono    	= $('#c-telefono').is(':checked');
	var c_ambos    		= $('#c-ambos').is(':checked');
	var terminos		= $('#checkbox-1').is(':checked');

	if(c_email == true) {
		$('#c-email').parent().removeClass('is-checked');
	}else if(c_telefono == true) {
		$('#c-telefono').parent().removeClass('is-checked');
	}else if(c_ambos == true) {
		$('#c-ambos').parent().removeClass('is-checked');
	}
}

function enviarGracias() {
	$('.mdl-solicitud').addClass('animated fadeOutLeft');
	$('.mdl-agradecimiento').addClass('animated fadeInRight');
	$('.fp-controlArrow.fp-prev').css("display","none");
	$('.question').css("display","none");
	setTimeout(function(){ 
		location.reload();
	}, 5000);
}

/*BUTTONS NEXT - PREV */
var m = 1;
var id_primero 	  = "";
var homePage      = $('#home');
var header        = $('.header');
var footerLogo    = $('.logo-bottom');
var firstWindow   = $('#window1-page');
var secondWindow  = $('#window2-page');
var thirdWindow   = $('#window3-page');
var fourthWindow  = $('#window4-page');
var fifthWindow   = $('#window5-page');

function buttonNext(){
	if(pant1 == 0) {
		$('.button-next').prop("disabled", true);
	}
	$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
	homePage.addClass('animated fadeOutLeft');
	firstWindow.addClass('animated fadeInRight');
	$('.button-arrow').css("display","block");
	$('#'+id_primero).addClass('button-select');
	header.addClass('opacity');
	footerLogo.addClass('opacity');
}

var pant1 = 0;
var pant3 = 0;
var pant4 = 0;
function buttonQuestion(direction){
	if(direction == 2){
		m++;
		if(m == 2){
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			firstWindow.addClass('animated fadeOutLeft');
			secondWindow.addClass('animated fadeInRight');
			saveDatos(1);
			var id_button = $('.mdl-card-question .content-card').find('.select.select-one.button-select').attr('id');
			id_primero = id_button;
    		array_ids.push(id_button);
    		if(array_ids.length != 0) {
				array_ids.splice(0, 1, id_button);
				var id = array_ids[1];
				$('#'+id).addClass('button-select');
			}
			if(select != 1) {
				$('.button-next').prop("disabled", true);
			}
			pant1 = 1;
		}
		else if(m == 3){
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			secondWindow.addClass('animated fadeOutLeft');
			thirdWindow.addClass('animated fadeInRight');
			saveDatos(2);
			var id_button = $('.mdl-card-question .content-card').find('.select-tam.select-one.button-select').attr('id');
    		array_ids.push(id_button);
    		if(array_ids.length != 0) {
				array_ids.splice(1, 1, id_button);
			}
			var id = array_ids[2];
			$('#'+id).addClass('button-select');
			if(pant3 == 0) {
				$('.button-next').prop("disabled", true);
			}
			pant3 = 1;
		}
		else if(m == 4){
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			thirdWindow.addClass('animated fadeOutLeft');
			fourthWindow.addClass('animated fadeInRight');
			saveDatos(3);
			var id_button = $('.mdl-card-question .content-card').find('.select-prioridad.button-select').attr('id');
    		array_ids.push(id_button);
    		if(array_ids.length != 0) {
				array_ids.splice(2, 1, id_button);
				var id = array_ids[3];
				$('#'+id).addClass('button-select');
			}
			if(pant4 == 0){
				$('.button-next').prop("disabled", true);
			}
			pant4 = 1;
		}
		else if(m == 5){
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			fourthWindow.addClass('animated fadeOutLeft');
			fifthWindow.addClass('animated fadeInRight');
			$('.button-arrow.button-next').css("display","none");
			saveDatos(4);
			var id_button = $('.mdl-card-question .content-card').find('.select-infraestructura.select-one.button-select').attr('id');;
    		array_ids.push(id_button);
    		if(array_ids.length != 0) {
				array_ids.splice(3, 1, id_button);
			}
			m = 5;
			return;
		}
	}
	else if(direction == 1){
		m--;
		if(m == 4){
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			fourthWindow.addClass('animated fadeInLeft');
			fifthWindow.addClass('animated fadeOutRight');
			$('.button-arrow.button-next').css("display","block");
		}
		else if(m == 3){
			datos_array = [];
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			thirdWindow.addClass('animated fadeInLeft');
			fourthWindow.addClass('animated fadeOutRight');
		}
		else if(m == 2){
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			secondWindow.addClass('animated fadeInLeft');
			thirdWindow.addClass('animated fadeOutRight');
			$('#'+id_primero).addClass('button-select');
		}
		else if(m == 1){
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			firstWindow.addClass('animated fadeInLeft');
			secondWindow.addClass('animated fadeOutRight');
		}
		else if(m < 1){
			$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight')
			homePage.removeClass('animated fadeOutLeft')
			homePage.addClass('animated fadeInLeft');
			firstWindow.addClass('animated fadeOutRight');
			header.removeClass('opacity');
			footerLogo.removeClass('opacity');
			$('.button-arrow').css("display","none");
			homePage.find('.button-next').css("display","block");
			m = 1;
			return;
		}
	}
}

/*EDIT QUESTION*/
var num = null;

function EditQuestion(id, pant){
	if(pant == 3) {
		datos_array = [];
	}
	num = id.substr(6,1);
	m = num;
	var windowQestion  = $('#'+id+'-page');
	$('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight');
	windowQestion.addClass('animated fadeInLeft');
	$('.button-arrow.button-next').css("display","block");
}
