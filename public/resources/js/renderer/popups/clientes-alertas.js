/**
 * Created by fethe on 06/11/16.
 */
define([
    'alertify',
    'app/utils/eventos'
    ],
    function(Popups, E){

        /**
         * Muestra un popup modal de confirmacion de borrar cliente
         * @param {number} nId - el id del cliente a borrar
         * @param {string} sNombre - el nombre del cliente a borrar
         * @returns {boolean} - la opcion elegida (Si-No)
         * */
        function confirmaBorrar(nId, sNombre) {

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
                            $.publish(E.cliente.confirmaBorrar, [nId]);

                        },
                        'oncancel': function () {
                        }
                    }).show();

        }

        return {
            confirmaBorrar: confirmaBorrar
        }
    });
