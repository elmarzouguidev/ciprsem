@extends('layouts.app')
@section('title',trans('home.activity'))
@section('content')
    @if(!empty($background->activities_background))
        <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('ciprsem/background'.'/'.$background->activities_background)}});" data-stellar-background-ratio="0.5">

            @else
                <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/home.jpg);" data-stellar-background-ratio="0.5">

                    @endif

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

                <div class="col-lg-8 ">
                    @if($loc=='ar')

                        <div class="col-lg-12 col-md-12 single-news" >
                            <div class="devscript_cipresm-news news-nsingle animate-box" >
                                <a href="#">
                                    <img  class="img-responsive" src="{{asset('c_images/articles'.'/'.$singles->pic)}}" alt="">
                                </a>
                                <div class="cipresm-news-text ">
                                    <div class="single">
                                        <h3 id="single-news">{!! $singles->title_ar!!}</h3>
                                        <p>{!!$singles->body_ar !!}</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endif

                    @if($loc=='fr')

                        <div class="col-lg-12 col-md-12 single-news" >
                            <div class="devscript_cipresm-news news-nsingle animate-box" >
                                <a href="#">
                                    <img  class="img-responsive" src="{{asset('c_images/articles'.'/'.$singles->pic)}}" alt="">
                                </a>
                                <div class="cipresm-news-text ">
                                    <div class="single">
                                        <h3 id="single-news">{!! $singles->title_fr!!}</h3>
                                        <p>{!!$singles->body_fr !!}</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endif

                    @if($loc=='en')

                        <div class="col-lg-12 col-md-12 single-news" >
                            <div class="devscript_cipresm-news news-nsingle animate-box" >
                                <a href="#">
                                    <img  class="img-responsive" src="{{asset('c_images/articles'.'/'.$singles->pic)}}" alt="">
                                </a>
                                <div class="cipresm-news-text ">
                                    <div class="single">
                                        <h3 id="single-news">{!! $singles->title_en!!}</h3>
                                        <p>{!!$singles->body_en !!}</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endif

                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="side animate-box">
                        <div class="col-md-12 col-md-offset-0 text-center devscript_cipresm-heading">
                            <h2><span>{{trans('home.title_new_activi')}}</span></h2>
                        </div>
                        @if($loc=="ar")
                            @foreach($articles_menu as $article)
                                <div class="blog-entry">
                                    <a href="{{URL::route('news.single',$article->id)}}">
                                        <img src="{{asset('c_images/articles'.'/'.$article->pic)}}" class="img-responsive" alt="{{$article->title_ar}}">
                                        <div class="desc">

                                            <h3>{{$article->title_ar}}</h3>
                                            <span class="date">{{ date('M j,Y',strtotime($article->created_at))}}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        @endif

                        @if($loc=="fr")
                            @foreach($articles_menu as $article)
                                <div class="blog-entry">
                                    <a href="{{URL::route('news.single',$article->id)}}">
                                        <img src="{{asset('c_images/articles'.'/'.$article->pic)}}" class="img-responsive" alt="{{$article->title_fr}}">
                                        <div class="desc">

                                            <h3>{{$article->title_fr}}</h3>
                                            <span class="date">{{ date('M j,Y',strtotime($article->created_at))}}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif

                        @if($loc=="en")
                            @foreach($articles_menu as $article)
                                <div class="blog-entry">
                                    <a href="{{URL::route('news.single',$article->id)}}">
                                        <img src="{{asset('c_images/articles'.'/'.$article->pic)}}" class="img-responsive" alt="{{$article->title_en}}">
                                        <div class="desc">

                                            <h3>{{$article->title_en}}</h3>
                                            <span class="date">{{ date('M j,Y',strtotime($article->created_at))}}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection