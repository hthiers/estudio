/**
 * Created by fethe on 30/10/16.
 */
define(['jquery', 'datatables', 'alertify'], function($, datatables, alertify){
    'use strict';

    function confirmBorrarCliente(sNombre, nId, oFila) {
        // La fila del cliente a borrar en la tabla
        // var row = dtClientes.row('.parent');
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
                                oFila.onDeleteConfirmed().draw(false);
                                alertify.success('Borrado ' + sNombre)
                            }
                        })
            },
            'oncancel': function(){
            }
        }).show();

});

