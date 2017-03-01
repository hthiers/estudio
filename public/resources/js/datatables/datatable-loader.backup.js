/**
* Created by fethe on 05/11/16.
*/
define([
        'jquery',
        'helpers',
        'datatables.net',
        'datatables.net-bs',
    ],
    function($, Helpers, Datatable, dtbs) {

        var oDataTable,
            section = Helpers.getSectionName();

        /**
         * Generar la datatable
         * @param {string} sTableId - id de la tabla
         * */
        function init() {
          require(['app/'+section+'/datatables/'+section+'-config'], function(oTableOptions) {
              oDataTable = $('#'+section+'-tabla').DataTable(oTableOptions);
              _loadEvents();
              _setSearchInput();
              return oDataTable;
          });
        }

        /**
         * Borra un registro del servidor y la tabla
         * @param {string} nId - id del registro a eliminar
         * */
        function remove(nId) {
            $.ajax({
                url: section + '/borrar',
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
                            $.publish(section+'delete-success');
                        }
                    })
                .fail(function(){
                    $.publish(section+'delete-fail');
                });
        }

        /**
         * Prepara los botones para borrar
         * */
        function _setupDeleteButtons() {
            var $btnDelete = $('.btn-' + section + '-delete');
            oDataTable.on('click', $btnDelete, function(e){
                var oCliente = oDataTable.row($(this).parents('tr')).data();
                var nId = oCliente.id;
                var sFullname = oCliente.fullname;
                $.publish(section = 'delete-requested', [nId, sFullname]);
            });
        }
        /**
         * Prepara los botones para editar
         * */
        function _setupEditButtons() {
            var $btnEdit = $('.btn-' + section + '-edit');
            oDataTable.on('click', $btnEdit, function(e){
                var oCliente = oDataTable.row($(this).parents('tr')).data();
                var nId = oCliente.id;
                var sFullname = oCliente.fullname;
                $.publish($.evt[section]['edit-requested'], [nId, sFullname]);
            });
        }

        /**
         * Prepara los botones para editar clientes
         * */
        function subscribeBtn(action, callback) {
            var $btnEdit = $('.btn-' + section + '-' + action);
            oDataTable.on('click', $btnEdit, function(e){
                var oCliente = oDataTable.row($(this).parents('tr')).data();
                var nId = oCliente.id;
                var sFullname = oCliente.fullname;
                $.publish(section+'-'+action+'-requested', [nId, sFullname]);
            });
        }

        /**
         * Vincular input como buscador de la tabla
         *  usar id seccion-buscador
         * */
        function _setSearchInput(){
            var $searchInput = $('#'+section+'-buscador');
            if ($searchInput) {
                $searchInput.on('input', function() {
                    oDataTable.search(this.value).draw();
                });
            }
        }

        function _loadEvents() {
            require(['app/'+section+'/events/'+section+'-events'], function(Events) {
                Events.init(oDataTable);
            });
        }

        /**
         * Inicializa el módulo
         * @param {string} sTableId - id de la tabla donde funcionará dataTables
         * @param {string} sSearchInputId - id del input para usar como buscador
         * */
        /*function init() {
            _startTable();
            console.log('init: ' + (oDataTable == null));


            //subscribeEvents();
            return oDataTable;
        }*/


            return {
                sSectionName: section,
                oDataTable: oDataTable,
                init: init,
                onDeleteConfirmed: remove
            };


    });
