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
        'gentelella': 'my-gentelella',
        //'datatables': 'datatables',
        'datatables.net': 'jquery.dataTables',
        //'datatables.net-bs' : 'dataTables.bootstrap.min',
        //'datatables.net-responsive': 'datatables.net-responsive',
       // 'dataTables.responsive.min': 'dataTables.responsive.min',
        'ba-tiny-pubsub': 'ba-tiny-pubsub.min',
        'alertify': 'alertify.min',
        'jquery.validate': 'jquery.validate',
        'helpers' : '../resources/js/utils/helpers'
    },
    shim: {
        'gentelella': ['bootstrap'],
        'bootstrap': ['jquery'],
        'jquery': {
            'deps': ['jquery-base'],
            'exports': '$'
        },
        'datatables.net': {
           'deps': ['jquery', 'bootstrap'],
           'exports': 'datatables.net'
        },
        /*'datatables.net-bs': {
            'deps': ['datatables.net'],
            'exports': 'datatables.net-bs'
        },
        'datatables.net-responsive': {
            'deps': ['datatables.net-bs'],
            'exports': 'datatables.net-responsive'
        },
        'dataTables.responsive.min': {
            'deps': ['datatables.net-responsive'],
            'exports': 'dataTables.responsive'
        },*/
        'ba-tiny-pubsub': {
            'deps': ['jquery']
        }
    }
});

require(['app/main']);