/**
 * Created by fethe on 30/10/16.
 */
define([
    'app/renderer/clientes-renderer',

    ],
    function(Renderer){
        'use strict';

        var LANG_URL = '/resources/js/lib/datatables/spanish.lang';

        var DOM = '<"toolbar">tr<"tabla-pie"p>';

        return {
            processing: false,
            serverSide: false,
            ajax: 'api/clientes',
            columns:[
                {
                    name: 'fullname',
                    data: function (data, type, full) {
                        return data.apellido + ', ' + data.nombre;
                    }
                },
                {
                    name: 'ver-mas',
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
            /*responsive: {
                details: false
            },*/
            columnDefs: [
                {
                    targets: [1, -1],
                    searchable: false,
                    orderable: false
                },
                {
                    targets: [5, 6, 7],
                    responsivePriority: 10
                },
                {
                    targets: [0, 1, -1],
                    responsivePriority: 1
                },
                {
                    targets: [2, 4],
                    responsivePriority: 2
                },
                {
                    targets: 3,
                    responsivePriority: 3
                }
            ],
            // scrollY:        '50vh',
            // scrollCollapse: true,
            // paging:         false

        };
});
