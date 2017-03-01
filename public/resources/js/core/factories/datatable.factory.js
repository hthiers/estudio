/**
 * Created by fethe on 20/11/16.
 */
define([
        'jquery',
        'app/datatables/datatable-loader',
        'app/core/factories/ajax-service.factory',
        'helpers',
        'jquery.validate'
    ],
    function($, DataTable, AjaxServiceFactory, Helpers, undefined) {



        function create() {
            return {
                data: AjaxServiceFactory.create(),
                table: DataTable.init()
            }
        }

        return {
            'create': create
        };


    });

