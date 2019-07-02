@extends('layouts.admin')
@section('style')
    <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                                 <a href="{{URL::route('admin.videos.create')}}" type="button" class="btn-lg btn waves-effect waves-light btn-primary w-md">
                                     {{trans('admin.videos.add_video')}}

                                 </a>
                             </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            @foreach($articles as $article)
                <div class="col-lg-4 videos{{$article->id}}">
                    <div class="panel panel-color panel-info">
                        <div class="panel-heading">
                            <h2 class="panel-title">{{$article->title}}</h2>
                        </div>
                        <div class="panel-body">
                            @if($article->img)
                                <img width="100%" height="50%"  src="{{asset('c_images/articles'.'/'.$article->img)}}" alt="">
                            @else
                                <img width="88%" height="30%"  src="{{asset('admin')}}/img/thumbs/articles/no_thumb.jpg" alt="">

                            @endif
                            <a href="{{$article->linke}}" class="btn btn-success m-t-15" target="_blank">عرض</a>

                            <a href="{{URL::route('admin.videos.edit',$article->id)}}" class="btn btn-primary m-t-15">تعديل</a>

                            <a id="{{$article->id}}" class="delete_videos btn btn-danger m-t-15" data-id="{{$article->id}}" data-token="{{csrf_token()}}">حذف</a>

                        </div>

                    </div>
                </div>
            @endforeach

        </div><!-- Row -->
    </div> <!-- container -->

@endsection

@section('script_master')

    @include('admin.video.java.vedio_delete')

@endsection

