<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- DEVSCRIPT _MD5_CRYPTER Skoura Framework -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="_devscript" content="{{ csrf_token() }}"/>
    <meta name="author" content="Elmarzougui Abdelghafour DEVSCRIPT E.A">
    <meta name="keywords" content="ciprsem association skoura ouarzazate morocco  ">
    <link rel="icon" type="image/ico" href=""/>
    <title>CIPRSEM | @yield('title')</title>
    <!-- ciprsem STYLES Skoura Framework  -->
    @if(LaravelLocalization::getCurrentLocale()=='ar')

        <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="all">

    @endif

    @if(LaravelLocalization::getCurrentLocale()=='fr')

        <link href="{{ asset('css/style_en_fr.css') }}" rel="stylesheet" media="all">
    @endif

    @if(LaravelLocalization::getCurrentLocale()=='en')

        <link href="{{ asset('css/style_en_fr.css') }}" rel="stylesheet" media="all">
    @endif
    @yield('style')

<!-- ciprsem Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script>
        window.ciprsem = {!! json_encode([
            '__ciprsem' => csrf_token(),
            '_devscript'=>csrf_token(),
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
<!--<button class="cip_fixed"></button>-->
<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- ciprsem Scripts -->

<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
@yield('script')
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
