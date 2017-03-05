/**
 * Created by fethe on 20/11/16.
 */
define([
        'jquery',

    ],
    function($){


        return [{
            selector: '#agregar-cliente',
            options: {
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
                        range: [1000000, 99999999]
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
                submitHandler: function (form) {
                    $.publish('clientes-form-valid', form);
                }
            }
        }];
    });
