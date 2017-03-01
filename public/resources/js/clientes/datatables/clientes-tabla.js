/**
* Created by fethe on 05/11/16.
*/
define([
        'jquery',
        'datatables.net',
        'datatables.net-bs',
        'app/datatables/clientes-config',
        'app/utils/eventos',
        'app/renderer/popups/clientes-alertas'
        // 'app/datatables/clientes-buttons'
    ],
    function($, Datatable, dtbs, oClientesOptions, E, Popups, eventSubscribers) {

        /** @type {(jquery)} - datatable de clientes */
        var oDataTable;
        var sModule;

        /**
         * Generar la datatable
         * @param {string} sTableId - id de la tabla
         * */
        function _startTable(sTableId) {
            oDataTable = $('#'+sTableId).DataTable(oClientesOptions);
            console.log(oDataTable);
            sModule = sTableId.substr(0, sTableId.indexOf('-'));
            // TODO remover console.log
            console.log('se ha cargado el módulo ' + sModule);

        }

        /**
         * Borra un registro del servidor y la tabla
         * @param {string} nId - id del registro a eliminar
         * */
        function _delete(nId) {
            $.ajax({
                url: sModule + '/borrar',
                type: 'POST',
                data: {
                    'id': nId
                }
            })
                .done(
                    function (data) {
                        if (data == 1) {
                            oDataTable.rows(function(idx, data, node){
                                return data.id === nId;
                            }).onDeleteConfirmed().draw(false);
                            $.publish($.evt[sModule]['delete-success']);
                        }
                    })
                .fail(function(){
                    $.publish($.evt[sModule]['delete-fail']);
                });
        }

        /**
         * Prepara los botones para borrar clientes
         * */
        function _setupDeleteButtons() {
            var $btnDelete = $('.btn-' + sModule + 'delete');
            oDataTable.on('click', $btnDelete, function(e){
                var oCliente = oDataTable.row($(this).parents('tr')).data();
                var nId = oCliente.id;
                var sFullname = oCliente.fullname;
                $.publish($.evt[sModule]['delete-requested'], [nId, sFullname]);
            });
        }
        /**
         * Prepara los botones para editar clientes
         * */
        function _setupEditButtons() {
            var $btnEdit = $('.btn-' + sModule + 'edit');
            oDataTable.on('click', $btnEdit, function(e){
                var oCliente = oDataTable.row($(this).parents('tr')).data();
                var nId = oCliente.id;
                var sFullname = oCliente.fullname;
                $.publish($.evt[sModule]['edit-requested'], [nId, sFullname]);
            });
        }

        function subscribeEvents() {
            for (var oElem in eventSubscribers) {
                if (eventSubscribers.hasOwnProperty(oElem)) {
                    oElem.events.each(function (sName, oEvent) {
                        if (oElem.hasOwnProperty(sKey)) {
                            sSelector = oElem[sName].selector || oElem.selector;
                            var event = oElem[sName];// el nombre de la key
                            console.log(oElem[sName]);
                            oDataTable.on(event, $(sSelector), function (e) {
                                var oRecord = oDataTable.row($(this).parents('tr')).data();
                                var nId = oRecord.id;
                                $.publish(oEvent.publish, [nId]);
                            });
                        }
                    });
                }
            }
        }

            /**
             * Vincular input como buscador de la tabla
             * */
            function _setSearchInput(sSearchInputId){
                var $searchInput = $('#'+sSearchInputId);
                if ($searchInput) {
                    $searchInput.on('input', function() {
                        oDataTable.search(this.value).draw();
                    });
                }
            }

            /**
             * Inicializa el módulo
             * @param {string} sTableId - id de la tabla donde funcionará dataTables
             * @param {string} sSearchInputId - id del input para usar como buscador
             * */
            function init(sTableId, sSearchInputId) {
                _startTable(sTableId);
                _setSearchInput(sSearchInputId);
                subscribeEvents();
            }


            return {
                sModule: sModule,
                oDataTable: oDataTable,
                init: init,
                subscribeEvents: subscribeEvents
            };


    });