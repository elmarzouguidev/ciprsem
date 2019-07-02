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
                                 <a href="{{URL::route('admin.activities.create')}}" type="button" class="btn-lg btn waves-effect waves-light btn-primary w-md">
                                     {{trans('admin.articles.add_activities')}}

                                 </a>
                             </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            @if($loc=="ar")
                @include('admin.activity.langue.ar')
            @endif

            @if($loc=="fr")
                @include('admin.activity.langue.fr')
            @endif

            @if($loc=="en")
                @include('admin.activity.langue.en')
            @endif

        </div><!-- Row -->
    </div> <!-- container -->

@endsection

@section('script_master')

    @include('admin.activity.java.delete')

@endsection

