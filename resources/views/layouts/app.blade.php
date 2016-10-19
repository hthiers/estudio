<!DOCTYPE html>
<html lang="es">
<head>
    {{-- Metatags, js para IE8, css, title --}}
    @include('includes/head')

    {{-- CSS con pruebas, solo para desarrollo --}}
    <link rel="stylesheet" href="{{ url('css/test.css') }}">
    @yield('estilos')
    @include('includes/top-scripts')
    
</head>

<body class="nav-md">
<div id="fakeLoader"></div>

<div class="container body">
    <div class="main_container">

        @include('includes/topbar')
        @include('includes/sidebar')

        @yield('content')

        @include('includes/footer')

    </div>

</div>

{{-- jquery y bootstrap --}}



{{-- Para pasar los token en cada request ajax --}}


<script src="{{ url('js/estudio.js') }}"></script>
@yield('bottom-scripts')
<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>
</body>
</html>
