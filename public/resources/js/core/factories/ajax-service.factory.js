define([
    'app/core/services/ajax-base.service',
    'helpers'

], function(AjaxBaseService, Helpers){


    function create(basePath,section) {

        var service = Object.create(AjaxBaseService, {
            basePath: {value: basePath || '/'},
            section: {value: section || Helpers.getSectionName()}
        });
        return service;
    }

    return {
        create: create
    };

});