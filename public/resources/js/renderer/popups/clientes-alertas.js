/**
 * Created by fethe on 06/11/16.
 */
define([
    'alertify',
    'app/config/alertify-config',
    'app/utils/eventos'
    ],
    function(Popups, config, E){

        /**
         * Muestra un popup modal de confirmacion de borrar registro
         * @param {number} nId - id del registro a borrar
         * @param {string} sNombre - nombre del registro a borrar
         * @param {string} sModule - nombre del modulo que llama la modal
         * */
        function confirmDelete(nId, sNombre, sModule) {

                Popups.confirm()
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
                            $.publish(E[sModule]['delete-confirmed'], [nId]);
                        },
                        'oncancel': function () {
                        }
                    }).show();

        }

        return {
            confirmDelete: confirmDelete
        }
    });
