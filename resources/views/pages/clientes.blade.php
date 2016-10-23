@extends('layout.app')

@section('style')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css"/>
    {{-- Datatables style para bootstrap 3 --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.12/r-2.1.0/datatables.min.css"/>
    {{-- Alertify --}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css"/>
@endsection

@section('title', 'Clientes')

@section('content')

    <div class="right_col" role="main">

        <div class="page-title">
            <div class="title_left">
                <h3>Clientes</h3>
            </div>

            <div class="title_right">
                <div class="btn-derecha col-md-5 col-sm-5 col-xs-12 pull-right top_search">
                    <div class="input-group">
                    <input type="text" id="buscador-clientes" class="buscador-gde form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            {{-- Fondo blanco y encabezado de cada pagina --}}
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="title_left">
                            <h2> {!! Breadcrumbs::render('clientes') !!}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a id="btn-nuevo-cliente" class="">Nuevo cliente <i class="fa fa-plus-circle fa-fw"></i></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">{{-- Fin de encabezado --}}


                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong>{{ $errors->first() }} </strong>No se ha agregado el cliente.
                            </div>
                        @endif

                        <div class="col-md-12 col-sm-12 col-xs-12 escondido top_search">
                            <table id="tabla-clientes" class="table table-striped dt-responsive nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>@langUpC('etiquetas.nombre')</th>
                                    <th class="no-sort"></th>
                                    <th>@langUpC('etiquetas.celular')</th>
                                    <th>@langUpC('etiquetas.telefono')</th>
                                    <th>@langUpC('etiquetas.mail')</th>
                                    <th>@langUPC('etiquetas.documento')</th>
                                    <th>@langUpC('etiquetas.domicilio')</th>
                                    <th>@langUpC('etiquetas.estado-civil')</th>
                                    <th></th>
                                </tr>
                                </thead>
                                {{--<tbody>
                                @forelse($clientes as $cliente)
                                    <tr data-id="{{ $cliente->id }}">
                                        <td class=" ">
                                            {{ $cliente->apellido.', '.$cliente->nombre }}
                                        </td>
                                        <td><a href="{{ url('clientes/'.$cliente->slug) }}"><span
                                                        class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                                        </td>
                                        <td>{{ $cliente->celular }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>{{ $cliente->dni }}</td>
                                        <td>{{ $cliente->domicilio }}</td>
                                        <td>{{ $cliente->estadoCivil? $cliente->estadoCivil->estado : "---" }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <span class="glyphicon glyphicon-option-vertical dropdown-toggle cursor-pointer"
                                                      data-toggle="dropdown" aria-hidden="true"></span>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="{{ route('cliente', [$slug = $cliente->slug]) }}"
                                                           class="btn-vermas-cliente">
                                                            @langUpc('etiquetas.ver-mas...')
                                                        </a></li>
                                                    <li><a data-id="{{ $cliente->id }}" class="">
                                                            @langUpc('etiquetas.expedientes')
                                                        </a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a data-id="{{ $cliente->id }}" class="btn-editar-cliente">
                                                            Modificar
                                                        </a></li>
                                                    <li><a data-id="{{ $cliente->id }}" class="btn-borrar-cliente">
                                                            Eliminar
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="8" class="centrar-texto">@langUpc('mensajes.sin-clientes')</td>
                                @endforelse
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('popups.cliente-nuevo')
    @include('popups.confirma-borrar')




@endsection


@section('section-scripts')
    {{-- jQuery Validate --}}
    <script src="{{ url('js/jquery.validate.js') }}"></script>
    {{-- Datatables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/r-2.1.0/datatables.min.js"></script>
    {{-- Alertify --}}
    <script src="//cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
    {{-- Script propio --}}
    <script src="{{ url('js/clientes.js') }}"></script>
    {{-- Validaciones formularios --}}
    <script src="{{ url('js/validacion-cliente.js') }}"></script>

@endsection
