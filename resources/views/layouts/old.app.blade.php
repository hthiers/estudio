<!DOCTYPE html>
<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link href="{{ asset("css/font-awesome.css") }}" rel="stylesheet">

        <title>Lorem Estudio</title>

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('includes/topbar')
                @include('includes/sidebar')


                @yield('main_container')

            </div>

        </div>



        <!-- Custom Theme Scripts -->
        <script src="js/estudio.js"></script>


    </body>
</html>