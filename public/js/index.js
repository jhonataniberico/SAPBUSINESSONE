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
	var notas 	 		= $('#notas').val();

	if(nombre_completo == '' && empresa == '' && email == '' && pais == '' && cargo == '' && telefono == '') {
		$('#nombre_completo').focus().css('border-color','red');
		$('#empresa').focus().css('border-color','red');
		$('#email').focus().css('border-color','red');
		$('#pais').focus().css('border-color','red');
		$('#cargo').focus().css('border-color','red');
		$('#telefono').focus().css('border-color','red');
		return;
	}
	if(nombre_completo == null || nombre_completo == '') {
		$('#nombre_completo').focus().css('border-color','red');
		return;
	}
	if(empresa == null || empresa == '') {
		$('#empresa').focus().css('border-color','red');
		return;
	}
	if(email == null || email == '') {
		$('#email').focus().css('border-color','red');
		return;
	}
	if(pais == null || pais == '') {
		$('#pais').focus().css('border-color','red');
		return;
	}
	if(cargo == null || cargo == '') {
		$('#cargo').focus().css('border-color','red');
		return;
	}
	if(telefono == null || telefono == '') {
		$('#telefono').focus().css('border-color','red');
		return;
	}
	return;
	$.ajax({
		data  : { nombre_completo : nombre_completo,
				  empresa 	      : empresa},
		url   : 'Es/getModelo',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
		} catch (err){
			msj('error',err.message);
		}
	});
}

function soloLetras(e){
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

 function valida(e){
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
    	console.log('entra');
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
				  operar       : operar},
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
    	console.log('entra');
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
	$(".select-tam").click(function () {
		select_tam = 1;
		if(select_empl == 1 && $('#textOperar').text() != 'Seleccione') {
			if($('body').attr('class') == 'fp-viewing-0-2') {
				$('.fp-next').removeClass('arrow-block');
    		}
		}
	});
	$(".select-empleados").click(function () {
		select_empl = 1;
		if(select_tam == 1 && $('#textOperar').text() != 'Seleccione') {
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

function borrarFocus(dato) {
	var nombre_completo = $('#nombre_completo').val();
	var empresa  		= $('#empresa').val();
	var email 	 		= $('#email').val();
	var pais 	 		= $('#pais').val();
	var cargo 	 		= $('#cargo').val();
	var telefono 		= $('#telefono').val();
	var notas 	 		= $('#notas').val();
	//console.log($(':input[@type=text]'));
	/*$('input[type=text]').each(function(){
	// do something to a text or password input
	var id = this.val != null ? $('#'+this.id).focus().css('border-color','') : $('#'+this.id).focus().css('border-color','red');
	});*/
	var input = $('.form-control').find('input');
	//console.log(input.val());
	if(input.val().length > 0){
		input.focus().css('border-color','');
	}
	else{
		input.focus().css('border-color','red');
	}
	/*if(nombre_completo != null || nombre_completo != '') {
		$('#nombre_completo').focus().css('border-color','');
	}
	if(empresa != null || empresa != '') {
		$('#empresa').focus().css('border-color','');
	}
	if(email != null || email != '') {
		$('#email').focus().css('border-color','');
	}
	if(pais != null || pais != '') {
		$('#pais').focus().css('border-color','');
	}
	if(cargo != null || cargo != '') {
		$('#cargo').focus().css('border-color','');
	}
	if(telefono != null || telefono != '') {
		$('#telefono').focus().css('border-color','');
	}*/
}

function mostrarDatos() {
	$.ajax({
		url   : 'es/mostrarDatos',
		type  : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
           	//console.log(data.industria);
          /*$('#industria').text(data.industria);
           	$('#Tamanio').text(data.Tamanio);
           	$('#Prioridad').text(data.Prioridad);
           	$('#Infraestructura').text(data.Infraestructura);*/
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
			$('#textOperar').text('1000 a más');
		}else if(i > 6) {
			i = 6;
			return;
		}
	}else if(tipo == 1) {
		i--;
		if(i == 5) {
			$('#textOperar').text('500 - 1000');
		}else if(i == 4) {
			$('#textOperar').text('100 - 500');
		}else if(i == 3) {
			$('#textOperar').text('50 - 100');
		}else if(i == 2){
			$('#textOperar').text('1 - 50');
		}else if(i == 1) {
			$('#textOperar').text('Seleccione');
			divIncrement.removeClass('select-increment');
			cardSelec.removeClass('aparecer');
			cardHidden.fadeOut(400);
			return;
		}else if(i < 1) {
			i = 1;
			return;
		}
	}
}