@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')



    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            selector:'textarea',
            plugins :'link code',
            menubar :false,
            /* toolbar: 'undo redo | cut copy paste'*/
        });
    </script>


            <div class="container" style="padding-top: 200px">
                @if($loc=='fr')
                    {{ Form::open(['route'=>['article.translated',$articles_edit->id],'method'=>'post','class'=>'form-horizontal']) }}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {{ Form::text('title',$articles_edit->title_fr,['class'=>'form-control','id'=>'title']) }}

                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                        {{ Form::textarea('body', $articles_edit->body_fr, array('id'=>'body')) }}

                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            {{ Form::submit('التعديل',['class'=>'btn btn-primary']) }}

                        </div>
                    </div>
                    {{ Form::close() }}
                @endif
                @if($loc=='en')
                    {{ Form::open(['route'=>['article.translated',$articles_edit->id],'method'=>'post','class'=>'form-horizontal']) }}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {{ Form::text('title',$articles_edit->title_en,['class'=>'form-control','id'=>'title']) }}

                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                        {{ Form::textarea('body', $articles_edit->body_en, array('id'=>'body')) }}

                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            {{ Form::submit('التعديل',['class'=>'btn btn-primary']) }}

                        </div>
                    </div>
                    {{ Form::close() }}
                @endif

                @if($loc=='ar')
                    {{ Form::open(['route'=>['article.translated',$articles_edit->id],'method'=>'post','class'=>'form-horizontal']) }}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {{ Form::text('title',$articles_edit->title_ar,['class'=>'form-control','id'=>'title']) }}

                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                        {{ Form::textarea('body', $articles_edit->body_ar, array('id'=>'body')) }}

                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            {{ Form::submit('التعديل',['class'=>'btn btn-primary']) }}

                        </div>
                    </div>
                    {{ Form::close() }}
                @endif
            </div>









@endsection