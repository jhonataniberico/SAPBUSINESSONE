function log(msj) {
	console.log(msj);
}
function tocar(event){
	$(event).css("cursor", "move");
	
	$(event).mouseup(function() {
		$(event).css("cursor", "pointer");
	});
}
var CONFIG = (function() {
	var private = {
		'ANP' : 'Acci&oacute;n No permitida',
		'MSJ_ERR' : 'Comun&iacute;quese con alguna persona a cargo :(',
		'EST_INACTIVO' : 0,
		'CABE_ERR'   : 'Error',
		'EST_LLAMAR' : 'SU_TURNO',
		'EST_PERDID' : 'PERDIO_TURNO',
		'EST_ENTREV' : 'EN_ENTREVISTA',
		'TIPOS'      : 'image/*,video/*'
	};
	return {
		get : function(name) {
			return private[name];
		}
	};
})();
function modal(idModal) {
	$('#'+idModal).modal('toggle');
}
function abrirCerrarModal(idModal) {
	$('#'+idModal).modal('toggle');
}
function msj(tipo, msj, cabecera) {
	if (tipo == 'error') {
		toastr.error(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else if (tipo == 'warning') {
		toastr.warning(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else {
		toastr.success(msj, cabecera, {timeOut: 4000});
	}
}