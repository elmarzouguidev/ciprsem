@extends('layouts.app')
@section('title',trans('home.photos'))
@section('style')
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">

@endsection

@section('content')
    @if(!empty($background->picturs_background))
        <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('ciprsem/background'.'/'.$background->picturs_background)}});" data-stellar-background-ratio="0.5">

            @else
                <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/home.jpg);" data-stellar-background-ratio="0.5">

                    @endif
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
    <section id="portfolio" style="margin-top: 180px">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center devscript_cipresm-heading">
                    <h2>{{trans('home.title_cip_photos')}}</h2>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-10 col-sm-10 ">
                    <div class="portfolio-items">
                        @foreach($photos as $photo)
                            <div  class="portfolio-item apps {{$photo->category->name}} col-xs-12 col-sm-5 col-md-4 col-lg-4">
                                <div class="recent-work-wrap" id="res">
                                    <img class="img-responsive" src="{{asset('c_images/photos'.'/'.$photo->photo)}}" alt="">
                                    <div class="overlay">
                                        <div class="recent-work-inner">
                                            <h3><a href="#">{{$photo->title}}</a></h3>
                                            <a class="preview" href="{{asset('c_images/photos'.'/'.$photo->photo)}}" rel="ciprsem"><i class="icon-eye2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/.portfolio-item-->
                        @endforeach

                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-4 cats_image">

                    <div class="col-md-12  text-center">
                        <h2><span>الاصناف</span></h2>
                    </div>
                    <ul class="portfolio-filter text-center">
                        <li><a class="btn btn-default active" href="#" data-filter="*">{{trans('home.all_photo')}}</a></li>
                        @foreach($categories as $category)
                            <li><a class="btn btn-default" href="#" data-filter=".{{$category->name}}">{{$category->name}}</a></li>
                        @endforeach

                    </ul><!--/#portfolio-filter-->

                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
    <script>

        // portfolio filter
        $(window).load(function(){'use strict';
            var $portfolio_selectors = $('.portfolio-filter >li>a');
            var $portfolio = $('.portfolio-items');
            $portfolio.isotope({
                itemSelector : '.portfolio-item',
                layoutMode : 'fitRows'
            });

            $portfolio_selectors.on('click', function(){
                $portfolio_selectors.removeClass('active');
                $(this).addClass('active');
                var selector = $(this).attr('data-filter');
                $portfolio.isotope({ filter: selector });
                return false;
            });
        });

        $(document).ready(function(){
            //Pretty Photo
            $("a[rel^='ciprsem']").prettyPhoto({
                social_tools: false

            });
        });
    </script>
@endsection
@section('script')

    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>

@endsection