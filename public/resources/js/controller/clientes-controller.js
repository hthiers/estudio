/**
 * Created by fethe on 20/11/16.
 */
require([
    'app/controller/main-controller',
    'app/datatables/clientes-tabla',
    'app/utils/eventos'
    ],
    function(MainController, ClientesTabla, E){

        ClientesTabla
            .init($('#clientes-tabla'), $('#clientes-buscador'));
        ClientesTabla.subscribeEvents({
            borrarCliente: '.btn-borrar-cliente',
            editarCliente: '.btn-editar-cliente'
        });
        $.subscribe(E.cliente.confirmaBorrar, function(evt, nId) {
            console.log(nId);
        });
});