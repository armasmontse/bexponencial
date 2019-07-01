<header class="header">
    <div class="navbar-user header__container">
        <div class="header__brand menu-section">
            <router-link :to="{name: 'home'}"  class="header__logo" ><img src="{{ asset('images/BE-logo.svg') }}" alt=""></router-link>
        </div>
        <ul class="header__navbar navbar__archievents">
            <li class="item">
                <a href="#">
                    <span id="userCoins">{{$user->stats->coins}}</span>
                    <img class="icon" src="{{ asset('images/images-news/monedas.svg') }}" alt="" />
                </a>

            </li>
            <li class="item ">
                <a href="#">
                    <span id="userExpPoints">{{number_format($user->stats->exp_points,0)}}</span>
                    <img class="icon" src="{{ asset('images/images-news/puntos.svg') }}" alt="" />
                </a>
            </li>
            <li class="item ">
                <a href="#">
                    <span id="missionsCount">{{$user->missionsCount()}}</span>
                    <img class="icon" src="{{ asset('images/images-news/niveles.svg') }}" alt="" />
                </a>
            </li>
        </ul>

        <div class="header__navbar navbar__links">
            <div class="item">
                <router-link :to="{name: 'drive'}">Be Drive</router-link>
            </div>

            <div class="item dropdown-item">
                <div class="dropdown">
                    <ul>
                        <router-link :to="{name: 'achievements'}" class="btn btn-xs btn-default">
                            <li>Mis logros</li>
                        </router-link>
                        <router-link :to="{name: 'progress'}" class="btn btn-xs btn-default"><li>Mi progreso</li></router-link>
                        <router-link :to="{name: 'ranking'}" class="btn btn-xs btn-default"><li>Ranking Global</li></router-link>
                    </ul>
                </div>
                <div class="drop-btn drop-parent">Estatus</div>
            </div>
            <div class="item">
                <router-link :to="{name: 'faq'}" class="btn btn-xs btn-default">Ayuda</router-link>
            </div>

            <div class="item dropdown-item">
                <div class="dropdown">
                    <ul>
                        <router-link :to="{name: 'info'}" class="btn btn-xs btn-default">
                            <li>Datos de la cuenta</li>
                        </router-link>
                        <router-link :to="{name: 'payment-methods'}" class="btn btn-xs btn-default">
                            <li>Métodos de pago</li>
                        </router-link>
                        <a href=""
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <li>Cerrar Sesión </li></a>
                        <form id="logout-form" action="{{ route('client::logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
                <div class="drop-btn drop-parent">Perfil
                    @include ('images.perfil')
                </div>
            </div>
        </div>
    </div>
    <div class="header__color-space"></div>
</header>

<div class="navbar-user-mobile navbar__user">

    <div class="navbar__columns">
        <ul class="header__navbar navbar__archievents">
            <li class="item">
                <a href="#">
                    <span>224</span>
                    <img class="icon" src="{{ asset('images/images-news/monedas.svg') }}" alt="" />
                </a>
            </li>
            <li class="item">
                <a href="#">
                    <span>12</span>
                    <img class="icon" src="{{ asset('images/images-news/puntos.svg') }}" alt="" />
                </a>
            </li>
        </ul>
    </div>

    <div class="navbar__columns">
        <div class="item center">
            <a href="#">Tu Mundo</a>
        </div>
    </div>

    <div class="navbar__columns">
        <div class="item">
            <div id="btn-abrir_JS" class="navbar__menu">
                @include ('images.menu')
            </div>
        </div>
    </div>

</div>

<div class="navbar-menu-mobile">
    <div class="navbar-menu-mobile__container">
        <div class="navbar-menu-mobile__btn">
            <div id="btn-cerrar_JS" class="cerrar">
                @include ('images.boton-cerrar')
            </div>
        </div>
        <div class="navbar-menu-mobile__niveles">
            <div class="navbar-menu-mobile__links navbar-menu-mobile__niveles-container">
                <h4 class="title">Nivel</h4>

                <div class="item">
                    <div class="flex" id="menu-encuentra">
                        <span class="icons">
                            <img class="icon-abierto" src="{{ asset('images/images-news/icono-candado-abierto.svg') }}" alt="" />
                            <img class="icon-cerrado" src="{{ asset('images/images-news/icono-candado-cerrado.svg') }}" alt="" />
                        </span>
                        <span>Encuentra</span>
                        <span>@include ('images.arrow')</span>
                    </div>
                    <div class="submenu encuentra">
                        <div class="submenu__container">
                            <div id="btn-cerrar-encuentra_JS" class="cerrar">
                                @include ('images.flecha-izq')
                                <h4 class="title">Nivel: Encuentra</h4>
                            </div>
                            <ul>

                                <a href="#">
                                    <li class="flex">
                                        <span class="icons">
                                            <img class="icon-abierto" src="{{ asset('images/images-news/icono-candado-abierto.svg') }}" alt="" />
                                            <img class="icon-cerrado" src="{{ asset('images/images-news/icono-candado-cerrado.svg') }}" alt="" />
                                        </span>
                                        <span>Módulo 1.</span>
                                    </li>
                                </a>

                            </ul>
                        </div>
                    </div>

                </div>


                <div class="item">
                    <span class="icons">
                        <img class="icon-abierto" src="{{ asset('images/images-news/icono-candado-abierto.svg') }}" alt="" />
                        <img class="icon-cerrado" src="{{ asset('images/images-news/icono-candado-cerrado.svg') }}" alt="" />
                    </span>
                    <span>Crece</span>
                    @include ('images.arrow')
                </div>

                <div class="item">
                    <span class="icons">
                        <img class="icon-abierto" src="{{ asset('images/images-news/icono-candado-abierto.svg') }}" alt="" />
                        <img class="icon-cerrado" src="{{ asset('images/images-news/icono-candado-cerrado.svg') }}" alt="" />
                    </span>
                    <span>Actúa</span>
                    @include ('images.arrow')
                </div>

            </div>
        </div>
        <div class="navbar-menu-mobile__links">
            <div class="item link">
                <router-link :to="{name: 'drive'}">Be Drive</router-link>
            </div>

            <div class="item">
                <div class="flex" id="menu-estatus">
                    <span>Estatus</span>
                    <span>@include ('images.arrow')</span>
                </div>
                <div class="submenu estatus">
                    <div class="submenu__container">
                        <div id="btn-cerrar-estatus_JS" class="cerrar">
                            @include ('images.flecha-izq')
                            <h4 class="title">Estatus</h4>
                        </div>
                        <ul>
                            <router-link :to="{name: 'achievements'}" class="">
                                <li>Mis logros</li>
                            </router-link>
                            <router-link :to="{name: 'progress'}" class=""><li>Mi progreso</li></router-link>
                            <router-link :to="{name: 'ranking'}" class=""><li>Ranking Global</li></router-link>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="item link">
                <router-link :to="{name: 'faq'}" class="">Ayuda</router-link>
            </div>

            <div class="item">
                <div class="flex" id="menu-perfil">
                    <span>Perfil</span>
                    <span>@include ('images.arrow')</span>
                </div>
                <div class="submenu perfil">
                    <div class="submenu__container">
                        <div id="btn-cerrar-perfil_JS" class="cerrar">
                            @include ('images.flecha-izq')
                            <h4 class="title">Perfil</h4>
                        </div>
                        <ul>
                            <router-link :to="{name: 'info'}" class="">
                                <li>Datos de la cuenta</li>
                            </router-link>
                            <router-link :to="{name: 'payment-methods'}" class="">
                                <li>Métodos de pago</li>
                            </router-link>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="item link">
                <router-link :to="{name: 'contact'}" class="">Contacto</router-link>
            </div>

            <a href="" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <div class="item">Cerrar Sesión </div>
            </a>
            <form id="logout-form" action="{{ route('client::logout') }}" method="POST" style="display: none;">
                @csrf
            </form>


        </div>
    </div>
</div>
