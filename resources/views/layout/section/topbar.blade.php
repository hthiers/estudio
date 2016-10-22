<div class="top_nav navbar-fixed-top">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

                <!-- Authentication Links -->
            <ul class="nav navbar-nav navbar-right">


        @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="pull-right">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ url('img/saul.jpg') }}" alt="">{{ Auth::user()->username }}
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Perfil</span>
                            </a></li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-cog pull-right fa-fw"></i>
                                Configuraci&oacute;n
                            </a>
                        </li>
                        <li><a href="javascript:;"> <i class="fa fa-question pull-right fa-fw"></i>Ayuda</a></li>
                        <li>

                        </li>
                        <li class="logout">
                            <a href="#">
                                <i class="fa fa-sign-out pull-right fa-fw"></i>
                                Salir
                            </a>
                            <form id="form-logout" action="{{ url('/logout') }}" method="POST">
                                {!! csrf_field() !!}
                            </form>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-clock-o fa-fw"></i>
                        <span class="badge bg-red">1</span>
                    </a>
                    <ul id="eventos" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span><span>Reunion con Nacho Garcia</span>
                          <span class="time">Faltan 30 minutos</span>
                        </span>
                                <span class="message">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dolorem expedita in laudantium nemo numquam similique?
                        </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>Ver todas las alertas</strong>
                                    <i class="fa fa-angle-right fa-fw"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o fw"></i>
                        <span class="badge bg-green">3</span>
                    </a>
                    <ul id="mensajes" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="{{ url('img/nacho.jpg') }}" alt="Profile Image" /></span>
                                <span>
                          <span>Nacho Garcia</span>
                          <span class="time">hace 3 minutos</span>
                        </span>
                                <span class="message">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dolorem expedita in laudantium nemo numquam similique?
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="{{ url('img/lionel.jpg') }}" alt="Profile Image" /></span>
                                <span>
                          <span>Lionel Hutz</span>
                          <span class="time">hace 2 horas</span>
                        </span>
                                <span class="message">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, ipsa!
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="{{ url('img/chuck.jpg') }}" alt="Profile Image" /></span>
                                <span>
                          <span>Charles McGill</span>
                          <span class="time">hace 3 días</span>
                        </span>
                                <span class="message">
                          No te olvides de dejar el celular en la puerta cuando vengas a casa.
                        </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>Ver todos los mensajes</strong>
                                    <i class="fa fa-angle-right fa-fw"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</div>