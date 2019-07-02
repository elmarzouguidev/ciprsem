<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <!-- DEVSCRIPT _MD5_CRYPTER -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="author" content="Elmarzougui Abdelghafour (DEVSCRIPT E.A)">
    <link rel="icon" type="image/ico" href=""/>
    <title> {{ config('app.name') }} | Admin</title>

    <!-- CIPRECIM STYLES -->
    <!-- Base Css Files -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('css/bootstrap-fileupload.min.css') }}" rel="stylesheet">
    <!-- Font Icons -->
    <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

@yield('style')


<!-- Custom Files -->
    <link href="{{ asset('admin/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>

</head>

<body class="fixed-left">


<div id="wrapper">

@include('layouts.admin_menu_top')

@include('layouts.admin_menu_left')
<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            @yield('content')

        </div>

        @include('layouts.admin_footer')

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>



<!-- CIPRECIM Scripts -->

<script>
    var resizefunc = [];
</script>



<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/bootbox.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-fileupload.js') }}"></script>

<script src="{{ asset('admin/assets/jquery-detectmobile/detect.js') }}"></script>
<script src="{{ asset('admin/assets/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('admin/js/jquery.app.js') }}"></script>

@yield('script_link')

@yield('script_master')

</body>
</html>
