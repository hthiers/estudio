/**
 * Created by fethe on 30/10/16.
 */
requirejs.config({
    baseUrl: 'vendor',
    paths: {
        'app': '../resources/js',
        'jquery-base': 'jquery.min',
        'jquery': '../resources/js/lib/jquery.extension',
        'bootstrap': 'bootstrap.min',
        'gentelella': 'gentelella.min',
        'datatables.net': 'jquery.dataTables.min',
        'datatables.net-bs' : 'dataTables.bootstrap.min',
        'ba-tiny-pubsub': 'ba-tiny-pubsub.min',
        'alertify': 'alertify.min',
        'jquery.validate': 'jquery.validate',
        'helpers' : '../resources/js/utils/helpers'
    },
    shim: {
        'bootstrap': ['jquery'],
        'jquery': ['jquery-base'],
        'gentelella': ['jquery', 'bootstrap'],
        'datatables': {
            'deps': ['jquery', 'bootstrap']
        },
        'ba-tiny-pubsub': {
            'deps': ['jquery']
        }

    }
});

require(['app/main']);