/**
 * Created by fethe on 30/10/16.
 */
requirejs.config({
    baseUrl: 'vendor',
    paths: {
        'app': '../resources/js',
        'jquery': 'https://code.jquery.com/jquery-2.2.4.min',
        'bootstrap': 'bootstrap',
        'gentelella': 'my-gentelella',
        'datatables': 'datatables',
        'datatables.net': '//cdn.datatables.net/1.10.13/js/jquery.dataTables.min',
        'datatables.net-bs' : 'dataTables.bootstrap.min',
        'datatables.net-responsive': 'datatables.net-responsive',
        'dataTables.responsive.min': 'dataTables.responsive.min',
        'ba-tiny-pubsub': 'ba-tiny-pubsub.min',
        'alertify': 'alertify.min',
        'jquery.validate': 'jquery.validate',
        'helpers' : '../resources/js/utils/helpers'
    },
    shim: {
        'gentelella': ['bootstrap'],
        'bootstrap': ['jquery'],
        'ba-tiny-pubsub': {
            'deps': ['jquery']
        }
    }
});

require(['app/main']);