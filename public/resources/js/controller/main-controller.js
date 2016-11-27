/**
 * Created by fethe on 20/11/16.
 */
require([
        'jquery',
        'bootstrap',
        'gentelella',
        'ba-tiny-pubsub'
    ],
    function($, bootstrap , gentelella, pubsub){
        'use strict';
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
});