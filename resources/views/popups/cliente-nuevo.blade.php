{{-- Formulario agregar cliente Modal --}}
            <form id="agregar-cliente" action="clientes/addOrUpdate" method="POST" class="form-horizontal form-label-left" novalidate>
<div class="modal fade agregar-cliente" id="cliente-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

                {{ csrf_field() }}
                <input name="id" type="hidden" id="cliente-id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="agregar-cliente-tit"></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="x_content">
                                <div class="item form-group">
                                    <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Nombre
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="nombre" type="text" id="nombre"
                                               class="form-control col-md-7 col-xs-12"
                                               required="required"/>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="apellido" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Apellido
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="apellido" type="text" id="apellido"
                                               class="form-control col-md-7 col-xs-12"
                                               required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="dni" class="control-label col-md-3 col-sm-3 col-xs-12" >
                                        DNI</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="dni" type="number" id="dni"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="fecha_nac" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Fecha nacimiento</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="fecha_nac" type="date" id="fecha-nac"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="estado_civil" class="control-label col-md-3 col-sm-3 col-xs-12" >
                                        Estado Civil
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="estado_civil" id="estado-civil"
                                                class="form-control col-md-7 col-xs-12">
                                            <option value="0" selected="true"> - Selecciona de la lista - </option>
                                            @foreach($estadosCiviles as $es)
                                                <option value="{{ $es->id }}">{{ $es->estado }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Email</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="email" type="text" id="email"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12" >
                                        Telefono</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="telefono" type="number" id="telefono"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="celular" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Celular</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="celular" type="number" id="celular"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="domicilio" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Domicilio</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="domicilio" type="text" id="domicilio"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-xs-12 col-sm-9">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="cliente-submit" class="btn btn-primary" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </form>
{{-- Fin formulario modal --}}

<!-- validator -->

<!-- /validator -->
