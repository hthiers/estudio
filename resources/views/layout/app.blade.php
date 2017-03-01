<!DOCTYPE html>
<html lang="es">
<head>
    {{-- Metatags, js para IE8, css, title --}}
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Estilo general del sitio --}}
    @include('assets/styles')
    {{-- Estilo propio de cada sección --}}
    @yield('style')

    {{-- Require js --}}
    <script src="{{ url('vendor/require.js') }}"
            data-main="{{ url('resources/js/app.js') }}"></script>

    <title>@yield('title') - {{ Config::get('app.name') }}</title>

</head>

<body class="nav-md">

<div class="container body">
    <div class="main_container">

        @include('layout/section/topbar')
        @include('layout/section/sidebar')

        @yield('content')

        @include('layout/section/footer')

    </div>
</div>

{{-- Scripts comunes del sitio--}}
@include('assets/scripts')
{{-- Script propio de cada seccion --}}
@yield('section-scripts')
{{-- Para pasar los token en cada request ajax --}}
{{--
<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>
--}}

</body>
</html>
