/**
 * Created by fethe on 30/10/16.
 */
define([], function(){
    'use strict';

    function menuOpciones(nId, sClienteSlug) {
        return	'<div class="btn-group">' +
            '<span class="glyphicon glyphicon-option-vertical dropdown-toggle cursor-pointer" ' +
            'data-toggle="dropdown" aria-hidden="true"></span>' +
            '<ul class="dropdown-menu pull-right">' +
                '<li><a href="/clientes/' + sClienteSlug + '" class="btn-vermas-cliente">Ver mas...</a></li>' +
                '<li><a data-id="' + nId + '" class="">Expedientes</a></li>' +
                '<li role="separator" class="divider"></li>' +
                '<li><a data-id="' + nId + '" class="btn-editar-cliente">Modificar</a></li>' +
                '<li><a data-id="' + nId + '" class="btn-borrar-cliente">Eliminar</a></li>' +
            '</ul>' +
            '</div>';
    }

    function botonVerMas(sClienteSlug) {
        return '<a class="btn-show-client" href="./clientes/' + sClienteSlug + '">' +
            //'<i class="fa fa-archive" aria-hidden="true"></i>';
            '<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>';
    }

    return {
        menuOpciones: menuOpciones,
        botonVerMas: botonVerMas
    };

});