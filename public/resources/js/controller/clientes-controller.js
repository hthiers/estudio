/**
 * Created by fethe on 20/11/16.
 */
define([
    'jquery',
    'app/datatables/datatable-loader',
    'app/utils/eventos'
    ],
    function($, DatatableLoader, E){

        DatatableLoader.init();
        console.log('alalalalalong');
        /**ClientesTabla.subscribeEvents({
            borrarCliente: '.btn-borrar-cliente',
            editarCliente: '.btn-editar-cliente'
        });
        $.subscribe(E.cliente.confirmaBorrar, function(evt, nId) {
            console.log(nId);
        });
         */
        //$.subscribe($.evt['cliente']['edit-requested'], function(e) {
          //  console.log($.evt['cliente']['edit-requested']);
        //})
});
