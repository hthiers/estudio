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
  function(Helpers, A, B, C, D, E) {
    'use strict';
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    console.log(A);
    console.log(B);
    console.log(C);
    console.log(D);
    console.log(E);


    // TODO poner un controller default por si falla
    requirejs(['controller/' + Helpers.getSectionName + '-controller']);

});
