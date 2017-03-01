/**
 * Created by fethe on 20/11/16.
 */
define([
    'jquery',
    'app/core/factories/datatable.factory',
    'jquery.validate'
    ],
    function($, DataTableFactory, undefined){

        var dataTable = DataTableFactory.create();
        require(['app/clientes/clientes.validations'], function(forms) {
            forms.forEach(function(form) {
                $(form.selector).validate(form.options);
            })
        });
});
