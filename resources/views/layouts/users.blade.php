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

    {{-- Slick Slider styling --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>

    <!-- Styles -->
    <link href="{{ asset('css/be_app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="vue-container" class="page-wrapper">
        @include('layouts.includes.users._navbar')

        @include('layouts.includes.users._sidebar')
        <div  class="page-content">
                    @yield("content")
        </div>
        @include('layouts.includes.users._footer')

    </div>
    @include('layouts.includes.users.scripts')



</body>
<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
</html>
