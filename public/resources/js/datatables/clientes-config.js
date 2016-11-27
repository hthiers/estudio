/**
 * Created by fethe on 30/10/16.
 */
define([
    'app/renderer/clientes-renderer',

    ],
    function(Renderer){
        'use strict';

        var LANG_URL = './resources/js/datatables/spanish.lang';

        var DOM = '<"toolbar">tr<"tabla-pie"p>';

        return {
            processing: false,
            serverSide: false,
            ajax: '/api/clientes',
            columns:[
                {
                    name: 'fullname',
                    data: 'fullname'
                },
                {
                    name: 'opciones',
                    data: 'slug',
                    mRender: function (data, type, full) {
                        return Renderer.botonVerMas(data);
                    }
                },
                {
                    name: 'celular',
                    data: 'celular'
                },
                {
                    name: 'telefono',
                    data: 'telefono'
                },
                {
                    name: 'email',
                    data: 'email'
                },
                {
                    name: 'dni',
                    data: 'dni'
                },
                {
                    name: 'domicilio',
                    data: 'domicilio'
                },
                {
                    name: 'estado-civil',
                    data: 'estado_civil.estado',
                    defaultContent: ""
                },
                {
                    name: 'opciones',
                    data: 'id',
                    mRender: function (data, type, full) {
                        return Renderer.menuOpciones(data, full.slug);
                    }
                }
            ],
            dom: DOM ,
            language: {
                url: LANG_URL
            },
            responsive: {
                details: {
                    type: 'column'
                }
            },
            columnDefs: [
                {
                    targets: ['ver-mas', 'opciones'],
                    searchable: false,
                    orderable: false
                },
                {
                    targets: ['dni', 'domicilio', 'estado-civil'],
                    responsivePriority: 10
                },
                {
                    targets: ['fullname', 'ver-mas', -1],
                    responsivePriority: 1
                },
                {
                    targets: ['celular', 'email'],
                    responsivePriority: 2
                },
                {
                    targets: 'telefono',
                    responsivePriority: 3
                }
            ]
        };
});
