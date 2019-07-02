@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')


    <div id="gtco-features" class="border-bottom" style="padding-top: 180px">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-info"></i>
						</span>
                        <h3><a href="#" data-toggle="modal" data-target="#Setting">{{trans('home.prof_about_info')}}</a></h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-image"></i>
						</span>
                        <h3><a href="#" data-toggle="modal" data-target="#myback">{{trans('home.prof_about_backgrnd')}}</a></h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-user"></i>
						</span>
                        <h3><a href="#" data-toggle="modal" data-target="#myphoto">{{trans('home.prof_about_avatar')}}</a></h3>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-pencil"></i>
						</span>
                        <h3><a href="{{URL::route('article.create')}}">اضف مقال</a></h3>
                    </div>
                </div>
                <!---------------------------------------------------------------------------------------->

            </div>
        </div>
    </div>


    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            selector:'textarea',
            plugins :'link code',
            menubar :false,
            /* toolbar: 'undo redo | cut copy paste'*/
        });
    </script>
    {{count($profile)}}
    @if($profile)

        <div class="container">
            @if($loc=='fr')
                {{ Form::open(['route'=>['about.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal']) }}
                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    {{ Form::text('fullname',$profile->fullname,['class'=>'form-control','id'=>'fullname']) }}

                </div>
                <div class="form-group{{ $errors->has('fullabout') ? ' has-error' : '' }}">

                    {{ Form::textarea('fullabout', $profile->about_fr, array('id'=>'fullabout')) }}

                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {{ Form::submit(trans('home.prof_about_change'),['class'=>'btn btn-primary']) }}

                    </div>
                </div>
                {{ Form::close() }}
            @endif
            @if($loc=='en')
                {{ Form::open(['route'=>['about.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal']) }}
                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    {{ Form::text('fullname',$profile->fullname,['class'=>'form-control','id'=>'title']) }}

                </div>
                <div class="form-group{{ $errors->has('fullabout') ? ' has-error' : '' }}">

                    {{ Form::textarea('fullabout', $profile->about_en, array('id'=>'fullabout')) }}

                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {{ Form::submit(trans('home.prof_about_change'),['class'=>'btn btn-primary']) }}

                    </div>
                </div>
                {{ Form::close() }}
            @endif

            @if($loc=='ar')
                {{ Form::open(['route'=>['about.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal']) }}
                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    {{ Form::text('fullname',$profile->fullname,['class'=>'form-control','id'=>'fullname']) }}


                </div>
                <div class="form-group{{ $errors->has('fullabout') ? ' has-error' : '' }}">

                    {{ Form::textarea('fullabout', $profile->about_ar, array('id'=>'fullabout')) }}

                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {{ Form::submit(trans('home.prof_about_change'),['class'=>'btn btn-primary']) }}

                    </div>
                </div>
                {{ Form::close() }}
            @endif
        </div>

    @else

        <div class="container">


                {{ Form::open(['route'=>['about.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal']) }}
                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    {{ Form::text('fullname',null,['class'=>'form-control','id'=>'fullname','placeholder'=>'Your Name']) }}


                </div>
                <div class="form-group{{ $errors->has('fullabout') ? ' has-error' : '' }}">

                    {{ Form::textarea('fullabout', null, array('id'=>'fullabout')) }}

                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {{ Form::submit(trans('home.prof_about_change'),['class'=>'btn btn-primary']) }}

                    </div>
                </div>
                {{ Form::close() }}

        </div>

    @endif

    @include('profile.personel.modal')

@endsection