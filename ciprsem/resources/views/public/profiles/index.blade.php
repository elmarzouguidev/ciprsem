@extends('layouts.app')

@section('content')

    <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/hero1.jpeg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="cipresm_show">
                        <div class="cipresm_show_content animate-box" data-animate-effect="fadeIn">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="devscript_cipresm-explore" class="devscript_cipresm-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3 text-center devscript_cipresm-heading">
                    <p>{{trans('home.title_cip')}}</p>
                </div>

            </div>
        </div>

    </div>

    <section id="feature" class="transparent-bg" style="margin-top: 180px">
        <div class="container">


            <div class="row">

                @if($loc=='en')
                    @foreach($profiles as $profile)
                        <div class="col-md-4 wow fadeInDown">
                            <div class="clients-comments text-center">
                                <img src="{{asset('profiles/abdo/img'.'/'.$profile->photo)}}" class="img-circle" alt="">

                                <h4><span>{{$profile->fullname}} /</span>  Director of CIPRECM.com</h4>
                                <h3>
                                    {{ substr(strip_tags($profile->about_en),0,180)}}{{ strlen(strip_tags($profile->about_en))>180 ? " ...":"" }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if($loc=='ar')
                    @foreach($profiles as $profile)
                        <div class="col-md-4 wow fadeInDown">
                            <div class="clients-comments text-center">
                                <img src="{{asset('profiles/abdo/img'.'/'.$profile->photo)}}" class="img-circle" alt="">

                                <h4><span>{{$profile->fullname}} /</span>  Director of CIPRECM.com</h4>
                                <h3>
                                    {{ substr(strip_tags($profile->about_ar),0,180)}}{{ strlen(strip_tags($profile->about_ar))>180 ? " ...":"" }}
                                </h3>
                                <a href="{{URL::route('profiles.single',$profile->user_name)}}" class="btn btn-primary">اقرأ المزيد</a>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if($loc=='fr')
                    @foreach($profiles as $profile)
                        <div class="col-md-4 wow fadeInDown">
                            <div class="clients-comments text-center">
                                <img src="{{asset('profiles/abdo/img'.'/'.$profile->photo)}}" class="img-circle" alt="">

                                <h4><span>{{$profile->fullname}} /</span>  Director of CIPRECM.com</h4>
                                <h3>
                                    {{ substr(strip_tags($profile->about_fr),0,180)}}{{ strlen(strip_tags($profile->about_fr))>180 ? " ...":"" }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div><!--/.container-->
    </section><!--/#feature-->


@endsection