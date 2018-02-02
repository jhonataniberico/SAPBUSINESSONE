function ingresar() {
	var usuario  = $('#usuario').val();
	var password = $('#password').val();
	if(usuario == null) {
		$('#usuario').parent().addClass('is-invalid');
		return;
	}
	if(password == null) {
		$('#password').parent().addClass('is-invalid');
		return;
	}
	$.ajax({
		data  : { usuario  : usuario,
				  password : password},
		url   : 'login/ingresar',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		location.href = 'admin';
        		$('#usuario').val("");
        		$('#password').val("");
        	}else {
				$('#usuario').parent().addClass('is-invalid');
				$('#password').parent().addClass('is-invalid');
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}

function cerrarCesion() {
	$.ajax({
		url   : 'admin/cerrarCesion',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		location.href = 'Login';
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}

$("#showpass").click(function() {
	$(this).find('i').toggleClass("mdi-remove_red_eye mdi-visibility_off");
    var input = $(this).parent().find('.mdl-textfield__input');
    if (input.attr("type") == "password") {
    	input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});