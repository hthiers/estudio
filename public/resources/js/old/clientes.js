const AGREGAR_CLIENTE = 'Agregar Cliente';
const MODIFICAR_CLIENTE = 'Modificar Cliente';

/**
 *  Opciones de datatables
 * */


/**
 *  Snippets de html para inyectar en datatable
 */

// Fin snippets

/**
 *  Helpers
 * */
function fillFormCliente(data) {

	  $('#cliente-id').val(data.id);
	  $('#nombre').val(data.nombre);
	  $('#apellido').val(data.apellido);
	  $('#dni').val(data.dni);
	  $('#fecha-nac').val(data.fecha_nac);
	  $('#email').val(data.email);
	  $('#estado-civil').val(data.estado_civil_id);
	  $('#telefono').val(data.telefono);
	  $('#celular').val(data.celular);
	  $('#domicilio').val(data.domicilio);
}
// devuelve true si el objeto no es un boton
function notButton($jqObj) {
	return !$jqObj.is('.btn') && $jqObj.parents('.btn').length == 0;
}
// Fin helpers

/**
 * Popups
 * */

};
// Fin popups

$('document').ready(function() {

	// alertify config global
	alertify.defaults.transition = "fade";
	alertify.defaults.theme.ok = "btn btn-primary";
	alertify.defaults.theme.cancel = "btn btn-default";
	alertify.defaults.theme.input = "form-control";
	// Muestro div contenedor de la tabla clientes
	$('.escondido').removeClass('escondido');

    // Inicializo Datatables
    dtClientes = $('#tabla-clientes').DataTable(oClientesOptions);

	// Funcionalidad boton Nuevo Cliente
	$('#btn-nuevo-cliente').click(function(e) {
		$('#agregar-cliente-tit').html(AGREGAR_CLIENTE);
		$('#cliente-modal').modal('show');
	});

	// Funcionalidad boton Editar
	$('#tabla-clientes').on('click', '.btn-editar-cliente', function(e) {
		$('#agregar-cliente-tit').html(MODIFICAR_CLIENTE);
		id = this.dataset.id;
		$.ajax({
			  url: 'clientes/' + id
		}).success(function(data) {
			if (data != "") {
				fillFormCliente(data);
				$('#cliente-modal').modal('show');
			}
		});
	});

	// Funcionalidad boton borrar
	$('#tabla-clientes').on('click', '.btn-borrar-cliente', function(e) {
		var oFila = dtClientes.row($(this).parents('tr'));
		var oCliente = oFila.data();
		var sNombre = oCliente.fullname;
		var nId = oCliente.id;
		popups.confirmBorrarCliente(sNombre, nId, oFila);
	});

	// Contraer fila abierta al abrir otra 	
	$('#tabla-clientes tbody').on('click', 'tr', function (e) {
        $clicked = $(e.target);
        if (notButton($clicked)) {
	        var clickedIndex = dtClientes.row(this).index();
	        dtClientes.rows().every( function () {
	    	    if (this.index() != clickedIndex && this.child.isShown()) {
	        		this.child.hide();
	        		$(this.node()).removeClass('parent');
		        }
		    });
	    }
	});
	$("#buscador-clientes").keyup(function() {
		dtClientes.search(this.value).draw();
	});


				
});



