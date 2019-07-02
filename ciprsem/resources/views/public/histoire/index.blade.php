@extends('layouts.app')
@section('title',trans('home.contact_us'))
@section('content')

    <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/img_2.jpg);" data-stellar-background-ratio="0.5">
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




    <div id="devscript_cipresm-main-content" >


        <div class="container col-md-offset-2">



            <div class="col-md-5">
                <div class="devscript_item">

                    <div class="devscript_items">

                        <div class="devscript_item-info-right">
                            <div class="follow_devscript_abdelghafour"></div>
                            <img src="{{asset('images')}}/ok2.jpg" class="img-responsive" alt=""/>
                        </div>

                        <div class="col-md-5  col-md-offset-1  devscript_item-into">
                            <h4>التسويق الالكتروني</h4>
                            <a href="#" class="button alt">اعرف المزيد</a>
                            <ul class="actions">
                                <li>
                                    <a href="#" class="icon-facebook-with-circle"></a>
                                </li>

                                <li>
                                    <a href="#" class="icon-twitter-with-circle"></a>
                                </li>
                            </ul>


                        </div>
                        <div class="clearfix"> </div>
                    </div>

                </div>
            </div>
            <div class="col-md-5">
                <div class="devscript_item">

                    <div class="devscript_items">

                        <div class="devscript_item-info-right ">
                            <div class="follow_devscript_abdelghafour"></div>
                            <img src="{{asset('images')}}/ok2.jpg" class="img-responsive" alt=""/>
                        </div>

                        <div class="col-md-5  col-md-offset-1  devscript_item-into">
                            <h4>التسويق الالكتروني</h4>
                            <a href="#" class="button alt">اعرف المزيد</a>
                            <ul class="actions">
                                <li>
                                    <a href="#" class="icon-facebook-with-circle"></a>
                                </li>

                                <li>
                                    <a href="#" class="icon-twitter-with-circle"></a>
                                </li>
                            </ul>


                        </div>
                        <div class="clearfix"> </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection