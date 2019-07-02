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
                    <h4 style="text-align: center">مقالات  </h4>
                    @if($loc=='ar')
                        @foreach($articles as $article)
                            <div class="col-lg-4 col-md-4" >
                                <div class="devscript_cipresm-news animate-box">
                                    <a href="#"><img  class="img-responsive" src="{{asset('c_images'.'/'.$article->pic)}}" alt=""></a>
                                    <div class="cipresm-news-text">
                                        <h3><a href=""#>{!! $article->title_ar!!}</a></h3>
                                        <span class="comment"><a href="">{{$article->view_counter}}<i class="icon-eye2"></i></a></span>
                                        <span class="comment"><a href="">{{count($article->comments)}}<i class="icon-speech-bubble"></i></a></span>

                                        <a href="{{URL::route('article.edit',$article->id)}}"    class="btn btn-xs btn-primary">تعديل</a>
                                        {{Form::open(['route'=>['article.delete',$article->id],'method'=>'DELETE'])}}
                                        {{Form::submit('حدف ',['class'=>'btn btn-danger'])}}
                                        {{Form::close()}}

                                    </div>

                                </div>

                            </div>
                        @endforeach
                    @endif

                    @if($loc=='fr')
                        @foreach($articles as $article)
                            <div class="col-lg-4 col-md-4">
                                <div class="devscript_cipresm-news animate-box">
                                    <a href="#"><img class="img-responsive" src="{{asset('c_images'.'/'.$article->pic)}}" alt=""></a>
                                    <div class="cipresm-news-text">
                                        <h3><a href=""#>{!! $article->title_fr!!}</a></h3>
                                        <span class="comment"><a href="">{{$article->view_counter}}<i class="icon-eye2"></i></a></span>
                                        <span class="comment"><a href="">{{count($article->comments)}}<i class="icon-speech-bubble"></i></a></span>

                                        <a href="{{URL::route('article.edit',$article->id)}}"    class="btn btn-xs btn-primary">modifier</a>
                                        {{Form::open(['route'=>['article.delete',$article->id],'method'=>'DELETE'])}}
                                        {{Form::submit('supprimer ',['class'=>'btn btn-danger'])}}
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if($loc=='en')
                        @foreach($articles as $article)
                            <div class="col-lg-4 col-md-4">
                                <div class="devscript_cipresm-news animate-box">
                                    <a href="#"><img class="img-responsive" src="{{asset('c_images'.'/'.$article->pic)}}" alt=""></a>
                                    <div class="cipresm-news-text">
                                        <h3><a href=""#>{!! $article->title_en!!}</a></h3>
                                        <span class="comment"><a href="">{{$article->view_counter}}<i class="icon-eye2"></i></a></span>
                                        <span class="comment"><a href="">{{count($article->comments)}}<i class="icon-speech-bubble"></i></a></span>

                                        <a href="{{URL::route('article.edit',$article->id)}}"    class="btn btn-xs btn-primary">edit</a>
                                        {{Form::open(['route'=>['article.delete',$article->id],'method'=>'DELETE'])}}
                                        {{Form::submit('delete ',['class'=>'btn btn-danger'])}}
                                        {{Form::close()}}
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