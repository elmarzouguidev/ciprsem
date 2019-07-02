@extends('layouts.app')

@section('content')
    <header id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/bg-p.jpg); " data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="cipresm_show">
                        <div class="cipresm_show_content animate-box" data-animate-effect="fadeIn">
                            <!--    <h2>تعرف علينا من خلال الفيديو التعريفي</h2>-->
                            <p>
                                <!--<a class="btn btn-primary btn-lg popup-vimeo btn-video" href="https://www.youtube.com/watch?v=-oHdK3FM6mo">
                                    <i class="icon-play"></i> شاهد الفيديو
                                </a>-->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div id="devscript_cipresm-explore" class="devscript_cipresm-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3 text-center devscript_cipresm-heading">
                    <p style="color: red">المرجو الانتباه جيدا فهده الصفحة تستلزم حاسوب محمي ويفضل الدخول بمتصفح معروف مثل Mozilla او Chrome </p>
                </div>
            </div>
        </div>

    </div>
    <div class="container" style="margin-top: 180px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{trans('home.login_admin')}}
                        <span class="login label label-success hidden"></span>
                        <span class="errorlogin label label-danger hidden"></span>
                    </div>
                    <div class="panel-body">

                        <form id="login_admin" class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.ok') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                <div class="col-md-6 col-md-offset-4">
                                    <input id="email" type="email" class="form-control" name="email" value="" placeholder="{{trans('home.login_email')}}">

                                    <span class="erroremail label label-danger hidden"></span>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                                <div class="col-md-6 col-md-offset-4">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="{{trans('home.login_password')}}" >
                                    <span class="errorpassword label label-danger hidden"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 ">
                                    <button type="submit" class="btn btn-primary login_send">
                                        الدخول
                                    </button>

                                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                        {{trans('home.login_forgot_pass')}}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#login_admin').on('submit',function(e){
            e.preventDefault();
            var form = new FormData(this);
            var email = $('#email').val();
            var password = $('#password').val();

            form.append('email', email);
            form.append('password', password);
            $.ajax({
                url: '{{URL::route('admin.login.ok')}}',
                type: 'POST',
                data: form,
                processData: false,
                contentType: false,

                success:function(data) {

                    // console.log(data.errors);


                    if (data.errors) {

                        if (data.errors.email) {
                            $('.erroremail').removeClass('hidden');
                            $('.erroremail').text(data.errors.email);
                        }

                        if (data.errors.password) {
                            $('.errorpassword').removeClass('hidden');
                            $('.errorpassword').text(data.errors.password);
                        }

                        if (data.errors.failed) {
                            $('.errorlogin').removeClass('hidden');
                            $('.errorlogin').text(data.errors.failed);
                        }
                        $('#login_admin').on('keyup',function () {
                            $('.label').addClass('hidden');
                        });

                        if (data.errors.active) {
                            $('.errorlogin').removeClass('hidden');
                            $('.errorlogin').text(data.errors.active);
                        }

                    }
                    if (data.success) {
                        $('.login').removeClass('hidden');
                        $('.login').text(data.success);



                        $('.login_send').removeClass('btn-primary');
                        $(".login_send").addClass('btn-default')
                        $(".login_send").html('<img src="{{asset('images')}}/btn-ajax-loader.gif"/>');
                        var delay = 3000;
                        setTimeout(function()
                            {
                                window.location = '{{URL::route('admin.home')}}'
                            },
                            delay);

                    }

                }
            });


        });


    </script>
@endsection
