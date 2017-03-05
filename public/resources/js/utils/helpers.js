define(['jquery'], function($){

    function getSectionName() {
        var BARRA = '/',
            cantBarras,
            firstBarIndex,
            section,
            url = window.location.pathname.substr(1).toLowerCase();
        url = url[url.length -1] === BARRA ? url.slice(0, -2) : url;
        firstBarIndex = url.indexOf(BARRA) !== -1 ? url.indexOf(BARRA) : url.length;
        section = url.substr(0, firstBarIndex);
        for (var i = cantBarras = 0; i < url.length; cantBarras += +(BARRA === url[i++]));
        return cantBarras === 0 ? section : section + '-detail';
    }

    function fillFormCliente(data) {
          $('#cliente-id').val(data.id);
          $('#nombre').val(data.nombre);
          $('#apellido').val(data.apellido);
          $('#dni').val(data.dni);
          $('#fecha-nac').val(data.fecha_nac);
          $('#email').val(data.email);
          $('#estado-civil').val(data.estado_civil_id);
          $('#telefono').val(data.telefono);
          $('#celular').val(data.celular);
          $('#domicilio').val(data.domicilio);
    }

    function clearValidation(formElement) {
        var validator = $(formElement).validate();
        $('[name]',formElement).each(function(){
            $(this).closest('div.form-group').removeClass('has-error');
        });
        validator.prepareForm();
        validator.hideErrors();
    }

    function cleanForm(formElement) {
        clearValidation(formElement);
        $(formElement).trigger('reset');
    }

    function serializeObject () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    }

    return {
        getSectionName: getSectionName,
        fillFormCliente: fillFormCliente,
        clearValidation: clearValidation,
        cleanForm: cleanForm,
        serializeObject: serializeObject
    }



});
