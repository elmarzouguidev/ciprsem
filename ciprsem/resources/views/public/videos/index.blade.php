@extends('layouts.app')
@section('style')
    <link href="{{ asset('css/magnific-popup.css')   }}" rel="stylesheet">
@endsection
@section('title',trans('home.videos'))
@section('content')
    @if(!empty($background->videos_background))
        <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('ciprsem/background'.'/'.$background->videos_background)}});" data-stellar-background-ratio="0.5">

            @else
                <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/home.jpg);" data-stellar-background-ratio="0.5">

                    @endif

        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="cipresm_show">
                        <div class="cipresm_show_content animate-box" data-animate-effect="fadeIn">

                            <p>

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

    <div id="devscript_cipresm-activites">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center devscript_cipresm-heading">
                    <h2>{{trans('home.title_cip_videos')}}</h2>
                </div>
            </div>
        </div>


        <div class="container-fluid devscript_cipresm-activites-list" style="margin-top: 80px">
            <div class="row">
                @foreach($videos as $video)
                    <div class="devscript_cipresm-activites_vid"></div>
                    <div class="col-md-3 col-lg-3 col-sm-6 devscript_cipresm-activites animate-box " data-animate-effect="fadeIn">
                        <a class="popup-vimeo" href="{{$video->linke}}">
                            <span class="youtube">{{strip_tags($video->title)}}</span>
                            <div class="ply">
                                <li>
                                    <p> <i class="icon-play">

                                        </i>
                                    </p>
                                </li>

                            </div>
                            @if($video->img)
                                <img src="{{asset('c_images/articles'.'/'.$video->img)}}" alt="{{$video->title}}" class="img-responsive">
                            @else
                                <img src="http://img.youtube.com/vi/ajDxF3BbLNs/0.jpg" alt="{{$video->title}}" class="img-responsive">

                            @endif
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup-options.js') }}"></script>
@endsection