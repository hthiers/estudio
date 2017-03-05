/**
 * Created by fethe on 30/10/16.
 * Main Controller
 * Lee la seccion de la url y llama al controllador correspondiente
 */
define([
    'helpers',
    './app',
    'jquery',
    'bootstrap',
    'gentelella',
    'ba-tiny-pubsub'
  ],
  function(Helpers) {
    'use strict';
    var section = Helpers.getSectionName();
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    // TODO poner un controller default por si falla
    requirejs(['app/'+ section + '/controller/' + section + '.controller']);

});
