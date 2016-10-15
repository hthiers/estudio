@extends('layouts.app')

@section('estilos')

    <link rel="stylesheet" type="text/css" href="{{ url('css/datatables.css') }}"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css"/>

@endsection

@section('content')

	
    <div class="right_col" role="main">
   

        <div class="page-title">
            <div class="title_left">
                <h3>Clientes </h3>
            </div>

            <div class="title_right">
                <div class="btn-derecha col-md-5 col-sm-5 col-xs-12 pull-right top_search">
                    <button id="btn-nuevo-cliente" type="button" class="btn btn-success" >
                        <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i> Nuevo</button>

                </div>
            </div>
        </div>
		

        <div class="row">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ $errors->first() }} </strong>No se ha agregado el expediente.
                </div>
            @endif
			
            <div class="col-md-12 col-sm-12 col-xs-12 escondido">

                        
                            <table id="tabla-expedientes" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Fecha</th>
                                    <th>Jurisdiccion</th>
                                    <th>Rama</th>
                                    <th>Clientes</th>
                                    <th>Comentarios</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($expedientes as $expediente)
                                    <tr id="{{ $expediente->id }}">
                                        <td class=" ">
                                            <strong>{{ $expediente->titulo }}</strong>
                                        </td>
                                        <td class=" ">{{ $expediente->fecha }}</td>
                                        <td class=" ">{{ $expediente->jurisdiccion->jurisdiccion }}</td>
                                        <td class=" ">{{ $expediente->rama->rama }}</td>
                                        <td class=" ">

                                            @forelse($expediente->clientes as $cliente)
                                                {{ $cliente->apellido }}
                                            @empty
                                            @endforelse

                                        </td>
                                        <td class=" ">
                                            @forelse($expediente->comentarios as $comentario)
                                                {{ $comentario->comentario }}
                                            @empty
                                            @endforelse
                                        </td>
                                        <td class="">
                                            <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Ver Expedientes</button>
                                            <button type="button" data-id="{{ $expediente->id }}" class="btn btn-sm btn-primary btn-editar"
                                            	><i class="fa fa-pencil fa-fw"></i> Editar</button>
                                            <button type="button" data-id="{{ $expediente->id }}" class="btn btn-sm btn-danger btn-borrar"><i class="fa fa-trash fa-fw"></i> Borrar</button>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="8" class="centrar-texto">No se encontraron clientes.</td>
                                @endforelse
                                </tbody>
                            </table>
            </div>
        </div>
    </div>

   {{-- @include('popups.cliente-nuevo')
    @include('popups.confirma-borrar') --}}
    



@endsection


@section('bottom-scripts')
    <script src="{{ url('js/jquery.validate.js') }}"></script>
    <script src="{{ url('js/validacion-cliente.js') }}"></script>
    <script src="{{ url('js/datatables.js') }}"></script>
    <script src="{{ url('js/fakeloader.min.js') }}"></script>
    <script src="{{ url('js/clientes.js') }}"></script>
    <script src="//cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>


@endsection
