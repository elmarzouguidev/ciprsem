<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CIPRSEM') }}</title>

    <!-- CIPRECIM STYLES -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icomoon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-fileupload.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    @if(LaravelLocalization::getCurrentLocale()=='ar')

        <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="all">

    @endif

    @if(LaravelLocalization::getCurrentLocale()=='fr')

        <link href="{{ asset('css/style_en_fr.css') }}" rel="stylesheet" media="all">
    @endif

    @if(LaravelLocalization::getCurrentLocale()=='en')

        <link href="{{ asset('css/style_en_fr.css') }}" rel="stylesheet" media="all">
    @endif

    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">


<!-- CIPRECIM Scripts -->



    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        window.laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>

<div class="devscript_cipresm-loader"></div>

<div id="page">

    @include('layouts.menu')


    @yield('content')


    @include('layouts.footer')
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- CIPRECIM Scripts -->

<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-fileupload.js') }}"></script>
<script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>


</body>

</html>
