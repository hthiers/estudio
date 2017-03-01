/**
 * Created by fethe on 30/10/16.
 */
define([
    'alertify',
    'app/config/alertify-config',
], function(Alertify){
    'use strict';

    function menuOpciones(nId, sClienteSlug) {
        return	'<div class="btn-group">' +
            '<span class="glyphicon glyphicon-option-vertical dropdown-toggle cursor-pointer" ' +
            'data-toggle="dropdown" aria-hidden="true"></span>' +
            '<ul class="dropdown-menu pull-right">' +
                '<li><a href="/clientes/' + sClienteSlug + '" class="btn-vermas-cliente">Ver mas...</a></li>' +
                '<li><a data-id="' + nId + '" class="">Expedientes</a></li>' +
                '<li role="separator" class="divider"></li>' +
                '<li><a data' +
            '-id="' + nId + '" class="btn-clientes-edit">Modificar</a></li>' +
                '<li><a data-id="' + nId + '" class="btn-clientes-delete">Eliminar</a></li>' +
            '</ul>' +
            '</div>';
    }

    function botonVerMas(sClienteSlug) {
        return '<a class="btn-show-client" href="./clientes/' + sClienteSlug + '">' +
            //'<i class="fa fa-archive" aria-hidden="true"></i>';
            '<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>';
    }

    function deleteConfirmation(nId, sNombre, sModule) {

        Alertify.confirm()
            .setting({
                'title': 'Estas seguro?',
                'message': 'Queres borrar a ' + sNombre + '?',
                'labels': {
                    ok: 'Si, borralo',
                    cancel: 'No, cancelar'
                },
                'modal': true,
                'closable': false,
                'closableByDimmer': false,
                'defaultFocus': 'cancel',
                'movable': false,
                'moveBounded': true,
                'reverseButtons': true,
                'onok': function () {
                    $.publish('clientes-delete-confirmed', [nId, sNombre]);
                },
                'oncancel': function () {
                    $.publish('clientes-delete-failed', [nId, sNombre]);
                }
            }).show();

    }

    function successNotification(text) {
        var notification = Alertify.notify(text, 'success', 5, function(){ });
    }

    function errorNotification(text) {
        var notification = Alertify.notify(text, 'error', 5, function(){ });
    }

    return {
        menuOpciones: menuOpciones,
        botonVerMas: botonVerMas,
        deleteConfirmation: deleteConfirmation,
        successNotification: successNotification,
        errorNotification: errorNotification
    };

});