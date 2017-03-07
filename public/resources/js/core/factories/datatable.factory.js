/**
 * Created by fethe on 05/11/16.
 */
define([
        'jquery',
        'app/core/factories/ajax-service.factory',
        'helpers',
       //'datatables',
        'dataTables.responsive.min',
        'datatables.net',
        'datatables.net-bs',
        'datatables.net-responsive'
    ],
    function($, AjaxServiceFactory, Helpers, Datatable) {

        var ACTIONS = ['edit', 'delete'],
            oDataTable,
            section = Helpers.getSectionName();

        function _init() {
            require(['app/'+section+'/datatables/'+section+'.config'], function(oTableOptions) {
                oDataTable = $('#'+section+'-tabla').DataTable(oTableOptions);
                _loadEvents();
                _setSearchInput();
                _setupButtons();
                return oDataTable;
            });
        }

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

        function create() {
            return {
                data: AjaxServiceFactory.create(),
                table: _init()
            };
        }

        return {
            create: create,
        };


    });
