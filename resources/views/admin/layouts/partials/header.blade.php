<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">

                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="app-utilities col-auto">


                        <div class="app-utility-item app-user-dropdown dropdown">
                            {{ Auth::user()->name }}
                        </div>
                        <!--//app-user-dropdown-->
                    </div>
                    <!--//app-utilities-->
                </div>
                <!--//row-->
            </div>
            <!--//app-header-content-->
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-header-inner-->
    <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo" href="#"><img class="logo-icon mr-2" src="{{ asset('portal/assets/images/favico.png') }}"
                        alt="logo"><span class="logo-text">MSAÚDE</span></a>

            </div>
            <!--//app-branding-->
            @include('admin.layouts.partials.nav')

            <div class="app-sidepanel-footer">
                <nav class="app-nav app-nav-footer">
                    <ul class="app-menu footer-menu list-unstyled">

                        <li class="nav-item has-submenu">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
                                <span class="nav-icon">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                @include('admin.layouts.svg.engine')
                                 </span>
                                 <span class="nav-link-text">Configurações</span>
                                 <span class="submenu-arrow">
                                    @include('admin.layouts.svg.paper')
                                 </span><!--//submenu-arrow-->
                            </a><!--//nav-link-->
                            <div id="submenu-3" class="collapse submenu submenu-1" data-parent="#menu-accordion">
                                <ul class="submenu-list list-unstyled">
                                    <li class="submenu-item"><a class="submenu-link" href="{{ route('campanhas.index') }}">Campanhas</a></li>
                                </ul>
                            </div>
                        </li><!--//nav-item-->

                    </ul>
                    <!--//footer-menu-->
                </nav>
            </div>
            <!--//app-sidepanel-footer-->
        </div>
        <!--//sidepanel-inner-->
    </div>
    <!--//app-sidepanel-->
</header>
<!--//app-header-->
