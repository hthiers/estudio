@extends('layouts.app')

@section('estilos')

    <link rel="stylesheet" type="text/css" href="css/test/datatables.css"/>

@endsection

@section('content')


    <div class="right_col main-content" role="main">
   
        <div class="">
<!--          <style> 
/*     #overlay { */
/*         background: #ffffff; */
/*         color: #666666; */
/*         position: fixed; */
/*         height: 100%; */
/*         width: 100%; */
/*         z-index: 5000; */
/*         top: 0; */
/*         left: 0; */
/*         float: left; */
/*         text-align: center; */
/*         padding-top: 25%; */
/*     } */
<!-- </style> -->
<!-- <div id="overlay"> -->
<!--     <img src="{{ url('/img/ajax-loader.gif') }}" alt="Loading" /><br/> -->
<!--     Cargando... -->
<!-- </div> -->
<script> 
//     jQuery(window).load(function(){
//     jQuery('#overlay').fadeOut();
//     });
 </script>  -->
            <div class="page-title">
                <div class="title_left">
                    <h3>Clientes </h3>
                </div>

                <div class="title_right">
                    <div class="btn-derecha col-md-5 col-sm-5 col-xs-12 pull-right top_search">
                        <button id="btn-nuevo-cliente" type="button" class="btn btn-success" >
                            <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i> Nuevo</button>

                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                            {{--<span class="input-group-btn">--}}
                                {{--<button class="btn btn-default" type="button">Buscar</button>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <div class="clearfix"></div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>{{ $errors->first() }} </strong>No se ha agregado el cliente.
                    </div>
                @endif
                <div class="col-md-12 col-sm-12 col-xs-12">


                                <table id="tabla-clientes" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                        <th>Mail</th>
                                        <th>DNI</th>
                                        <th>Domicilio</th>
                                        <th>Estado Civil</th>
<!--                                         <th></th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($clientes as $cliente)
                                        <tr id="{{ $cliente->id }}">
                                            <td class=" ">
                                                <strong>{{ $cliente->apellido.", ".$cliente->nombre }}</strong>
                                            </td>
                                            <td class=" ">{{ $cliente->celular }}</td>
                                            <td class=" ">{{ $cliente->telefono }}</td>
                                            <td class=" ">{{ $cliente->email }}</td>
                                            <td class=" ">{{ $cliente->dni }}</td>
                                            <td class=" ">{{ $cliente->domicilio }}</td>
                                            <td class=" ">{{ $cliente->estadoCivil? $cliente->estadoCivil->estado : "---" }}</td>
<!--                                             <td class=""> -->
<!--                                                 <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil fa-fw"></i> Ver Expedientes</button> -->
<!--                                                 <button type="button" data-id="{{ $cliente->id }}" class="btn btn-primary btn-sm btn-editar"  -->
<!--                                                 	><i class="fa fa-pencil fa-fw"></i> Editar</button> -->
<!--                                                 <button type="button" data-id="{{ $cliente->id }}" class="btn btn-danger btn-sm btn-borrar"><i class="fa fa-trash fa-fw"></i> Borrar</button> -->
<!--                                             </td> -->
                                        </tr>
                                    @empty
                                        <td colspan="8" class="centrar-texto">No se encontraron clientes.</td>
                                    @endforelse
                                    </tbody>
                                </table>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    @include('popups.cliente-nuevo')
    @include('popups.confirma-borrar')
    



@endsection


@section('bottom-scripts')
    <script src="js/jquery.validate.js"></script>
    <script src="js/validacion-cliente.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/af-2.1.2/b-1.2.2/r-2.1.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
<!--     <script type="text/javascript" src="js/test/datatables.js"></script> -->
    <script src="js/clientes.js"></script>
    <script src="js/spin.min.js"></script>


@endsection
