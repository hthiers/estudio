{{-- Formulario agregar cliente Modal --}}
<div class="modal fade agregar-cliente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="clientes" method="POST" class="form-horizontal form-label-left" novalidate>
                {{ csrf_field() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Cliente</h4>
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
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input name="nombre" type="text" id="name"
                                               class="form-control col-md-7 col-xs-12"
                                               required="required"
                                        >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="apellido" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Apellido
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input name="apellido" type="text" id="apellido"
                                               class="form-control col-md-7 col-xs-12"
                                               required="required"
                                               data-validate-length-range="6" data-validate-words="1">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="fecha_nac" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Fecha nacimiento</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input name="fecha_nac" type="date" id="fecha_nac"
                                               class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="8">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Email</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="email" type="text" id="email"
                                               class="form-control col-md-7 col-xs-12"
                                        >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="number" class="control-label col-md-3 col-sm-3 col-xs-12" >
                                        DNI</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="dni" type="number" id="dni"
                                               class="form-control col-md-7 col-xs-12"
                                               data-validation="number" data-validation-allowing="range[0;100]">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12" >
                                        Telefono</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="telefonopo" type="number" id="telefono"
                                               class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6,20">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="celular" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Celular</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="celular" type="number" id="celular"
                                               class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6,20">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="domicilio" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Domicilio</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="domicilio" type="text" id="domicilio"
                                               class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"  >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="estado-civil" class="control-label col-md-3 col-sm-3 col-xs-12" >
                                        Estado Civil
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="estado_civil" id="estado-civil"
                                                class="form-control col-md-7 col-xs-12">
                                            <option value="0" selected="true"></option>
                                            @foreach($estadosCiviles as $es)
                                            <option value="{{ $es->id }}">{{ $es->estado }}</option>
                                            @endforeach
                                        </select>
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
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- Fin formulario modal --}}

<!-- validator -->

<script src="js/jquery.validator.js"></script>
<!-- /validator -->
