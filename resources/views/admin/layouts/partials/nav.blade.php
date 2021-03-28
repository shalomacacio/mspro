        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <span class="nav-icon">
                            @include('admin.layouts.svg.home')
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                    <!--//nav-link-->
                </li>

                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                        <span class="nav-icon">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        @include('admin.layouts.svg.search')
                         </span>
                         <span class="nav-link-text">Busca</span>
                         <span class="submenu-arrow">
                            @include('admin.layouts.svg.paper')
                         </span><!--//submenu-arrow-->
                    </a><!--//nav-link-->
                    <div id="submenu-1" class="collapse submenu submenu-1" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('pacientes.search')}}">Pacientes</a></li>
                        </ul>
                    </div>
                </li><!--//nav-item-->

                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
                        <span class="nav-icon">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        @include('admin.layouts.svg.person-box')
                         </span>
                         <span class="nav-link-text">Atendimento</span>
                         <span class="submenu-arrow">
                            @include('admin.layouts.svg.paper')
                         </span><!--//submenu-arrow-->
                    </a><!--//nav-link-->
                    <div id="submenu-2" class="collapse submenu submenu-2" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('pacientes.create') }}">Novo Paciente</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('agendas.selectCampanha') }}">Agendamento em Lote</a></li>

                        </ul>
                    </div>
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="{{ route('comunicados.create') }}">
                        <span class="nav-icon">
                            @include('admin.layouts.svg.bi-cursor')
                        </span>
                        <span class="nav-link-text">Notificações</span>
                    </a>
                    <!--//nav-link-->
                </li>

                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-4" aria-expanded="false" aria-controls="submenu-2">
                        <span class="nav-icon">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        @include('admin.layouts.svg.report')
                         </span>
                         <span class="nav-link-text">Relatórios</span>
                         <span class="submenu-arrow">
                            @include('admin.layouts.svg.paper')
                         </span><!--//submenu-arrow-->
                    </a><!--//nav-link-->
                    <div id="submenu-4" class="collapse submenu submenu-4" data-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('relatorios.pacientes') }}">Lista Pacientes</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('relatorios.campanhas') }}">Por Campanhas</a></li>

                        </ul>
                    </div>
                </li><!--//nav-item-->
                
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="#">
                        <span class="nav-icon">
                            @include('admin.layouts.svg.help')
                        </span>
                        <span class="nav-link-text">Duvidas ?</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="{{ route('admin.logout') }}">
                        <span class="nav-icon">
                            @include('admin.layouts.svg.download')
                        </span>
                        <span class="nav-link-text">Sair</span>
                    </a>
                    <!--//nav-link-->
                </li>
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->
