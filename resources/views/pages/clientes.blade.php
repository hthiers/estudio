@extends('layouts.app')

@section('estilos')

    <link rel="stylesheet" type="text/css" href="{{ url('css/datatables.css') }}" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css"/>

@endsection

@section('content')

	
    <div class="right_col" role="main">
   

        <div class="page-title">
            <div class="title_left">
                <h3>{!! Breadcrumbs::render('clientes') !!}</h3>
            </div>

            <div class="title_right">
                <div class="btn-derecha col-md-5 col-sm-5 col-xs-12 pull-right">
                    <button id="btn-nuevo-cliente" type="button" class="btn btn-success" >
                        <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i> Nuevo</button>

                </div>
            </div>
        </div>
		

        <div class="row">

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ $errors->first() }} </strong>No se ha agregado el cliente.
                </div>
            @endif
			
            <div class="col-md-12 col-sm-12 col-xs-12 escondido top_search">

                        
                            <table id="tabla-clientes" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
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
                                <tbody>
                                @forelse($clientes as $cliente)
                                    <tr data-id="{{ $cliente->id }}">
                                        <td class=" ">
                                            {{ $cliente->apellido.', '.$cliente->nombre }}
                                        </td>
                                        <td><a href="{{ url('clientes/'.$cliente->slug) }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></td>
                                        <td>{{ $cliente->celular }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>{{ $cliente->dni }}</td>
                                        <td>{{ $cliente->domicilio }}</td>
                                        <td>{{ $cliente->estadoCivil? $cliente->estadoCivil->estado : "---" }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <span class="glyphicon glyphicon-option-vertical dropdown-toggle cursor-pointer" data-toggle="dropdown" aria-hidden="true"></span>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a data-id="{{ $cliente->id }}" class="btn-vermas-cliente">
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
                                </tbody>
                            </table>
            </div>
        </div>
    </div>

    @include('popups.cliente-nuevo')
    @include('popups.confirma-borrar')
    



@endsection


@section('bottom-scripts')
    <script src="{{ url('js/jquery.validate.js') }}"></script>
    <script src="{{ url('js/validacion-cliente.js') }}"></script>
    <script src="{{ url('js/datatables.js') }}"></script>
    <script src="{{ url('js/fakeloader.min.js') }}"></script>
    <script src="{{ url('js/clientes.js') }}"></script>
    <script src="//cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>


@endsection
