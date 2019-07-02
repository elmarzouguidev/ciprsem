@extends('layouts.app')

@if($loc=="ar")
    @section('title',$singles->title_ar)
@endif

@if($loc=="fr")
    @section('title',$singles->title_fr)
@endif

@if($loc=="en")
    @section('title',$singles->title_en)
@endif

@section('content')

    @if(!empty($background->news_background))
        <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('ciprsem/background'.'/'.$background->news_background)}});" data-stellar-background-ratio="0.5">

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
                                <a href="#"><img  class="img-responsive" src="{{asset('c_images/articles'.'/'.$singles->pic)}}" alt=""></a>
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
                                <a href="#"><img  class="img-responsive" src="{{asset('c_images/articles'.'/'.$singles->pic)}}" alt=""></a>
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
                                <a href="#"><img  class="img-responsive" src="{{asset('c_images/articles'.'/'.$singles->pic)}}" alt=""></a>
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
                            <h2><span>{{trans('home.title_new_news')}}</span></h2>
                        </div>
                        @if($loc=="ar")
                            @foreach($articles_menu as $article)
                                <div class="blog-entry">
                                    <a href="{{URL::route('news.single',$article->slug)}}">
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
                                    <a href="{{URL::route('news.single',$article->slug)}}">
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
                                    <a href="{{URL::route('news.single',$article->slug)}}">
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


    <div class="container">
        <div class="row">

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div id="devscript_cipresm-main-content" >

                    <div class="devscript_cipresm-post" id="cipresm_post">

                        <div class="comments1" id="devscript_comments">

                            <h4>{{trans('home.title_comm')}}</h4>
                            @foreach($singles->comments as $comment)
                                @if($comment->active)
                                    <div class="comments-main">
                                        <div class="col-md-2 cmts-main-left">
                                            <img src="{{asset('images')}}/avatar.png" class="img-responsive">
                                        </div>
                                        <div class="col-md-10 cmts-main-right">
                                            <h5>{{$comment->name}}</h5>
                                            <p>
                                                {{strip_tags($comment->comment)}}
                                            </p>
                                            <div class="cmts">
                                                <div class="cmnts-left">
                                                    <p>
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->created_at)->diffForHumans() }}
                                                    </p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <div id="form-comment" class="col-md-6 col-lg-8 ">
                <h4>{{trans('home.write_comm')}}</h4>

                <p style="color: red">({{trans('home.y_mail_not_show')}})</p>
                <form class="form-horizontal" role="form" id="devscript_add_comment" method="post">
                    <div class="if_comment_has_disable hidden" >
                        <ul class="if_disable" >

                        </ul>
                    </div>

                    <div class="if_comment_has_errs hidden" >
                        <ul class="if_errors" >

                        </ul>
                    </div>

                    {{ csrf_field() }}
                    {{ csrf_ciprecim() }}
                    {{ csrf_devlopper() }}

                    <div class="row">
                        <div class="col-md-6" style="margin-bottom: 10px" >
                            <span class="errorname label label-danger"></span>
                            {{ Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>trans('home.y_name')]) }}

                        </div>

                        <div class="col-md-6" style="margin-bottom: 10px">
                            <span class="erroremail label label-danger"></span>
                            {{ Form::text('email',null,['class'=>'form-control','id'=>'email','placeholder'=>trans('home.y_mail')]) }}

                        </div>

                        <div class="col-md-12">
                            {{ Form::textarea('comment',null,['class'=>'form-control','id'=>'comment','rows'=>'5','placeholder'=>trans('home.y_comment')]) }}

                            <span class="errorcomment label label-danger hidden">Danger Label</span>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">

                            {{ Form::submit(trans('home.comment_save'),['class'=>'btn btn-primary ']) }}
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        $(window).load(function(){
            $('.devscript_cipresm-post').removeAttr('style');
        })
    </script>
    <script>
        $('#form-comment').on('submit',function(e){
            e.preventDefault();

            $('.form-control').on('keyup',function () {
                $('.if_comment_has_errs').fadeOut("slow");
                $('li').remove('.errs');
            });
            $.ajax({
                type:'POST',
                url:'{{URL::route('comment.store',$singles->id)}}',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'name':$('#name').val(),
                    'email':$('#email').val(),
                    'comment':$('#comment').val()
                },
                success:function (data) {
                    // console.log(data.errors);
                    //$('#msg').show();
                    if (data.errors) {

                        $('.if_comment_has_errs').fadeToggle("slow");
                        $('.if_comment_has_errs').removeClass('hidden');
                        if (data.errors.name) {
                            $(".if_errors").append('<li class="errs" style="padding: 5px ; display: list-item; list-style: circle">' + data.errors.name + '</li>');
                        }
                        if (data.errors.email) {
                            $(".if_errors").append('<li class="errs" style="padding: 5px ; display:list-item ; list-style: circle">' + data.errors.email + '</li>');
                        }
                        if (data.errors.comment) {
                            $(".if_errors").append('<li class="errs" style="padding: 5px ; display: list-item; list-style: circle">' + data.errors.comment + '</li>');
                        }

                    }else {
                        //console.log(data.comment);
                      if(data) {
                            $('#devscript_add_comment')[0].reset();

                           // $("#devscript_comments").load(location.href + " #devscript_comments");
                            $('.if_comment_has_disable').removeClass('hidden');
                            $(".if_disable").append('<li class="errs" style="padding: 5px ; color: #003399; display: list-item; list-style: circle">' + data.saved + '</li>');


                        }

                    }
                }
            });

        });

    </script>

@endsection