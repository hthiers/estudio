/**
 * Created by fethe on 05/11/16.
 */
define([
    'jquery',
    'datatables.net',
    'datatables.net-bs',
    'app/datatables/clientes-config',
    'app/renderer/popups/clientes-alertas'
    ],
    function($, Datatable, dtbs, oClientesOptions, Popups) {

        /** @type {(jquery)} - datatable de clientes */
        var oDataTable;

        /**
         * Generar la datatable
         * @param {jquery} $table - objeto jquery de la tabla
         * */
        function _startTable($table) {
            oDataTable = $table.DataTable(oClientesOptions);
        }

        /**
         * Borrar la fila de un cliente
         * @param {string} sSlug - slug del cliente a eliminar
         * */
        function _remove(sSlug) {
            oDataTable.rows(function(idx, data, node){
              return data['ver-mas'] === sSlug;
            }).remove().draw(false);
        }

        function _delete(nId){

            $.ajax({
                url: 'clientes/borrar',
                type: 'POST',
                data: {
                    'id': nId
                }
            }).success(
                function (data) {
                    if (data == 1) {
                        oFila.remove().draw(false);
                        alertify.success('Borrado ' + sNombre)
                    }
                });

        }
        /**
         * Subscripción a los eventos para actualizar la vista
         * */
        function subscribeEvents(oButtons) {
            oDataTable.on('click', oButtons.borrarCliente, function(e){
                var oFila = dtClientes.row($(this).parents('tr'));
                var oCliente = oFila.data();
                var sNombre = oCliente.nombre;
                var nId = oCliente.id;
                var bConfirm = Popups.confirmaBorrar(nId, sNombre);
                if (bConfirm) console.log("confirmó");



               //_deleteCliente(nId, bConfirm);
            });

            //$.subscribe('cliente-deleted', _remove('cliente-deleted'));
        }

        /**
         * Vincular input como buscador de la tabla
         * */
        function _setSearchInput($input){
            if ($input) {
                $input.on('input', function() {
                    oDataTable.search(this.value).draw();
                });
            }
        }

        /**
         * Inicializa el módulo
         * @param {jquery} $table - jquery wrapper de la tabla
         * @param {jquery} $searchInput - jquery wrapper del input para usar como buscador
         * */
        function init($table, $searchInput) {
            _startTable($table);
            _setSearchInput($searchInput);
        }

        return {
            oDataTable: oDataTable,
            init: init,
            subscribeEvents: subscribeEvents
        };



});