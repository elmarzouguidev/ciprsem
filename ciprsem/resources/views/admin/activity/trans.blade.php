@extends('layouts.admin')
@section('style')
    <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">{{trans('admin.articles.trans_activities')}}</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{URL::route('admin.home')}}">CIPRSEM</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row">
            @foreach($articles as $article)
                <div class="col-lg-4">
                    <div class="panel panel-border panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title">{{$article->title_ar}}</h2>
                        </div>
                        <div class="panel-body">
                            <img width="100%" height="50%"  src="{{asset('c_images/articles'.'/'.$article->pic)}}" alt="">
                            <a href="{{URL::route('admin.activities.trans.single',$article->id)}}" class="btn btn-primary m-t-15">
                                {{trans('admin.articles.trans_article_enter')}}
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div><!-- Row -->
    </div> <!-- container -->

@endsection

@section('script_master')

@endsection

