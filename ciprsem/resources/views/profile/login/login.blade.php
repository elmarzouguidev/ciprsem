@extends('layouts.app')

@section('content')
    <header id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/home.jpg);" data-stellar-background-ratio="0.5">
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
                    <p>{{trans('home.title_cip')}}</p>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-8 col-md-offset-2" style="margin-top: 100px;margin-bottom: 50px; padding: 40px; border-radius: 8px">
        <div class="panel panel-default">
            <div class="panel-heading">{{trans('home.login')}}</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-8 col-md-offset-2">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{trans('home.login_email')}}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                        <div class="col-md-8 col-md-offset-2">
                            <input id="password" type="password" class="form-control" name="password" placeholder="{{trans('home.login_password')}}" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2   ">
                            <button type="submit" class="btn btn-primary">
                                {{trans('home.login_ok')}}
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2 ">

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{trans('home.login_forgot_pass')}}
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection
