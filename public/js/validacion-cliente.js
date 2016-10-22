/**
 * Created by federico.antonucci on 23/07/2016.
 */

function clearValidation(formElement){
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

$(document).ready(function(){
    $('#agregar-cliente').validate({
        rules: {
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 45
            },
            apellido: {
                required: true,
                minlength: 3,
                maxlength: 45
            },
            fecha_nac: {
                date: true
            },
            email: {
                email: true
            },
            dni: {
                number: true,
                range: [1000000,99999999]
            },
            telefono: {
                number: true,
                range: [100000, 9000000000000000]
            },
            celular: {
                number: true,
                range: [100000, 9000000000000000]
            },
            domicilio: {
                maxlength: 255
            }
        }
    });
    var addOrUpdateForm = document.getElementById('agregar-cliente');
    $('button#btn-nuevo-cliente').on('click', function() {
        cleanForm(addOrUpdateForm);
    });
    $('#tabla-clientes').on('click', '.btn-editar', function() {
        cleanForm(addOrUpdateForm);
    });

});