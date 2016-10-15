const AGREGAR_CLIENTE = 'Agregar Cliente';
const MODIFICAR_CLIENTE = 'Modificar Cliente';


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

function notButton($jqObj) {
	return !$jqObj.is('.btn') && $jqObj.parents('.btn').length == 0;
}

var popups = {

	confirmBorrarCliente : function(nombreCliente, id) {
		// <span class="glyphicons glyphicons-question-sign"></span>
		
		// La fila del cliente a borrar en la tabla
		var row = tablaClientes.row('.parent');
		alertify.confirm().setting({
				'title': 'Estas seguro?',
				'message': 'Queres borrar a ' + nombreCliente + '?',
				'labels': {
					ok:'Si, borralo',
					cancel:'No, cancelar',
				},
				'modal': true,
				'closable': false,
				'closableByDimmer': false,
				'defaultFocus': 'cancel',
				'movable': false, 
				'moveBounded': true,
				'reverseButtons': true,
				'onok': function(){
					$.ajax({
						  url: 'clientes/borrar',
						  type : 'POST',
						  data: {
							  'id': id,
							  }
						  })
						.success(
						         function(data) {
							if (data == 1) {
								row.remove().draw(false)
								alertify.success('Borrado ' + nombreCliente)
							}
						})
					},
				'oncancel': function(){ 
		                 
		            }
		        
		}).show();

	}

}

$('document').ready(function() {
	// $(".se-pre-con").fadeOut("slow");;

	// $("#fakeloader").fakeLoader();

	// alertify.defaults = {
	// 	'transition': 'fade',
	// 	'theme': {
	// 		'ok': 'btn btn-primary',
	// 		'cancel': 'btn btn default',
	// 		'input': 'form-control'
	// 	}
	// }


	// alertify config global
	alertify.defaults.transition = "fade";
	alertify.defaults.theme.ok = "btn btn-primary";
	alertify.defaults.theme.cancel = "btn btn-default";
	alertify.defaults.theme.input = "form-control";
	console.log(alertify);
	// Muestro div contenedor de la tabla clientes
	$('.escondido').removeClass('escondido');

    // Inicializo Datatables
    tablaClientes = $('#tabla-clientes').DataTable({
   		"dom": '<"toolbar">lfrtip',
    });

	// Funcionalidad boton Nuevo Cliente
	$('#btn-nuevo-cliente').click(function(e) {
		$('#agregar-cliente-tit').html(AGREGAR_CLIENTE);
		$('#cliente-modal').modal('show');
	});

	// Funcionalidad boton Editar
	$('#tabla-clientes').on('click', '.btn-editar', function(e) {
		$('#agregar-cliente-tit').html(MODIFICAR_CLIENTE);
		id = this.dataset.id;
		$.ajax({
			  url: 'clientes/' + id,
		}).success(function(data) {
			if (data != "") {
				fillFormCliente(data);
				$('#cliente-modal').modal('show');
			}
		});
	});

	// Funcionalidad boton borrar
	$('#tabla-clientes').on('click', '.btn-borrar', function(e) {
		var nombreCliente = tablaClientes.row($(this).parent()).data()[0];
		var id = this.dataset.id;
		popups.confirmBorrarCliente(nombreCliente, id);
	});

	// Contraer fila abierta al abrir otra 	
	$('#tabla-clientes tbody').on('click', 'tr', function (e) {
        $clicked = $(e.target);
        if (notButton($clicked)) {
	        var clickedIndex = tablaClientes.row(this).index();
	        tablaClientes.rows().every( function () {
	    	    if (this.index() != clickedIndex && this.child.isShown()) {
	        		this.child.hide();
	        		$(this.node()).removeClass('parent');
		        }
		    });
	    }
	});


				
});



