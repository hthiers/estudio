<!-- {{-- Dialogo confimacion Borrar Cliente --}} -->


	{{ csrf_field() }} <input name="id" type="hidden" id="borrar-cliente-id">
	<div class="modal fade bs-example-modal-sm" id="modal-confirma-borrar"
		tabindex="-1" role="dialog" data-cliente="" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="modal-borrar-cliente-tit">Est&aacute;s seguro?</h4>
				</div>
				<div class="modal-body">
					<p>Se borraran los datos del cliente <span id="cliente-nombre"></span>. Esta operaci&oacute;n no puede deshacerse.</p>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" data-id="" id="btn-borrar-cliente" class="btn btn-primary">Si, borrar cliente</button>
				</div>

			</div>
		</div>
	</div>
