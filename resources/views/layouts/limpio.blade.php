<!DOCTYPE html>
<html lang="es">
<head>
    {{-- Metatags, js para IE8, css, title --}}
    @include('includes/head')

    {{-- CSS con pruebas, solo para desarrollo --}}
    <link rel="stylesheet" href="css/test/test.css">
    @include('includes/top-scripts')
</head>

<body >

<div class="container body">
    <div class="main_container">


        @yield('content')

      

    </div>

</div>

{{-- jquery y bootstrap --}}

<script src="js/estudio.js"></script>

{{-- Para pasar los token en cada request ajax --}}


@yield('bottom-scripts')
<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>
</body>