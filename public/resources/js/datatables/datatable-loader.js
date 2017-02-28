/**
* Created by fethe on 05/11/16.
*/
define([
        'jquery',
        'helpers',
        'datatables.net',
        'datatables.net-bs',
        'app/utils/eventos',
        // 'app/datatables/clientes-buttons'
    ],
    function($, Helpers, Datatable, dtbs, E) {

        var oDataTable,
            sSectionName = Helpers.getSectionName();

        /**
         * Generar la datatable
         * @param {string} sTableId - id de la tabla
         * */
        function _startTable() {
          require(['app/datatables/'+sSectionName+'-config'], function(oTableOptions) {
            console.log(oTableOptions);
            oDataTable = $('#'+sSectionName+'-tabla').DataTable(oTableOptions);
          });
        }

        /**
         * Borra un registro del servidor y la tabla
         * @param {string} nId - id del registro a eliminar
         * */
        function _delete(nId) {
            $.ajax({
                url: sSectionName + '/borrar',
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
                            }).remove().draw(false);
                            $.publish($.evt[sSectionName]['delete-success']);
                        }
                    })
                .fail(function(){
                    $.publish($.evt[sSectionName]['delete-fail']);
                });
        }

        /**
         * Prepara los botones para borrar clientes
         * */
        function _setupDeleteButtons() {
            var $btnDelete = $('.btn-' + sSectionName + 'delete');
            oDataTable.on('click', $btnDelete, function(e){
                var oCliente = oDataTable.row($(this).parents('tr')).data();
                var nId = oCliente.id;
                var sFullname = oCliente.fullname;
                $.publish($.evt[sSectionName]['delete-requested'], [nId, sFullname]);
            });
        }
        /**
         * Prepara los botones para editar clientes
         * */
        function _setupEditButtons() {
            var $btnEdit = $('.btn-' + sSectionName + 'edit');
            oDataTable.on('click', $btnEdit, function(e){
                var oCliente = oDataTable.row($(this).parents('tr')).data();
                var nId = oCliente.id;
                var sFullname = oCliente.fullname;
                $.publish($.evt[sSectionName]['edit-requested'], [nId, sFullname]);
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
            function _setSearchInput(){
                var $searchInput = $('#'+sSectionName+'-buscador');
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
            function init() {
              console.log('Inicializada seccion ' + sSectionName);
                _startTable();
                _setSearchInput();
                //subscribeEvents();
            }


            return {
                sSectionName: sSectionName,
                oDataTable: oDataTable,
                init: init,
                subscribeEvents: subscribeEvents
            };


    });
