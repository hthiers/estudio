/**
 * Created by fethe on 30/10/16.
 */
requirejs.config({
    baseUrl: 'vendor',
    paths: {
        app: '../resources/js',
        controller: '../resources/js/controller',
        jquery: 'jquery.min',
        bootstrap: 'bootstrap.min',
        gentelella: 'gentelella.min',
        'datatables.net': 'jquery.dataTables.min',
        'datatables.net-bs' : 'dataTables.bootstrap.min',
        'ba-tiny-pubsub': 'ba-tiny-pubsub.min',
        alertify: 'alertify.min'
    },
    shim: {
        bootstrap: ['jquery'],
        gentelella: ['jquery', 'bootstrap'],
        'datatables': {
            deps: ['jquery', 'bootstrap']
        },
        'ba-tiny-pubsub': {
            deps: ['jquery']
        }

    }
});
