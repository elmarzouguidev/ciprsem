@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')
    <header class="header">


    </header><!--//header-->




    <div id="devscript_cipresm-news">
        <div class="container">
            <div class="row animate-box">

            </div>
            <div class="row">
                <div class="col-md-10 col-lg-12">
                    <h4 style="text-align: center">مقالات تلزمها الترجمة </h4>
                    @if($loc=='ar')
                        @foreach($articles_tr as $article)
                            <div class="col-lg-4 col-md-4" >
                                <div class="devscript_cipresm-news animate-box">
                                    <a href="#"><img  class="img-responsive" src="{{asset('c_images'.'/'.$article->pic)}}" alt=""></a>
                                    <div class="cipresm-news-text">
                                        <h3><a href=""#>{!! $article->title_ar!!}</a></h3>
                                        <span class="posted_on">Nov. 15th</span>
                                        <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>

                                        <a href="{{URL::route('article.need.translated',$article->id)}}"  class="btn btn-primary">ادخل الترجمة</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if($loc=='fr')
                        @foreach($articles_tr as $article)
                            <div class="col-lg-4 col-md-4">
                                <div class="devscript_cipresm-news animate-box">
                                    <a href="#"><img class="img-responsive" src="{{asset('c_images'.'/'.$article->pic)}}" alt=""></a>
                                    <div class="cipresm-news-text">
                                        <h3><a href=""#>{!! $article->title_fr!!}</a></h3>
                                        <!--- <span class="posted_on">Nov. 15th</span>
                                        <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
                                          -->
                                        <a href="{{URL::route('article.need.translated',$article->id)}}"  class="btn btn-primary">enter la traduction</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if($loc=='en')
                        @foreach($articles_tr as $article)
                            <div class="col-lg-4 col-md-4">
                                <div class="devscript_cipresm-news animate-box">
                                    <a href="#"><img class="img-responsive" src="{{asset('c_images'.'/'.$article->pic)}}" alt=""></a>
                                    <div class="cipresm-news-text">
                                        <h3><a href=""#>{!! $article->title_en!!}</a></h3>
                                        <!---<span class="posted_on">Nov. 15th</span>
                                         <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
                                         -->
                                        <a href="{{URL::route('article.need.translated',$article->id)}}"  class="btn btn-primary">enter translate</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>


@endsection