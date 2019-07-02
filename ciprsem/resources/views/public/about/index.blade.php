@extends('layouts.app')
@section('title',trans('home.about'))
@section('content')

    <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/home.jpg);" data-stellar-background-ratio="0.5">
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

    <div id="devscript_cipresm-news " >
        <div class="container">

            <div class="row ">

                <div class="col-lg-8 col-lg-offset-2 ">
                    @if($about)
                        @if($loc=='ar')

                            <div class="col-lg-12 col-md-12 single-news" >
                                <div class="devscript_cipresm-news news-nsingle animate-box" >
                                    <a href="#">
                                        @if($about->about_pic)
                                            <img  class="img-responsive" src="{{asset('c_images/articles'.'/'.$about->about_pic)}}" alt="">
                                        @endif
                                    </a>
                                    <div class="cipresm-news-text ">
                                        <div class="single">
                                            <h3 id="single-news"></h3>
                                            <p>{!! $about->about_ar !!}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endif
                        @if($loc=='fr')

                            <div class="col-lg-12 col-md-12 single-news" >
                                <div class="devscript_cipresm-news news-nsingle animate-box" >
                                    <a href="#">
                                        @if($about->about_pic)
                                            <img  class="img-responsive" src="{{asset('c_images/articles'.'/',$about->about_pic)}}" alt="">
                                        @endif
                                    </a>
                                    <div class="cipresm-news-text ">
                                        <div class="single">
                                            <h3 id="single-news"></h3>
                                            <p>{!! $about->about_fr !!}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endif
                        @if($loc=='en')

                            <div class="col-lg-12 col-md-12 single-news" >
                                <div class="devscript_cipresm-news news-nsingle animate-box" >
                                    <a href="#">
                                        @if($about->about_pic)
                                            <img  class="img-responsive" src="{{asset('c_images/articles'.'/',$about->about_pic)}}" alt="">
                                        @endif
                                    </a>
                                    <div class="cipresm-news-text ">
                                        <div class="single">
                                            <h3 id="single-news"></h3>
                                            <p>{!! $about->about_en !!}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endif

                    @else
                        <div class="col-lg-12 col-md-12 single-news" >
                            <div class="devscript_cipresm-news news-nsingle animate-box" >
                                <a href="#">

                                        <img  class="img-responsive" src="{{asset('images')}}/about.jpg" alt="">

                                </a>
                                <div class="cipresm-news-text ">
                                    <div class="single">
                                        <h3 id="single-news"></h3>
                                        <p></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif


                </div>

            </div>
        </div>
    </div>

@endsection
