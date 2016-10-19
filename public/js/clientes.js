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
// devuelve true si el objeto no es un boton
function notButton($jqObj) {
	return !$jqObj.is('.btn') && $jqObj.parents('.btn').length == 0;
}

var popups = {

	confirmBorrarCliente : function(nombreCliente, id, fila) {
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
								fila.remove().draw(false);
								alertify.success('Borrado ' + nombreCliente)
							}
						})
					},
				'oncancel': function(){ 
		                 
		            }
		        
		}).show();

	}

};

$('document').ready(function() {

	// alertify config global
	alertify.defaults.transition = "fade";
	alertify.defaults.theme.ok = "btn btn-primary";
	alertify.defaults.theme.cancel = "btn btn-default";
	alertify.defaults.theme.input = "form-control";
	// Muestro div contenedor de la tabla clientes
	$('.escondido').removeClass('escondido');

    // Inicializo Datatables
    tablaClientes = $('#tabla-clientes').DataTable({
   		"dom": '<"toolbar">lfrtip',
		responsive: {
			details: {
				type: 'column'
			}
		},
		columnDefs: [
			{
				"targets": [1, 8],
				"searchable": false,
				"orderable": false,
			},
			{
				"targets": [5, 6, 7],
				"responsivePriority": 10
			},
			{
				"targets": [1, 0, 8],
				"responsivePriority": 1
			},
			{
				"targets": [2, 4],
				"responsivePriority": 2
			},
			{
				"targets": 3,
				"responsivePriority": 3
			}
		]
    });

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
			  url: 'clientes/' + id,
		}).success(function(data) {
			if (data != "") {
				fillFormCliente(data);
				$('#cliente-modal').modal('show');
			}
		});
	});

	// Funcionalidad boton borrar
	$('#tabla-clientes').on('click', '.btn-borrar-cliente', function(e) {
		var tr = $(this).parents('tr')
		var fila = tablaClientes.row(tr);
		var nombreCliente = fila.data()[0];
		var id = tr.data('id');
		popups.confirmBorrarCliente(nombreCliente, id, fila);
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



