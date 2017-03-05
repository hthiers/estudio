<div class="col-md-3 menu_fixed left_col barra-lateral">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <span class="site_title"><img id="logo" src="{{ url('img/logo.png') }}" alt="..."><span>{{ Config::get('app.name') }}</span></span>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ url('img/default-avatar.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{ Auth::user()->nombre }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">


            <div class="menu_section">
                {{--<h3>Men&uacute; Principal</h3>--}}
                {{--<ul class="nav side-menu">--}}
                    {{--<li><a><i class="fa fa-university fa-fw" aria-hidden="true"></i>Oficina San Andres<span class="fa fa-exchange fw"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="#">Cambiar a Loma Hermosa</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<div class="col-xs-12"><hr></div>--}}
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-calendar"></i> Agenda <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="agenda">Ver semana</a></li>
                            <li><a href="agenda">Ver mes</a></li>
                            <li><a href="agenda">Nuevo evento</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('clientes') }}"><i class="fa fa-desktop"></i> Clientes </a></li>
                    <li><a><i class="fa fa-legal"></i> Expedientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/expedientes') }}">Nuevo</a></li>
                            <li><a href="{{ url('/expedientes') }}">Ver lista</a></li>
                            <li><a href="{{ url('/expedientes') }}">Buscar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Configuracion">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a href="#" class="logout" data-toggle="tooltip" data-placement="top" title="Salir">
                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>