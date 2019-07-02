@extends('layouts.app')

@section('title',trans('home.home'))

@section('content')

    @if(!empty($background->home_background))
        <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('ciprsem/background'.'/'.$background->home_background)}});" data-stellar-background-ratio="0.5">

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

                <div id="devscript_cipresm-news">
                    <div class="container">
                        <div class="row animate-box">
                            <div class="col-md-8 col-md-offset-2 text-center devscript_cipresm-heading">
                                <h2>{{trans('home.title_cip_news')}}</h2>
                            </div>
                        </div>
                        <div class="row">


                            @if($loc=='ar')

                                @foreach($articles as $article)

                                    <div class="col-lg-4 col-md-4" >

                                        <div class="devscript_cipresm-news animate-box">

                                            <a id="home" href="{{URL::route('news.single',$article->slug)}}">
                                                <div class="read_more">
                                                    <li>
                                                        <p><i class="icon-chevron-with-circle-right"></i></p>
                                                        <strong>اقرأ المزيد</strong>
                                                    </li>
                                                </div>
                                                <img id="news_style" class="img-responsive" src="{{asset('c_images/articles'.'/'.$article->pic)}}" alt="">
                                            </a>
                                            <div class="cipresm-news-text" id="home_devscript">
                                                <h3><a>
                                                        {{ substr($article->title_ar,0,265)}} {{ strlen($article->title_ar)>265 ? " ...":"" }}
                                                    </a>
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if($loc=='fr')
                                @foreach($articles as $article)

                                    <div class="col-lg-4 col-md-4" >

                                        <div class="devscript_cipresm-news animate-box">

                                            <a id="home" href="{{URL::route('news.single',$article->slug)}}">
                                                <div class="read_more">
                                                    <li>
                                                        <p><i class="icon-chevron-with-circle-right"></i></p>
                                                        <strong>lire  plus</strong>
                                                    </li>
                                                </div>
                                                <img id="news_style" class="img-responsive" src="{{asset('c_images/articles'.'/'.$article->pic)}}" alt="">
                                            </a>
                                            <div class="cipresm-news-text" id="home_devscript">
                                                <h3><a>
                                                        {{ substr($article->title_fr,0,265)}} {{ strlen($article->title_fr)>265 ? " ...":"" }}
                                                    </a>
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if($loc=='en')
                                @foreach($articles as $article)

                                    <div class="col-lg-4 col-md-4" >

                                        <div class="devscript_cipresm-news animate-box">

                                            <a id="home" href="{{URL::route('news.single',$article->slug)}}">
                                                <div class="read_more">
                                                    <li>
                                                        <p><i class="icon-chevron-with-circle-right"></i></p>
                                                        <strong>Read more</strong>
                                                    </li>
                                                </div>
                                                <img id="news_style" class="img-responsive" src="{{asset('c_images/articles'.'/'.$article->pic)}}" alt="">
                                            </a>
                                            <div class="cipresm-news-text" id="home_devscript">
                                                <h3><a>
                                                        {{ substr($article->title_en,0,265)}} {{ strlen($article->title_en)>265 ? " ...":"" }}
                                                    </a>
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>

                <!-- <section id="devscript_cipresm-trusted" data-section="trusted">
                     <div class="devscript_cipresm-trusted">
                         <div class="container">
                             <div class="row">
                                 <div class="col-md-12 section-heading text-center to-animate-2">
                                    <h3 class="to-animate">المساندون الرسميون</h3>

                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-2 col-sm-3 col-xs-6 col-sm-offset-0 col-md-offset-1">
                                     <div class="partner-logo to-animate-2">
                                         <img src="images/logo1.png" alt="Partners" class="img-responsive">
                                     </div>
                                 </div>
                                 <div class="col-md-2 col-sm-3 col-xs-6">
                                     <div class="partner-logo to-animate-2">
                                         <img src="images/logo2.png" alt="Partners" class="img-responsive">
                                     </div>
                                 </div>
                                 <div class="col-md-2 col-sm-3 col-xs-6">
                                     <div class="partner-logo to-animate-2">
                                         <img src="images/logo3.png" alt="Partners" class="img-responsive">
                                     </div>
                                 </div>
                                 <div class="col-md-2 col-sm-3 col-xs-6">
                                     <div class="partner-logo to-animate-2">
                                         <img src="images/logo4.png" alt="Partners" class="img-responsive">
                                     </div>
                                 </div>
                                 <div class="col-md-2 col-sm-12 col-xs-12">
                                     <div class="partner-logo to-animate-2">
                                         <img src="images/logo5.png" alt="Partners" class="img-responsive">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </section>-->

@endsection
