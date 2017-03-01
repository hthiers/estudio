define([
    'jquery'
    ],
    function($){

    var AjaxService = function(section, basePath) {
        if (basePath) {
            basePath = basePath.trim();
            if (basePath[basePath.length - 1] !== '/') {
                basePath += '/';
            }
        }
        this.basePath = basePath;
        this.section = section ? section.trim() : '';
        return this;
    };

    AjaxService.prototype.get = function (id, callback) {
        var basePath = this.basePath,
            section = this.section;
        $.ajax({
            url: basePath + section + '/' + id
        }).done(function (res) {
            if (res != "") {
                $.publish(section + '-service-get-sucess', res);
                callback && callback.call(this, res);
            }
        }).fail(function (err) {
            $.publish(section + '-service-get-fail', err);
            console.error(section + ': Error en get');

        });
    };

    AjaxService.prototype.edit = function(data) {
        var basePath = this.basePath,
            section = this.section;
        $.ajax({
            url: basePath + section + '/edit',
            type: 'POST',
            data: data
        })
            .done(function (res) {
                $.publish(section + '-service-edit-success', res);
            })
            .fail(function (err) {
                $.publish(section + '-service-edit-fail', err);
                console.error(section + ': Error en edit');
            });
    };

    AjaxService.prototype.add = function(data) {
        var basePath = this.basePath,
            section = this.section;
        $.ajax({
            url: basePath + section,
            type: 'POST',
            data: data
        })
            .done(function (res) {
                $.publish(section + '-service-add-sucess', res);
            })
            .fail(function (err) {
                $.publish(section + '-service-add-fail', err);
                console.error(section + ': Error en add');
                console.error(err);
            });
    };

    AjaxService.prototype.delete = function (id, name) {
        var basePath = this.basePath,
            section = this.section;
        $.ajax({
            url: basePath + section + '/borrar',
            type: 'POST',
            data: {
                id: id
            }
        }).done(function (res) {
            $.publish(section + '-service-delete-success', name);

        }).fail(function (err) {
            $.publish(section + '-service-get-fail', err);
            console.error(section + ': Error en delete');
            console.error(err);

        });
    };
    return new AjaxService();

});