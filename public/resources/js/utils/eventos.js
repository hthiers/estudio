/**
 * Created by fethe on 26/11/16.
 */

define(['jquery'], function($){
    events = {
        cliente: {
            'delete-requested': 'cliente-delete-requested',
            'delete-confirmed': 'cliente-confirma-borrar',
            'delete-success': 'cliente-borrar-success'
        }
    };
    $.evt = events;
});