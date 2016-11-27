/**
 * Created by fethe on 07/11/16.
 */
define([alertify], function (Alertify)
{
    var alertas = new Alertify();

    alertas.defaults.transition = "fade";
    alertas.defaults.theme.ok = "btn btn-primary";
    alertas.defaults.theme.cancel = "btn btn-default";
    alertas.defaults.theme.input = "form-control";

    return alertas;

});