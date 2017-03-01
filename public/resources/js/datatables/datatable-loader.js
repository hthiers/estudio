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

        var ACTIONS = ['edit', 'delete'],
            oDataTable,
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
              _setupButtons();
              return oDataTable;
          });
        }

        /**
         * Prepara los botones
         * */
        function _setupButtons() {
            var selector;
            ACTIONS.forEach(function (action) {
                selector = '.btn-' + section + '-' + action;
                oDataTable.on('click', selector, function(e) {
                    var oRow = oDataTable.row($(this).parents('tr')).data();
                    $.publish(section+'-'+action+'-requested', [oRow.id, oRow.fullname]);
                });
            });
            $('.btn-' + section + '-new-submit').on('click', function(e){
                $.publish(section+'-new-requested', $(this).closest('form'));
            });

        }

        /**
         * Vincular input como buscador de la tabla
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

        return {
            sSectionName: section,
            oDataTable: oDataTable,
            init: init,
        };


    });
