/**
 * Created by fethe on 28/11/16.
 */

define([
    'jquery',
    'app/renderer/clientes-renderer',
    'app/core/factories/ajax-service.factory',
    'helpers'

], function($, Renderer, AjaxServiceFactory, Helpers, undefined){

    "use strict";
    var clientesService = AjaxServiceFactory.create(),
        $modalNewCliente = $('#cliente-modal'),
        $formNewCliente = $('#agregar-cliente'),
        $tituloFormNewCliente = $('#agregar-cliente-tit')


    var eventHandler = {

        section: 'clientes',
        init: function(dataTable) {
            this.setUpListeners();
            this.dataTable = dataTable;
        },

        setUpListeners: function() {
            $('.btn-clientes-new').on('click', function() { eventHandler.onClickClientesNew() });
            $.subscribe('clientes-delete-requested', function(e, nId, sNombre) { eventHandler.onDeleteRequested(nId, sNombre) });
            $.subscribe('clientes-delete-confirmed', function(e, nId, fullname) { eventHandler.onDeleteConfirmed(nId, fullname) });
            $.subscribe('clientes-service-delete-success', function(e, fullname){ eventHandler.onServiceDeleteSuccess(fullname) });
            $.subscribe('clientes-delete-failed', function(e, fullname){ eventHandler.onDeleteFailed(fullname) });
            $.subscribe('clientes-new-requested', function(e, form){ eventHandler.onNewRequested(form) });
            $.subscribe('clientes-service-add-success', function(fullname){ eventHandler.onServiceAddSuccess(fullname) });
            $.subscribe('clientes-edit-requested', function(e, id, fullname){ eventHandler.onEditRequested(id, fullname) });
            $.subscribe('clientes-service-edit-success', function(e, fullname){ eventHandler.onServiceEditSuccess(fullname) });
            $.subscribe('clientes-service-add-sucess', function(e, addedCliente){ eventHandler.onServiceAddSuccess(addedCliente) });

        },

        onEditRequested: function(id, fullname) {
            clientesService.get(id, function(data) {
                if (data) {
                    Helpers.fillFormCliente(data);
                    $modalNewCliente.modal('show');
                };
            });
            $tituloFormNewCliente.text('Modificar Cliente');
            Helpers.cleanForm($formNewCliente);
        },

        /* ADD CLIENTE EVENTS */
        onClickClientesNew: function(e) {
            $tituloFormNewCliente.html('Ingresar Nuevo Cliente');
            Helpers.cleanForm($formNewCliente);
            $modalNewCliente.modal('show');
        },
        onNewRequested: function (form) {
            // TODO hacerle trim a todos los campos del form antes de enviarlo
            var $form = $(form);
            if ($form.valid()) {
                var cliente = Helpers.serializeObject.apply($form);
                if (cliente.id) {
                    clientesService.edit(cliente)
                }  else  {
                    clientesService.add(cliente);
                }
            };
        },
        onServiceAddSuccess: function (addedCliente) {
            console.log(addedCliente);
            this.dataTable.ajax.reload(function() {
                Renderer.successNotification('Se ha agregado a '+ addedCliente.fullname);
            }, false /* Se mantiene en la pagina donde está */);
            $modalNewCliente.modal('hide');
            Helpers.cleanForm($formNewCliente);
        },
        // end ADD CLIENTE


        onServiceEditSuccess: function (fullname) {
            this.dataTable.ajax.reload(function() {
                Renderer.successNotification('Se han modificado los datos de '+ fullname);
            }, false /* Se mantiene en la pagina donde está */);
            $modalNewCliente.modal('hide');
            Helpers.cleanForm($formNewCliente);
        },

        onDeleteRequested: function(nId, sNombre) {
            Renderer.deleteConfirmation(nId, sNombre);
        },

        onDeleteConfirmed: function(nId, sName) {
            clientesService.delete(nId, sName);
        },

        onServiceDeleteSuccess: function(fullname) {
            // TODO solo eliminar la fila borrada
            this.dataTable.ajax.reload(function() {
                Renderer.successNotification('Se ha borrado a '+ fullname);
            }, false /* Mantiene la posicion en la pagina */);
        },

        onDeleteFailed: function(fullname) {
            Renderer.errorNotification('No se ha podido borrar a '+ fullname);
        },
    };

    return eventHandler;
});