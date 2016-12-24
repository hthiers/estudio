/**
 * Created by fethe on 28/11/16.
 */

define(['app/utils/eventos'], function(evt){


    return {
        edit: {
            selector: '.btn-cliente-edit',
            events: {
                click: {
                    // TODO poner modulo automático
                    publish: $.evt['cliente']['edit-requested']
                }
            }
        }

    }
});