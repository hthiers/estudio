@extends('layout.app')

@section('style')
    {{-- Datatables style para bootstrap 3 --}}
    <link rel="stylesheet" type="text/css" href="{{ url('css/dataTables.bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('css/responsive.bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('css/datatables.min.css') }}"/>
    {{-- Alertify --}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css"/>
@endsection

@section('title', 'Clientes')

@section('content')

    <div class="right_col" role="main">

        <div class="page-title">
            <div class="title_left">
                <h2> {!! Breadcrumbs::render('clientes') !!}</h2>
            </div>

            <div class="title_right">

                {{-- A la derecha del breadcrumb --}}

            </div>
        </div>

        <div class="row">

            {{-- Fondo blanco y encabezado de cada pagina --}}
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="title_left row">
                            <ul class="nav navbar-left panel_toolbox col-md-3 col-xs-12">
                                <li><a class="btn btn-success btn-clientes-new">
                                    <span class="glyphicon glyphicon-user btn-icon" aria-hidden="true"></span>Nuevo</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-right panel_toolbox col-md-3 col-xs-12">
                                <li><div class="btn-derecha pull-right top_search">
                                        <div class="input-group">
                                            <input type="text" id="clientes-buscador" class="buscador-gde form-control"/>
                                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                        </div>
                                    </div>
                                </li>
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

                        <div class="col-md-12 col-sm-12 col-xs-12 top_search">
                            <table id="clientes-tabla" class="table table-responsive table-striped dt-responsive nowrap" cellspacing="0"
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
    {{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
     {{-- Datatables --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/r-2.1.0/datatables.min.js"></script>
     {{-- Alertify --}}
    {{-- <script src="//cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
     {{-- Script propio --}}
    {{-- <script src="{{ url('js/clientes.js') }}"></script>
     {{-- Validaciones formularios --}}
    {{--<script src="{{ url('js/validacion-cliente.js') }}"></script>--}}

@endsection
