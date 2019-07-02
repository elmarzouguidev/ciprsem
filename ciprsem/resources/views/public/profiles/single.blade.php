@extends('layouts.app')

@section('content')

    <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('profiles/abdo/img'.'/'.$singles->background)}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>



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

    <!---  Anchita dyal CIPRECIM ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->




    <section id="devscript_cipresm-team" data-section="team">
        <div class="devscript_cipresm-team">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-4">
                        <div class="profile-info team-box  text-center ">
                            <div class="profile"><img class="img-reponsive" src="{{asset('images')}}/abdo.jpg" alt=""></div>
                            <h3>{{$singles->fullname}}</h3>
                            <p>المشاهدات</p>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-4 ">
                        <ul class="nav nav-pills profile_tools">
                            <button type="button" class="btn btn-profile">المرئيات <span class="badge">7</span></button>
                            <button type="button" class="btn btn-primary">المقالات <span class="badge">7</span></button>
                            <button type="button" class="btn btn-primary">الكتب <span class="badge">7</span></button>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-4">
                        <div class="profile-box-info  text-center ">
                            <h3>معلومات</h3>
                            <hr class="divider_profile">
                            <p>

                                {{ substr(strip_tags($singles->about_ar),0,180)}}{{ strlen(strip_tags($singles->about_ar))>180 ? " ...":"" }}
                            </p>
                        </div>
                    </div>

                    @foreach($singles->videos as $vedio)
                        <div class="col-md-9 col-lg-9 col-sm-4">
                            <div class="profile-info team-box  text-center ">
                                <div class="profile_post"><img class="img-reponsive" src="{{asset('images')}}/abdo.jpg" alt=""></div>
                                <div class="what_profile_new">
                                    <p>المقالات</p>


                                </div>
                                <div class="profile_video">
                                    <h3> {{$vedio->title}}</h3>
                                    <p>{{$vedio->linke}} </p>

                                </div>

                            </div>

                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>


@endsection