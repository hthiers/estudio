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
        /*require(['app/clientes/clientes.validations'], function(forms) {
            forms.forEach(function(form) {
                console.log(form.options);
                $(form.selector).validate(form.options);
            })
        });*/
        $('#agregar-cliente').validate({
            rules: {
                nombre: {
                    required: true,
                    minlength: 3,
                    maxlength: 45
                },
                apellido: {
                    required: true,
                    minlength: 3,
                    maxlength: 45
                },
                fecha_nac: {
                    date: true
                },
                email: {
                    email: true
                },
                dni: {
                    number: true,
                    range: [1000000,99999999]
                },
                telefono: {
                    number: true,
                    range: [100000, 9000000000000000]
                },
                celular: {
                    number: true,
                    range: [100000, 9000000000000000]
                },
                domicilio: {
                    maxlength: 255
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
});
