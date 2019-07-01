<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/be_app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app" class="login">
            <nav class="navbar">
                <div class="navbar__container">
                        
                    <a href="">
                        <img class="navbar__logo" src="{{ asset('images/Be-logo-login.svg') }}">
                    </a>

                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <!-- Registro y login -->
                    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client::login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a  class="nav-link" href="{{ route('client::register:get') }}" role="button" aria-expanded="false" v-pre>
                                    {{ __('Registrate') }}
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </nav>

            <main class="contenido">
                @yield('content')
            </main>
            
            <footer class="footer full">
                <div class="footer__container">
                    <div class="social">
                        <a href="#">
                            <img class="icon" src="{{ asset('images/FB.svg') }}" alt="" />
                        </a>
                        <a href="#">
                            <img class="icon" src="{{ asset('images/twitter.svg') }}" alt="" />
                        </a>
                        <a href="#">
                            <img class="icon" src="{{ asset('images/instagram.svg') }}" alt="" />
                        </a>
                        <a href="#">
                            <img class="icon" src="{{ asset('images/youtube.svg') }}" alt="" />
                        </a>
                    </div>
                    <div class="contact">
                        <a class="contact__mail" href="mailto:info@bexponencial.com">info@bexponencial.com</p>
                        <p class="contact__phone">T (52) 55 6282 9078</p>
        
                    </div>
                    <div class="about">
                        <a href="#">Acerca de</a>
                        <a href="#">Términos de condiciones</a>
                        <a href="#">Aviso de privacidad</a>
                        <router-link :to="{name: 'faq'}" class="">FAQ</router-link>
                        <p >Bexponencial 2019 	&#9400;</p>
                    </div>
                </div>
            </footer>
        </div>

    </body>
</html>
