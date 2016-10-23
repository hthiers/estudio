const AGREGAR_CLIENTE = 'Agregar Cliente';
const MODIFICAR_CLIENTE = 'Modificar Cliente';

/**
 *  Opciones de datatables
 * */
var oClientesOptions = {
		"processing": false,
		"serverSide": false,
		"ajax": "/api/clientes",
		//"stateSave": true,
		"columns":[
		{data: 'fullname'},
		{
			data: 'slug',
			"bSortable": false,
			"mRender": function (data, type, full) {
				return sBotonVerCliente(data);
			}
		},
		{data: 'celular'},
		{data: 'telefono'},
		{data: 'email'},
		{data: 'dni'},
		{data: 'domicilio'},
		{
			data: 'estado_civil.estado',
			defaultContent: ""
		},
		{
			data: 'id',
			"bSortable": false,
			"mRender": function (data, type, full) {
				return sMenuOpciones(data, full);
			}
		}
],
	dom: '<"toolbar">rtip',
	"language": {
	"url": "./js/datatables/spanish.lang"
	},
		responsive: {
			details: {
				type: 'column'
			}
		},
		columnDefs: [
			{
				"targets": [1, 7],
				"searchable": false,
				"orderable": false
			},
			{
				"targets": [4, 5, 6],
				"responsivePriority": 10
			},
			{
				"targets": [1, 0, -1],
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
	};


/**
 *  Snippets de html para inyectar en datatable
 */
var sMenuOpciones = function(nId, oCliente) {
	return	'<div class="btn-group">' +
				'<span class="glyphicon glyphicon-option-vertical dropdown-toggle cursor-pointer" ' +
				'data-toggle="dropdown" aria-hidden="true"></span>' +
				'<ul class="dropdown-menu pull-right">' +
					'<li><a href="/clientes/' + oCliente.slug + '" class="btn-vermas-cliente">Ver mas...</a></li>' +
					'<li><a data-id="' + nId + '" class="">Expedientes</a></li>' +
					'<li role="separator" class="divider"></li>' +
					'<li><a data-id="' + nId + '" class="btn-editar-cliente">Modificar</a></li>' +
					'<li><a data-id="' + nId + '" class="btn-borrar-cliente">Eliminar</a></li>' +
				'</ul>' +
			'</div>';
};

var sBotonVerCliente = function(sSlug) {
	return '<a class="btn-show-client" href="./clientes/' + sSlug + '">' +
			'<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a>';
};
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
var popups = {

	confirmBorrarCliente : function(sNombre, nId, oFila) {
		// La fila del cliente a borrar en la tabla
		var row = dtClientes.row('.parent');
		alertify.confirm().setting({
				'title': 'Estas seguro?',
				'message': 'Queres borrar a ' + sNombre + '?',
				'labels': {
					ok:'Si, borralo',
					cancel:'No, cancelar'
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
							  'id': nId
							  }
						  })
						.success(
						         function(data) {
							if (data == 1) {
								oFila.remove().draw(false);
								alertify.success('Borrado ' + sNombre)
							}
						})
					},
				'oncancel': function(){
		            }
		}).show();
	}
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



