$(document).ready(function() {
	$('#principal').fullpage({
		autoScrolling: false,
		fitToSection: false
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
				  empresa : empresa},
		url   : 'Es/getModelo',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
			/*$('#modelo').html('');
			$('#modelo').append('<option value="">Modelo</option>');
			$('#modelo').append(data.comboModelo);*/
		} catch (err){
			msj('error',err.message);
		}
	});
}

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

var global_datos = null;
function guardarDatos(id,datos) {//falta cambiar el 3er slider en la vista coordinar con josé
	var buttonSelect = $('#'+id);
	var cardSelect   = $('#'+id).parent().find('.contenido');
	global_datos = datos;
	$('.contenido').removeClass('aparecer');
	$('.content-card').find('button').removeClass('button-select');
	buttonSelect.addClass('button-select');
	cardSelect.addClass('aparecer');
}

function saveDatos(pantalla) {
	var idioma = $('#Idioma').val();
	console.log(idioma);
	$.ajax({
		data  : { global_datos : global_datos,
				  pantalla     : pantalla,
				  idioma 	   : idioma},
		url   : 'es/saveDatos',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
		} catch (err){
			msj('error',err.message);
		}
	});
}



$(window).load(function() {
  if($('body').attr('class') == 'fp-viewing-0-0') {
  	$('.fp-prev').addClass('hidden');
  }	
});

$( document ).ready(function() {
	var select = 0;
	var select_prioridad = 0;
	var select_infraestructura = 0;
	//botón adelante
    $(".fp-next").click(function() {
    	setTimeout(function(){
    	 if($('body').attr('class') != 'fp-viewing-0-0') {
    		$('.fp-prev').removeClass( "hidden" );
    	 }
    	 if($('body').attr('class') == 'fp-viewing-0-1') {
    	 	if(select == 0) {
    	 		$('.fp-next').css('opacity', '.5');
				$('.fp-next').css('pointer-events', 'none');
    	 	}else if(select == 1) {
    	 		$('.fp-next').css('opacity', '');
				$('.fp-next').css('pointer-events', '');
    	 	}
    	}
    	/*if($('body').attr('class') == 'fp-viewing-0-2') {
			$('.fp-next').css('opacity', '.5');
			$('.fp-next').css('pointer-events', 'none');
    	}*/
    	if($('body').attr('class') == 'fp-viewing-0-3') {
    		if(select_prioridad == 0) {
    	 		$('.fp-next').css('opacity', '.5');
				$('.fp-next').css('pointer-events', 'none');
    	 	}else if(select_prioridad == 1) {
    	 		$('.fp-next').css('opacity', '');
				$('.fp-next').css('pointer-events', '');
    	 	}
    	}
    	if($('body').attr('class') == 'fp-viewing-0-4') {
			if(select_infraestructura == 0) {
    	 		$('.fp-next').css('opacity', '.5');
				$('.fp-next').css('pointer-events', 'none');
    	 	}else if(select_infraestructura == 1) {
    	 		$('.fp-next').css('opacity', '');
				$('.fp-next').css('pointer-events', '');
    	 	}
    	}
    	 if($('body').attr('class') == 'fp-viewing-0-5') {
    	 	$('.fp-next').addClass( "hidden" );
    	 }
    	}, 500);
    	if($('body').attr('class') == 'fp-viewing-0-1') {
    		saveDatos(1);
    	}
    	if($('body').attr('class') == 'fp-viewing-0-3') {
    		saveDatos(3);
    	}
    	if($('body').attr('class') == 'fp-viewing-0-4') {
    		saveDatos(4);
    		mostrarDatos();
    	}
    });
    //botón atrás
    $(".fp-prev").click(function(){
    	setTimeout(function(){
    	 if($('body').attr('class') == 'fp-viewing-0-0') {
    		$('.fp-prev').addClass('hidden');
    		$('.fp-next').css('opacity', '');
			$('.fp-next').css('pointer-events', '');
    	 }
    	 if($('body').attr('class') == 'fp-viewing-0-1') {
			$('.fp-next').css('opacity', '');
			$('.fp-next').css('pointer-events', '');
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
			$('.fp-next').css('opacity', '');
			$('.fp-next').css('pointer-events', '');
    	}
	});
	$(".select-prioridad").click(function () {
		select_prioridad = 1;
		if($('body').attr('class') == 'fp-viewing-0-3') {
			$('.fp-next').css('opacity', '');
			$('.fp-next').css('pointer-events', '');
    	}
	});
	$(".select-prioridad").click(function () {
		select_infraestructura = 1;
		if($('body').attr('class') == 'fp-viewing-0-4') {
			$('.fp-next').css('opacity', '');
			$('.fp-next').css('pointer-events', '');
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
		/*data  : { },*/
		url   : 'es/mostrarDatos',
		type  : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
           	console.log(data.industria);
        }else {
        }
      } catch (err){
        msj('error',err.message);
      }
	});
}

function cambiarIdioma() {
	location.href = '';
}