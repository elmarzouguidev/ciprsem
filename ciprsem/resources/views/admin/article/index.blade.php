@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                                 <a href="{{URL::route('admin.article.create')}}" type="button" class="btn-lg btn waves-effect waves-light btn-primary w-md">
                                     {{trans('admin.articles.add_articles')}}
                                 </a>
                             </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @if($loc=="ar")

                @include('admin.article.langue.ar')

            @endif

            @if($loc=="fr")

                @include('admin.article.langue.fr')

            @endif

            @if($loc=="en")

                @include('admin.article.langue.en')

            @endif
        </div><!-- Row -->
    </div> <!-- container -->

@endsection

@section('script_master')

    @include('admin.article.java.delete')

@endsection

